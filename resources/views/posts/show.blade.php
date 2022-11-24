@extends('master')
@section('content')
    <section>
        <div class="container-lg mb-5 py-5 bg-light">
            <div class="row justify-content-center">
                <div class="col-md-5 my-4">
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
                            <hr>
                            <p class="text-muted"><i class="bi bi-chat-text"></i> Comments</p>
                            <div class="px-3">
                                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center gap-1">
                                        <input type="text" name="message" class="form-control form-control-sm"
                                            placeholder="Write a comment...">
                                    </div>
                                </form>
                                @unless($post->comments->isEmpty())
                                    @foreach ($post->comments->sortByDesc('updated_at') as $comment)
                                        <span><a href="{{ url(sprintf('/users/%d', $comment->user->id)) }}"
                                                class="text-decoration-none">{{ $comment->user->name }} </a><small
                                                class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></span>
                                        <div class="px-3 mt-2">
                                            <p>{{ $comment->message }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No comment to show</p>
                                @endunless
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
