<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>one post</h1>
    @if (isset($post))
    {{ $post['title'] }}
    <form action="{{ url('posts/'.$post['id']) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title">
        <input type="text" name="id" value="{{ $post['id'] }}">
        <button>Update</button>
    </form>
    <form action="{{ url('posts/'.$post['id']) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="text" name="title" value="{{ $post['title'] }}">
        <input type="text" name="id" value="{{ $post['id'] }}">
        <button>Delete</button>
    </form>
    @endif
    @if (isset($result))
    <h1>deleted</h1>
    @endif
</body>

</html>