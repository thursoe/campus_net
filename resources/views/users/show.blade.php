@extends('master')

@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="card col-lg-5 p-4">
                <div class="d-flex flex-column align-items-center gap-3">
                    <div class="rounded-circle" style="height: 11.25em; width: 11.25em;">
                        <img src="{{ asset('template/assets/images/img-ni.jpg') }}"
                            class="img-fluid w-100 h-100 rounded-circle">
                    </div>

                    <h4 class="fw-bold text-primary">{{ $user->name }}</h4>
                    <p class="">{{ $user->email }}</p>
                    <p>{{ $user->department->name }} | {{ $user->role }}</p>
                    <p class="text-muted">Joined {{ substr($user->created_at, 0, 10) }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
