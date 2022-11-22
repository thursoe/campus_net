@extends('home')

@section('contents')
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-6 text-white p-5">
            <h5 class="display-5 fw-bold mb-4">Welcome to Our Campus!</h5>
            <p class="d-none d-sm-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Maxime molestiae animi alias deserunt magnam velit molestiae animi alias deserunt magnam velit!</p>
        </div>
        <div class="col-md-4 fw-light">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                    <label for="name">Your name</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Log In</button>
            </form>
        </div>
    </div>
@endsection
