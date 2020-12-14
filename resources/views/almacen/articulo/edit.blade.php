@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Editar Articulo: {{$articulo->nombre}}</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
            @endif

            {!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {!!Form::token()!!}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" placeholder="Nombre..">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="idcategoria" class="form-control" id="">
                    @foreach($categoria as $cat)
                        @if($cat->idcategoria==$articulo->idcategoria)
                        <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
                        @else
                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" value="{{$articulo->descripcion}}" class="form-control" placeholder="Descripcion del articulo..">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                @if(($articulo->imagen) != "")
                    <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" heigth="300px" width="300px">
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Eliminar</button>
            </div>
        </div>
    </div>


            {!!Form::close()!!}
@endsection