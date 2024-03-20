<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $admin = new \App\Models\User();
        $admin->name = "admin";
        $admin->email = "admin@nylontechnology.com";
        $admin->password = "nylon";
        $admin->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\User::query()
            ->where('email', '=', 'admin@nylontechnology.com')
            ->delete();
    }
};
