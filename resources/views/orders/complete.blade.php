@extends('master')
@section('title', 'View all orders')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Completed Order </h2>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($orders->isEmpty())
                    <p> There is no order.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ORDER ID</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Layout</th>
                                <th>Format</th>
                                <th>No. of Copies</th>
                                <th>File Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                    <a href="{!! action('OrdersController@show', $order->id) !!}">ORDER ID #{!! $order->id !!} </a> 
                                    </td>

                                    <td>
                                        @if( $order->status == "paid")
                                            <span class="label label-success">{!! $order->status !!}</span>
                                        @else
                                            <span class="label label-danger">{!! $order->status !!}</span>
                                        @endif
                                    </td>
                                    <td>RM  <?php echo number_format( $order->price , 2, '.', '') ?></td>
                                    <td>{!! $order->size !!}</td>
                                    <td>{!! $order->layout !!}</td>
                                    <td>{!! $order->colour !!}</td>
                                    <td class="text-center">{!! $order->noCopies !!}</td>
                                    <td>{!! $order->original_filename !!}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection