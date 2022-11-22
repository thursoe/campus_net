@extends('master')

@section('content')

    <div class="container col-md-5 my-5 py-5">
        <div class="card shadow-sm my-3">
            <div class="card-body">
                <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4 align-items-center p-3">
                        <div class="col-sm-3">
                            <div class="rounded-circle" style="height: 5em; width: 5em;">
                                @if (Auth::user()->image)
                                    <img src="{{ asset('storage/users/images/' . Auth::user()->image) }}"
                                        class="img-fluid w-100 h-100 rounded-circle">
                                @else
                                    <img src="{{ asset('storage/users/images/avatar.png') }}"
                                        class="img-fluid w-100 h-100 rounded-circle">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                            <label for="image" role="button" class="text-primary fw-bold"> Change profile photo <i
                                    class="bi bi-person-bounding-box fs-6"></i>
                                <input type="file" accept=".png, .jpg, .jpeg" class="d-none" name="image"
                                    id="image" onchange="document.querySelector('#file-info').innerText = this.value;">
                            </label>
                            <small id="file-info" class="text-muted d-block"></small>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label fw-bold">Name</label>
                        <div class="col-sm-9">
                            <input type="name" class="form-control mb-3" name="name" placeholder="Name"
                                value="{{ Auth::user()->name }}">
                            @error('name')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted">Help people discover your account by using the name you're known by:
                                either your full name, nickname, or business name.</small>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control mb-3" name="email" placeholder="Email"
                                value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
