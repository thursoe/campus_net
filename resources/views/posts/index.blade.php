@isset($posts)
    @foreach ($posts as $post)
        <h1>{{ $post->title }}</h1>
        <h5>by <a href="{{ url(sprintf('/users/%d', $post->user->id)) }}">{{ $post->user->name }}</a></h5>
        <a href="{{ url(sprintf('/posts/%d', $post->id)) }}">see more</a>
        <br>
    @endforeach
@endisset
