<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    body {
        color: #fff;
        background: #f8f6f6;
        font-family: 'Roboto', sans-serif;
    }
    .form-control {
        font-size: 15px;
    }
    .form-control, .form-control:focus, .input-group-text {
        border-color: #e1e1e1;
    }
    .form-control, .btn {        
        border-radius: 3px;
    }
    .signup-form {
        width: 40%;
        margin: 0 auto;
        padding: 30px 0;		
    }
    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form h2 {
        color: #333;
        font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
    .signup-form .form-group {
        margin-bottom: 20px;
    }
    .signup-form label {
        font-weight: normal;
        font-size: 15px;
    }
    .signup-form .form-control {
        min-height: 38px;
        box-shadow: none !important;
    }	
    .signup-form .input-group-addon {
        max-width: 42px;
        text-align: center;
    }	
    .signup-form .btn, .signup-form .btn:active {        
        font-size: 16px;
        font-weight: bold;
        background: #19aa8d !important;
        border: none;
        min-width: 140px;
    }
    .signup-form .btn:hover, .signup-form .btn:focus {
        background: #179b81 !important;
    }
    .signup-form a {
        color: #fff;	
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #19aa8d;
        text-decoration: none;
    }	
    .signup-form form a:hover {
        text-decoration: underline;
    }
</style>

<style>
    .radio {
        margin: 16px 0;
        display: block;
        cursor: pointer;
    }
    .radio input {
        display: none;
    }
    .radio input + span {
        line-height: 22px;
        height: 22px;
        padding-left: 22px;
        display: block;
        position: relative;
    }
    .radio input + span:not(:empty) {
        padding-left: 31px;
        padding-right: 10px;
    }
    .radio input + span:before, .radio input + span:after {
        content: "";
        width: 22px;
        height: 22px;
        display: block;
        border-radius: 50%;
        left: 0;
        top: 0;
        position: absolute;
    }
    .radio input + span:before {
        background: #D1D7E3;
        transition: background 0.2s ease, transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 2);
    }
    .radio input + span:after {
        background: #fff;
        transform: scale(0.78);
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.4);
    }
    .radio input:checked + span:before {
        transform: scale(1.04);
        background: #5D9BFB;
    }
    .radio input:checked + span:after {
        transform: scale(0.4);
        transition: transform 0.3s ease;
    }
    .radio:hover input + span:before {
        transform: scale(0.92);
    }
    .radio:hover input + span:after {
        transform: scale(0.74);
    }
    .radio:hover input:checked + span:after {
        transform: scale(0.4);
    }
</style>

</head>
<body>
    <div class="signup-form">
        <form action="{{ route('form/save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Form Basic</h2>
            <hr>
            <div class="form-groups">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Full Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                </div>
            </div>
        
            <div class="input-group form-check-inline">
                <label for="name" class="col-sm-2 col-form-label">Gander *</label>
                <label class="radio">
                    <input type="radio" class="" name="gander" value="male">
                    <span>Male</span>
                </label>
                <label class="radio">
                    <input type="radio" class="" name="gander" value="female">
                    <span>Female</span>
                </label>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Age *</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror"value="{{ old('age') }}" name="age" placeholder="Enter your age">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Document *</label>
                    <input type="file" class="form-control @error('upload') is-invalid @enderror" name="upload" value="{{ old('upload') }} placeholder="Enter your email" multiple>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 col-form-label"></label>
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
        </form>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Document</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$items)
                 
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->gender}}</td>
                    <td>{{$items->age}}</td>
                    <td>{{$items->email}}</td>
                    <td><a href="{{url('/download/'.$items->id )}}">{{asset($items->upload)}}</a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>