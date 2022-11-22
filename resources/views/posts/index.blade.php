@extends('master')
@section('content')
    <section>
        <div class="container-lg mb-5 py-5 bg-light">
            <div class="row justify-content-center">
                <div class="col-md-5 my-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rounded-circle" style="height: 2.5em; width: 2.5em;">
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
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#creatpostModal">Post a project</button>
                            </div>
                        </div>
                    </div>
                    @foreach ($posts as $post)
                        <div class="card shadow-sm my-3">
                            <div class="card-body">
                                <p class="mb-1"><a href="{{ url(sprintf('users/%d', $post->user->id)) }}"
                                        class="text-decoration-none fw-bold"> {{ $post->user->name }} </a></p>
                                <small class="text-muted"><i class="bi bi-clock"></i>
                                    {{ $post->created_at->diffForHumans() }} </small>
                                <div class="my-2">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text"> {{ Str::limit($post->description, 100, '...') }}
                                        <span>
                                            @if (strlen($post->description) > 100)
                                                <a href="{{ url(sprintf('posts/%d', $post->id)) }}"
                                                    class="text-decoration-none"> See
                                                    More</a>
                                            @endif
                                        </span>
                                    </p>
                                </div>

                                {{-- <img src="{{}}" class="img-fluid mb-3"
                                    style="width: 100%; height: 100%;"> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="creatpostModal" tabindex="-1" aria-labelledby="createpostModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createpostModalLabel">Create Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Title Here" id="title" name="title"></textarea>
                                <label for="title">Title Here</label>
                            </div>
                            <textarea class="form-control" placeholder="What's on your mind?" name="description" style="height: 10rem;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
