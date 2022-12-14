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
                                    data-bs-target="#creatpostModal">Post an activity</button>
                            </div>
                        </div>
                    </div>
                    @foreach ($posts as $post)
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
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bi bi-three-dots"></i></a>
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
                                <small class="text-muted"><i class="bi bi-clock"></i>
                                    {{ $post->created_at->diffForHumans() }} </small>
                                <div class="my-3">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text"> {{ Str::limit($post->description, 100, '...') }}
                                        <span>
                                            @if (strlen($post->description) > 100)
                                                <a href="{{ url(sprintf('posts/%d', $post->id)) }}"
                                                    class="text-decoration-none fw-light"> See
                                                    More</a>
                                            @endif
                                        </span>
                                    </p>
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
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="creatpostModal" tabindex="-1" aria-labelledby="createpostModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createpostModalLabel">Create Activity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Title Here" id="title" name="title"></textarea>
                                <label for="title">Title Here</label>
                            </div>
                            <textarea class="form-control mb-3" placeholder="What's on your mind?" name="description" style="height: 10rem;"></textarea>
                            <div class="d-flex justify-content-between align-items-center p-2">
                                <span>Add to your activity</span>
                                <label for="image" role="button" class="text-primary fw-bold fs-4"><i
                                        class="bi bi-images"></i>
                                    <input type="file" accept=".png, .jpg, .jpeg" class="d-none" name="image"
                                        id="image"
                                        onchange="document.querySelector('#file-info').innerText = this.value;">
                                </label>
                            </div>
                            <small id="file-info" class="text-muted d-block p-2"></small>
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
