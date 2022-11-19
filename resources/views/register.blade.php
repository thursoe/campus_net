@extends('master')

@section('content')
    <form action="#" method="post">
        @csrf
        <label for="name" class="form-label">Username</label>
        <input type="text" name="name" id="username">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <div>
            <button type="submit">Register</button>
            <a href="{{ route('welcome') }}">Cancel</a>
        </div>
    </form>
@endsection
