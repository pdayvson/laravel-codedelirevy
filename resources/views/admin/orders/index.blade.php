@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Compras</h3>
			<a href="{{ route('admin.orders.create')}}" class="btn btn-default">Nova compra</a>
			<br>
			<br>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Total</th>
						<th>Status</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $order)
					<tr>
						<td>{{$order->id}}</td>
						<td>{{$order->total}}</td>
						<td>{{$order->status}}</td>
						<td>
                            <a href="{{ route('admin.orders.edit', ['id'=> $order->id]) }}" class="btn btn-default btn-sm">Editar</a>
                            <a href="{{ route('admin.orders.destroy', ['id'=> $order->id]) }}" class="btn btn-danger btn-sm">Remover</a>
                        </td>
					</tr>
					@endforeach
				</tbody>
			</table>

			{!! $orders->render() !!}
		</div>
	</div>
@endsection