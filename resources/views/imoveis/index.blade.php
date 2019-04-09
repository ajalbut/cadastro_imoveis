@extends('layouts.app') @section('content')
<style>
.uper {
	margin-top: 40px;
}
</style>
<div class="uper">
	@if(session()->get('success'))
	<div class="alert alert-success">{{ session()->get('success') }}</div>
	<br /> @endif
	<a href="{{ URL::to('imoveis/inserir')}}"
					class="btn btn-primary">Inserir imóvel</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Tipo</td>
				<td colspan="2">Ação</td>
			</tr>
		</thead>
		<tbody>
			@foreach($imoveis as $imovel)
			<tr>
				<td>{{$imovel->id}}</td>
				<td>{{$imovel->nome}}</td>
				<td>{{$imovel->tipo}}</td>
				<td><a href="{{ URL::to('imoveis/editar',$imovel->id)}}"
					class="btn btn-primary">Editar</a></td>
				<td>
					<form action="{{ URL::to('imoveis/deletar', $imovel->id)}}"
						method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger" type="submit">Deletar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>@endsection