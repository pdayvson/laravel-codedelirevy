@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Novo produto</h3>

			@include('errors._check')

			{!! Form::open(['route'=> 'admin.products.store']) !!}

				@include('admin.products._form')

				<div class="form-group">
					{!! Form::submit('Criar produto', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection