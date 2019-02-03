@extends('layouts.app')

@section('title','Gestión de usuarios')
@section('content')

<link rel="stylesheet"	type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


<div class="col-md-12 text-center">
<div class="panel-body">
	<table class="table table-bordered" id="miTabla">

		<thead>
			<th class="text-center">Nombre</th>
			<th class="text-center">Apellido</th>
			<th class="text-center">E-mail</th>
			<th class="text-center">Nick</th>
			<th class="text-center">Dni</th>
			<th class="text-center">Editar</th>
			<th class="text-center">Eliminar</th>


		</thead>
		<tbody>
			@forelse($users as $user)
				<tr>
					<td class="text-center">{{$user->name}}</td>
					<td class="text-center">{{$user->surname}}</td>
					<td class="text-center">{{$user->email}}</td>
					<td class="text-center">{{$user->nick}}</td>
					<td class="text-center">{{$user->dni}}</td>
					<td class="text-center"><a href="" class="btn btn-success">Editar</a></td>
					<td class="text-center"><a href="{{ route('user.destroy',$user->id) }}" class="btn btn-danger">Eliminar</a></td>
					
				</tr>
			@empty
				<h2>No hay datos a cargar</h2>
			@endforelse

		</tbody>

	</table>	
	@if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
</div>
</div>


<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
    $('#miTabla').DataTable();
} );
</script>

@endsection