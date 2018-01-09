@extends('master')
@section('title', 'View a order')
@section('content')

    <div class="container col-md-6 col-md-offset-3">
            <div class="well well bs-component">
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <div class="content">
                <h2 class="header">ORDER ID #{!! $order->id !!}</h2> 
                <p><strong>Date: </strong>{!! $order->created_at->format('d/m/Y') !!}</p>
                <p> <strong>Email: </strong> {!! $user_id->email !!} </p>
                <p> <strong>Name: </strong> {!! $user_id->name !!} </p>
                <p> 
                        <strong>Status</strong>: 
                        @if( $order->status == "paid")
                            <span class="label label-success">{!! $order->status !!}</span>
                        @else
                            <span class="label label-danger">{!! $order->status !!}</span>
                        @endif
                </p>
                <p> <strong>Price: </strong>RM {!! $order->price !!} </p>
                <p> <strong>Size: </strong>{!! $order->size !!} </p>
                <p> <strong>Layout: </strong>{!! $order->layout !!} </p>
                <p> <strong>Colour: </strong>{!! $order->colour !!} </p>
                <p> <strong>No. of copies: </strong>{!! $order->noCopies !!} </p>
            </div>
            @if(Auth::user()->role_id === 1 || $order->user_id === Auth::user()->id )

            @if($order->status == "unpaid")

            @if(Auth::user()->role_id === 1)
            <a href="{!! action('OrdersController@edit', $order->id) !!}" class="btn btn-info btn-raised">Edit</a>
            @endif
            
            @if(Auth::user()->role_id != 1)
            <form method="post" action="{!! action('OrdersController@destroy', $order->id) !!}" class="pull-left">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div>
                <button type="submit" class="btn btn-warning btn-raised">Delete</button>
            </div>
            @endif

            @endif
            @endif
                    </div>
                </div>
                
</form>

<div class="clearfix"></div>
            </div>
    </div>

@endsection