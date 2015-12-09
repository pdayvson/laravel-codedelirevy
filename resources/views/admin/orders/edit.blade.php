@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<h2>Pedido #{{$order->id}} - R$ {{$order->total}}</h2>
            <h3>Cliente: {{$order->client->user->name}}</h3>
			<h4>Data: {{$order->created_at}}</h4>

            <p>
                <strong>Entregar em:</strong> <br>
                {{$order->client->address}} - {{$order->client->city}} - {{$order->client->state}}
            </p>

            <br>

			@include('errors._check')

			{!! Form::model($order, ['route'=> ['admin.orders.update', $order->id]]) !!}

                <div class="form-group">
                    {!! Form::label('status', 'Status:') !!}
                    {!! Form::select('status', $list_status, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('deliveryman_id', 'Entregador:') !!}
                    {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class' => 'form-control']) !!}
                </div>

				<div class="form-group">
					{!! Form::submit('Salvar pedido', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection