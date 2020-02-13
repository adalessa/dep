<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Hola Mundo</h1>

    @foreach($users as $user)
        <div>
            <h3>{{$user->id}}</h3>
            <h3>{{$user->name}}</h3>
            <h3>{{$user->email}}</h3>
        </div>
    @endforeach
</body>
</html>
