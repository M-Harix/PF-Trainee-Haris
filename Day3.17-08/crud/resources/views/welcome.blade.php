<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome</title>
    </head>
    <body>
        <a href="{{ route('users.create') }}" >Create Users</a><br>
        <a href="{{ route('users.index') }}" >Retrive Users</a><br>
        <a href="{{ route('users.index') }}" >Delete Users</a><br>
        <a href="{{ route('users.index') }}" >Update Users</a>
    </body>
</html>