<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Update User</title>
    </head>
    <body>
        <h1>Update User</h1>
        <form action="{{ route('updateuser',[$data->id]) }}" method="post">
            @csrf
            @method('PUT')
            Name:
            <input type="text" name="name" value="{{$data->name}}"><br>
            @error('email') {{ $message }} @enderror
            E-mail:
            <input type="text" name="email" value="{{$data->email}}"><br> 
            @error('email') {{ $message }} @enderror
            <input type="submit" value="Update">
        </form>
    </body>
</html>