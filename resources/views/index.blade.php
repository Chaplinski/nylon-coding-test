<!DOCTYPE html>
<html>
<head>
    <title>Nylon Code Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

        @if(session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Add Submission Data
        </div>
        <div class="card-body">
            <form name="add-submission-form" id="add-submission-form" method="post" action="{{url('submit')}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="firstName">First name</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lastName">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lastName">Social Security Number</label>
                        <input type="text" id="ssn" name="ssn" class="form-control" required="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
