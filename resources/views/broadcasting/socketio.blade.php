<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div>
    <h1>Laravel Broadcasting Using Redis Socket.io</h1>
</div>

<script src="{{ asset('/js/app.js') }}"></script>
<script>
    Echo.channel('laravel_database_private-test')
        .listen('TestEvent', e => {
            console.log(e)
        })
</script>

</body>
</html>
