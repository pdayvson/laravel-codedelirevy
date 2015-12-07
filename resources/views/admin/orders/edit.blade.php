@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Editando produto: {{$order->name}}</h3>

			@include('errors._check')

			{!! Form::model($order, ['route'=> ['admin.orders.update', $order->id]]) !!}

				@include('admin.orders._form')

				<div class="form-group">
					{!! Form::submit('Salvar produto', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection