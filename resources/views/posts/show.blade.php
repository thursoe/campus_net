@extends('master')
@section('content')
    <section>
        <div class="container mb-5 py-5 bg-light">
            <div class="row justify-content-center">
                <div class="col-lg-5 my-4">
                    <div class="card shadow-sm my-3">
                        <div class="card-body">
                            <p class="mb-1"><a href="{{ url(sprintf('users/%d', $post->user->id)) }})"
                                    class="text-decoration-none fw-bold"> {{ $post->user->name }} </a></p>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }} </small>
                            <h5 class="card-title my-2">{{ $post->title }}</h5>
                            <p class="card-text"> {{ $post->description }} </p>

                            {{-- <img src="{{ asset('template/assets/images/cover-img.jpg') }}" class="img-fluid mb-3"
                                style="width: 100%; height: 100%;"> --}}

                            <hr>
                            <p class="">Comments</p>
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
