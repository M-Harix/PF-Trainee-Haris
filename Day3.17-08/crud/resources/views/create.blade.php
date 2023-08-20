<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create</h1> 
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('post')
        Name: 
        <input type="text" name="name" value="{{old('name')}}"><br>
        @error('name') {{ $message }} @enderror
        E-mail: 
        <input type="text" name="email" value="{{old('email')}}"><br>
        @error('email') {{ $message }} @enderror
        Passweord: 
        <input type="password" name="password" value="{{old('password')}}"><br>
        @error('password') {{ $message }} @enderror
        <input type="submit" value="Insert">
    </form>
</body>
</html>