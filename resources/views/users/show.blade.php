@extends('master')

@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center gap-3">
            <div class="col-lg-4 col-md-5">
                <div class="card p-4">
                    <div class="d-flex flex-md-column flex-sm-row align-items-center justify-content-evenly gap-3">
                        <div class="rounded-circle" style="height: 10em; width: 10em;">
                            @if ($user->image)
                                <img src="{{ asset('storage/users/images/' . $user->image) }}"
                                    class="img-fluid w-100 h-100 rounded-circle">
                            @else
                                <img src="{{ asset('storage/users/images/avatar.png') }}"
                                    class="img-fluid w-100 h-100 rounded-circle">
                            @endif
                        </div>

                        <div class="d-md-flex flex-md-column align-items-md-center">
                            <h4 class="fw-bold text-primary">{{ $user->name }}</h4>
                            <p class="">{{ $user->email }}</p>
                            <span>{{ $user->department->name }}</span>
                            <span>{{ $user->role }}</span>
                            <p class="text-muted">Joined {{ substr($user->created_at, 0, 10) }}</p>

                            @if (Auth::user()->id == $user->id)
                                <a href="{{ url('users/edit') }}" class="btn btn-outline-primary"> Edit profile</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 class="my-2">{{ $user->name }}'s Activity</h5>
                @unless($user->posts->isEmpty())
                    @foreach ($user->posts as $post)
                        <div class="card shadow-sm my-3">
                            <div class="card-body">
                                <p class="mb-1"><a href="{{ url(sprintf('users/%d', $user->id)) }}"
                                        class="text-decoration-none fw-bold"> {{ $user->name }} </a></p>
                                <small class="text-muted"><i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </small>
                                <div class="my-3">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text"> {{ $post->description }} </p>
                                </div>

                                {{-- <img src="{{}}" class="img-fluid mb-3"
                        style="width: 100%; height: 100%;"> --}}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="m-3 text-muted">No activity to show</p>
                    @endif
                </div>
            </div>
        </div>
    @endsection
