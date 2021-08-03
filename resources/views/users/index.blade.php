<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="antialiased">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card mt-2 mb-2 border-0 shadow ">
                    <div class="card-header">Agregar usuario</div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            - {{ $error }} <br />
                            @endforeach
                        </div>
                        @endif
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Usuario" aria-label="Usuario" aria-describedby="name">
                                </div>
                                <div class="col-sm-3">
                                    <input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Correo" aria-label="Correo" aria-describedby="email">
                                </div>
                                <div class="col-sm-3">
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="password">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button id="store" name="store" type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id }}</td>
                            <td>{{$user->name }}</td>
                            <td>{{$user->email }}</td>
                            <td>
                                <form action="{{route('users.destroy',$user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger" onclick="return confirm('Desea eliminar?')" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>