@extends('home')

@section('contents')
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-6 text-white p-5">
            <h5>Connect with your classmate</h5>
            <h1 class="fw-bold my-3">Share Your Innovations</h1>
            <p class="fw-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem mollitia sunt harum ea omnis,
                eligendi architecto quisquam esse molestiae totam quia a temporibus laborum cum praesentium provident et
                consequatur distinctio sed eius possimus!</p>
        </div>
        <div class="col-md-4 fw-light">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                    <label for="name">Your name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm"
                        placeholder="Password">
                    <label for="password_confirm">Confrim Password</label>
                </div>
                <select class="form-select mb-4" aria-label="select department" name="department_id">
                    <option selected>Select Your Deparment</option>
                    <option value="1">Dep-1</option>
                    <option value="2">Dep-2</option>
                    <option value="3">Dep-3</option>
                    <option value="4">Dep-4</option>
                    <option value="5">Dep-5</option>
                </select>
                <button type="submit" class="btn btn-lg btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
@endsection
