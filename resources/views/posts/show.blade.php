@extends('master')
@section('content')
    <section>
        <div class="container-lg mb-5 py-5 bg-light">
            <div class="row justify-content-center">
                <div class="col-md-5 my-4">
                    <div class="card shadow-sm my-3">
                        <div class="card-body">
                            <p class="mb-1"><a href="{{ url(sprintf('users/%d', $post->user->id)) }}"
                                    class="text-decoration-none fw-bold"> {{ $post->user->name }} </a></p>
                            <small class="text-muted"><i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                            </small>
                            <div class="my-2">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text"> {{ $post->description }} </p>
                            </div>

                            {{-- <img src="{{ asset('template/assets/images/cover-img.jpg') }}" class="img-fluid mb-3"
                                style="width: 100%; height: 100%;"> --}}

                            <hr>
                            <p class="text-muted"><i class="bi bi-chat-text"></i> Comments</p>
                            <div class="px-3">
                                @unless($post->comments->isEmpty())
                                    @foreach ($post->comments as $comment)
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
