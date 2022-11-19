@if (Auth::user())
    <h1>Hello {{ Auth::user()->name }}</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Log Out</button>
    </form>
@else
    <h1>Hello Guest</h1>
    <a href="{{ url('login') }}">Log In</a>
@endif
