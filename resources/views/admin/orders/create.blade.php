@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Nova compra</h3>

			@include('errors._check')

			{!! Form::open(['route'=> 'admin.orders.store']) !!}

				@include('admin.orders._form')

				<div class="form-group">
					{!! Form::submit('Criar compra', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection