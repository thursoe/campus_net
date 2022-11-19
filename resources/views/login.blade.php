@extends('master')
@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password"placeholder="Password">

        <div>
            <button type="submit">Log In</button>
            <a href="{{ url('register') }}">Register</a>
        </div>
    </form>
@endsection
