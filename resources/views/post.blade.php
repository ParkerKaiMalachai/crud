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
    <form action="update" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title">
        <input type="text" name="id" value="{{ $post['id'] }}">
        <button>Update</button>
    </form>
    <form action="delete" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="text" name="id" value="{{ $post['id'] }}">
        <button>Delete</button>
    </form>
    @endif
    @if (isset($result))
    @if ($result['delete'])
    <h1>deleted</h1>
    @else
    <h1>not deleted</h1>
    @endif
    @endif
</body>

</html>