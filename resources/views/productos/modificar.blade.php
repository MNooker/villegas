@extends('layouts.app')
@section('content')
<form method="post" action="{{url('/productos/'.$datos->id)}}"  class = "form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
<label for="Producto" class="control-label">{{'Producto'}}</label>
<input type="text" class="form-control" name="Producto" value="{{$datos->Producto}}" id="Producto">
    </div>
<div class="form-group">
<label for="Descripcion" class="control-label">{{'Descripcion'}}</label>
<input type="text" class="form-control" name="Descripcion" value="{{$datos->Descripcion}}" id="Descripcion">
</div>
<div class="form-group">
<label for="precio" class="control-label">{{'precio'}}</label>
<input type="text" class="form-control" name="precio" value="{{$datos->precio}}" id="precio">
</div>
<br>
<div class="form-group">
<label for="imagen" class="control-label">{{'imagen'}}</label>
<img class="img-fluid" src="{{ asset('storage').'/'.$datos->imagen}}" alt="foto">
<input type="file" class="form-control" name="imagen" value="{{$datos->imagen}}" id="imagen">
</div>
<div class="form-group">
<input type="submit" class="btn btn-dark" value="editar">
<a href="{{url("productos/create")}}" class="nav-link">productos</a>
</div>
</form>
@endsection
