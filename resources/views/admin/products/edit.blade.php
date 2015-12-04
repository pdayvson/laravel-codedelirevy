@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Editando produto: {{$product->name}}</h3>

			@include('errors._check')

			{!! Form::model($product, ['route'=> ['admin.products.update', $product->id]]) !!}

				@include('admin.products._form')

				<div class="form-group">
					{!! Form::submit('Salvar produto', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection