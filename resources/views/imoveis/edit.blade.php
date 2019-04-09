@extends('layouts.app') @section('content')
<style>
.uper {
	margin-top: 40px;
}
</style>
<div class="card uper">
	<div class="card-header">Editar imóvel</div>
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li> @endforeach
			</ul>
		</div>
		<br /> @endif
		<form method="post"
			action="{{ URL::to('imoveis/editar/'.$imovel->id) }}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" name="nome" value={{ $imovel->nome }} />
        </div>
        <div class="form-group">
          <label for="tipo">Tipo:</label>
          {{ Form::select('tipo', array('casa' => 'Casa', 'apartamento' => 'Apartamento'), 'casa') }}
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
	</div>
</div>
@endsection
