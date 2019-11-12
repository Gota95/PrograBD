@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('sucursal.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="sucursal/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <th>Id</th>
                <th>Nombre </th>
                <th>Direccion</th>
                <th>Departamento</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Opciones</th>
              </thead>
              @foreach($sucursals as $suc)
                <tr>
                <td>{{$suc->idsucursal}}</td>
                <td>{{$suc->nombre}}</td>
                <td>{{$suc->direccion}}</td>
                <td>{{$suc->departamento}}</td>
                <td>{{$suc->latitud}}</td>
                <td>{{$suc->longitud}}</td>

          
                  <td>
                  <a href="{{ route('sucursal.edit', $suc->idsucursal) }}"> <button class="btn btn-info">Editar</button></a>
                   <a href="" data-target="#modal-delete-{{$suc->idsucursal}}" data-toggle="modal">
                   <button class="btn btn-danger"> Eliminar </button></a>

                </td>

                </tr>
                @include('sucursal.modal')
              @endforeach
            </table>
          </div>
          {{$sucursals->render()}}
        </div>
      </div>
    </div>


@endsection
