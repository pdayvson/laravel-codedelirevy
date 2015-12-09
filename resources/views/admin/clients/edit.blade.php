@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Editando cliente: {{$client->user->name}}</h3>

			@include('errors._check')

			{!! Form::model($client, ['route'=> ['admin.clients.update', $client->id]]) !!}

				@include('admin.clients._form')

				<div class="form-group">
					{!! Form::submit('Salvar cliente', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection