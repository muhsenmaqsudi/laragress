<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Create New Post</title>
</head>
<body>
<table>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->active }}</td>
            <td>{{ $post->title }}</td>
        </tr>
    @endforeach
</table>

{{ $posts->appends(request()->input())->links() }}

</body>
</html>
