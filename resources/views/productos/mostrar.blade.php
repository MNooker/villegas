<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>precio</th>
                <th>Imagen</th>
                <th>Acciones

                </th>
            </tr>

        </thead>
        <tbody>
            @foreach ($datos as $item)


            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$item->Producto}}</td>
                <td>{{$item->Descripcion}}</td>
                <td>{{$item->precio}}</td>
            <td><img class="img-fluid" src="{{ asset('storage').'/'.$item->imagen}}" alt="foto" style="width: 50px"></td>>
            <td><a href="{{ url('/productos/'.$item->id.'/edit')}}">Editar</a> | <form action="{{url('/productos/'.$item->id)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" onclick="return confirm('borrar');">Borrar</button>
            </form>  </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $datos->links() }}


</body>
</html>
