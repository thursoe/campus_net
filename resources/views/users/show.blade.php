@extends('master')

@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center gap-3">
            <div class="card col-lg-3 p-4 h-25">
                <div class="d-flex flex-column align-items-center gap-3">
                    <div class="rounded-circle" style="height: 11.25em; width: 11.25em;">
                        @if ($user->image)
                            <img src="{{ asset('storage/users/images/' . $user->image) }}"
                                class="img-fluid w-100 h-100 rounded-circle">
                        @else
                            <img src="{{ asset('storage/users/images/avatar.png') }}"
                                class="img-fluid w-100 h-100 rounded-circle">
                        @endif
                    </div>

                    <h4 class="fw-bold text-primary">{{ $user->name }}</h4>
                    <p class="">{{ $user->email }}</p>
                    <span>{{ $user->department->name }}</span>
                    <span>{{ $user->role }}</span>
                    <p class="text-muted">Joined {{ substr($user->created_at, 0, 10) }}</p>

                    @if (Auth::user())
                        <a href="{{ url('users/edit') }}" class="btn btn-outline-primary"> Edit profile</a>
                    @endif

                </div>
            </div>
            <div class="col-lg-5">
                <h5 class="my-2">{{ $user->name }}'s Activity</h5>
                @foreach ($user->posts as $post)
                    <div class="card shadow-sm my-3">
                        <div class="card-body">
                            <p class="mb-1"><a href="{{ url(sprintf('users/%d', $user->id)) }}"
                                    class="text-decoration-none fw-bold"> {{ $user->name }} </a></p>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }} </small>
                            <h5 class="card-title my-2">{{ $post->title }}</h5>
                            <p class="card-text"> {{ $post->description }}</p>

                            {{-- <img src="{{}}" class="img-fluid mb-3"
                            style="width: 100%; height: 100%;"> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
