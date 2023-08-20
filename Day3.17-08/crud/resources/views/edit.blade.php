
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body> 
    <h1>Edit</h1>
    <form action="{{ route('users.update',$data->id) }}" method="post">
        @csrf
        @method('PATCH')
        Name: 
        <input type="text" name="name" value="{{ $data->name }}"><br>
        @error('name') {{ $message }} @enderror
        E-mail: 
        <input type="text" name="email" value="{{ $data->email }}"><br>
        @error('email') {{ $message }} @enderror
        <input type="submit" value="Update">
    </form>
</body>
</html>