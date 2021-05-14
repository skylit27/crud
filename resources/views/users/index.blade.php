<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card">
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
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
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="get-all-employee"><i class="fa fa-download"></i> Descargar en PDF</a>
                </div>
            </div>
        </div>
    </body>
</html>
