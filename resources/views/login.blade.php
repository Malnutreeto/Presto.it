<x-layout>

<div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Login</h1>
                <form action="" method="">
                    @csrf
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                        @error('email')
                        <span class="text-danger-small">Nope</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="surname">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @error('password')
                        <span class="text-danger-small">Nope</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>



</x-layout>