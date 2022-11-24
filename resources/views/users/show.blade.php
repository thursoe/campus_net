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
                            <span class="fw-bold my-2">{{ $user->role }}</span>
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
                    @foreach ($user->posts->sortByDesc('updated_at') as $post)
                        <div class="card shadow-sm my-3">
                            <div class="card-body">
                                <div class="row px-3 pb-3 pt-2 align-items-center justify-content-between">
                                    <div class="col-1 p-0 rounded-circle" style="height: 2em; width: 2em;">
                                        <a href="{{ url('users/' . Auth::user()->id) }}">
                                            @if (Auth::user()->image)
                                                <img src="{{ asset('storage/users/images/' . Auth::user()->image) }}"
                                                    class="img-fluid w-100 h-100 rounded-circle">
                                            @else
                                                <img src="{{ asset('storage/users/images/avatar.png') }}"
                                                    class="img-fluid w-100 h-100 rounded-circle">
                                            @endif
                                        </a>
                                    </div>
                                    <p class="col-10 mb-1"><a href="{{ url(sprintf('users/%d', $post->user->id)) }}"
                                            class="text-decoration-none fw-bold"> {{ $post->user->name }} </a></p>
                                    <div class="dropdown col-1"><a href="" class="" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url(sprintf('posts/%d', $post->id)) }}">More</a></li>
                                            @if ($post->user->id == Auth::user()->id)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('posts.delete', $post->id) }}">Delete</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <small class="text-muted"><i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </small>
                                <div class="my-3">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text"> {{ $post->description }} </p>
                                </div>

                                @if ($post->image)
                                    <img src="{{ asset('storage/posts/images/' . $post->image) }}" class="img-fluid mb-3"
                                        style="width: 100%; height: 100%;">
                                @endif
                                <div class="d-flex align-items-center px-1">
                                    <small class="text-muted">
                                        {{ $post->rating }} </small>
                                    <button class="btn btn-sm border-0 text-warning text-center me-2"><i
                                            class="bi bi-star-fill"></i></button>
                                    <small class="text-muted">
                                        {{ $post->rating }} </small>
                                    <button type="submit" class="btn btn-sm border-0 text-danger text-center me-2"><i
                                            class="bi bi-arrow-up-square-fill"></i></button>
                                    <small class="text-muted">
                                        {{ $post->comments->count() }} </small>
                                    <button class="btn btn-sm border-0 text-secondary text-center me-2"><i
                                            class="bi bi-chat-fill"></i></button>
                                </div>
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
