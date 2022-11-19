@isset($post)
    <h1>{{ $post->title }}</h1>
    <h5>by {{ $post->user->name }}</h5>
    <p>{{ $post->description }}</p>
    <p>{{ $post->rating }}</p>
    <br>

    <p>Comments</p>
    @foreach ($post->comments as $comment)
        <h3><a href="{{ url(sprintf('/users/%d', $comment->user->id)) }}">{{ $comment->user->name }}</a></h3>
        <h5><b>{{ $comment->message }}</b></h5>
    @endforeach
    <hr />
@endisset
