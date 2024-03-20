<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        //just a quick check, could/would be more robust in a real application
        $ssn = preg_replace("/[^0-9]/","", $request->ssn);

        //In line with "fail fast" - if the code is going to "fail" then do it right away.
        //using compute resources to check string length is low cost, so this check comes first
        if (strlen($ssn) !== 9) {
            return redirect('/')->with('error', 'SSN must include exactly nine numbers, with optional dashes');
        }

        //querying the database is a higher cost, so email check comes second
        $duplicateEmail = Submission::query()->where('email', $request->email)->exists();

        if ($duplicateEmail) {
            return redirect('/')->with('error', 'Email already in use');
        }

        //another design option would involve catching various exceptions when creating a new record
        // and redirecting the user based on that. The above Submission query could be removed, if engineered as such.
        $submission = new Submission();
        $submission->first_name = $request->firstName;
        $submission->last_name = $request->lastName;
        $submission->email = $request->email;
        $submission->ssn = $request->ssn;
        $submission->is_enabled = false;
        $submission->save();

        return redirect('/')->with('status', 'Your Data Has Been Inserted into the Database');
    }
}
