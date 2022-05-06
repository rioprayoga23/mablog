@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="post">
                    {{-- Cross Site Request Forgery --}}
                    @csrf 
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" name="register" type="submit">Register</button>

                </form>
                <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
            </main>

        </div>
    </div>
@endsection
