<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ $post->content }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('posts.index') }}">Back to Posts</a>
</body>
</html>
