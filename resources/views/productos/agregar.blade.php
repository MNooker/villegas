@extends('layouts.app')
@section('content')

<form method="post" action="{{url('/productos')}}" class = "form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
<label for="Producto" class="control-label">{{'Producto'}}</label>
<input type="text"class="form-control"  name="Producto" id="Producto">
    </div>
<div class="form-group">
<label for="Descripcion" class="control-label">{{'Descripcion'}}</label>
<input type="text"  class="form-control" name="Descripcion" id="Descripcion">
</div>
<div class="form-group">
<label for="precio" class="control-label">{{'precio'}}</label>
<input type="text" class="form-control" name="precio" id="precio">
</div>
<div class="form-group">
<label for="imagen" class="control-label">{{'imagen'}}</label>
<input type="file" class="form-control" name="imagen" id="imagen">
</div>
<input  class="btn btn-success"type="submit" value="Agregar">
</form>
@endsection
