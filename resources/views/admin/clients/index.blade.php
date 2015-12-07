@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h3>Clientes</h3>
			<a href="{{ route('admin.clients.create')}}" class="btn btn-default">Novo cliente</a>
			<br>
			<br>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Produto</th>
						<th>Categoria</th>
						<th>Preço</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($clients as $client)
					<tr>
						<td>{{$client->id}}</td>
						<td>{{$client->address}}</td>
						<td>{{$client->zipcode}}</td>
						<td>{{$client->phone}}</td>
						<td>
                            <a href="{{ route('admin.clients.edit', ['id'=> $client->id]) }}" class="btn btn-default btn-sm">Editar</a>
                            <a href="{{ route('admin.clients.destroy', ['id'=> $client->id]) }}" class="btn btn-danger btn-sm">Remover</a>
                        </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $clients->render() !!}
		</div>
	</div>
@endsection