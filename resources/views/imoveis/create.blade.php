@extends('layouts.app') @section('content')
<style>
.uper {
	margin-top: 40px;
}
</style>
<div class="card uper">
	<div class="card-header">Cadastrar imóvel</div>
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li> @endforeach
			</ul>
		</div>
		<br /> @endif
		<form method="post" action="{{ URL::to('imoveis/inserir') }}">
			<div class="form-group">
				{{ csrf_field() }}
				<label for="nome">Nome do imóvel:</label> <input type="text"
					class="form-control" name="nome" />
			</div>
			<div class="form-group">
				<label for="tipo">Tipo do imóvel:</label>
				{{ Form::select('tipo', array('casa' => 'Casa', 'apartamento' => 'Apartamento'), 'casa') }}
			</div>
			<button type="submit" class="btn btn-primary">Criar</button>
		</form>
	</div>
</div>
@endsection
