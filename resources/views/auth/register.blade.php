<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Register</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <span class="text-danger-small">Not valid</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="surname">Surname</label>
                            <input type="text" name="surname" class="form-control" id="surname">
                            @error('surname')
                            <span class="text-danger-small">Not valid</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="nickname">Nickname</label>
                            <input type="text" name="nickname" class="form-control" id="nickname">
                            @error('nickname')
                            <span class="text-danger-small">Not valid</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @error('password')
                            <span class="text-danger-small">Not valid</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            @error('password_confirmation')
                            <span class="text-danger-small">Not valid</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    
</body>
</html>