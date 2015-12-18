@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Cupons</h3>
			<a href="{{ route('admin.cupoms.create')}}" class="btn btn-default">Novo cupom</a>
			<br>
			<br>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Código</th>
						<th>Valor</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cupoms as $cupom)
					<tr>
						<td>{{$cupom->id}}</td>
						<td>{{$cupom->code}}</td>
						<td>{{$cupom->value}}</td>
						<td><a class="btn btn-default btn-sm">Editar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

			{!! $cupoms->render() !!}
		</div>
	</div>
@endsection