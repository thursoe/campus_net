@extends('master')

@section('content')
    <!-- Home -->
    <section id="home">
        <div class="container-fluid"
            style="height: 100vh; background: center / cover no-repeat url({{ asset('template/assets/images/cover-img.jpg') }});">

            @yield('contents')

        </div>
    </section>
@endsection
