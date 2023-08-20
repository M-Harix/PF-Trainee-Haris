<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Users</title>
    </head>
    <body>
        <a href="{{ route('create') }}">Create New User</a><br><br><br><br>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($Data as $key => $value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>
                            <a href="{{ route('edituser',$value->id) }}">Edit</a>
                            <form action="{{ route('deleteuser',$value->id) }}" method="post">
                                @csrf
                                @method('post')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>