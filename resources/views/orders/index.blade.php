@extends('master')
@section('title', 'View all orders')
@section('content')
    
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Order History </h2>
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

                                @if(Auth::user()->role_id != 1)
                                <th>Payment Action</th>
                                @endif

                                @if(Auth::user()->role_id === 1)
                                    <th>Attachment</th>
                                    <th>Action</th>
                                @endif
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

                                    @if(Auth::user()->role_id != 1)
                                    @if ($order->status == "unpaid" )
                                        @if($order->price > Auth::user()->credit)
                                            <td>
                                                <a href="/pay" class="btn btn-primary btn-md">Not insufficient credit.</a>
                                            </td>
                                        @else
                                            <td>                                         
                                                <form action="/charge" method="POST">
                                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                  <input type="hidden" name="price" value="{!! $order->price !!}    ">
                                                  <input type="hidden" name="orderid" value="{!! $order->id !!}    ">
                                                  <div>
                                                        @if(Auth::user()->role_id === 1)
                                                        <fieldset disabled>
                                                            <button type="submit" class="btn btn-primary btn-raised">Pay Now</button>    
                                                        </fieldset>
                                                        @else
                                                        <fieldset>
                                                            <button type="submit" class="btn btn-primary btn-raised">Pay Now</button>    
                                                        </fieldset>
                                                        @endif
                                                        
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                        
                                    @else
                                        <td>Payment Successfull</td>
                                    @endif
                                    @endif


                                        @if(Auth::user()->role_id === 1)
                                        <td>
                                            @if($order->status == "paid" && $order->print == "no")
                                            <a href="/storage/{{ $order->original_filename }}" target="_blank">
                                                Print
                                            </a>
                                            @else
                                                <p>Customer didn't pay yet</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/{!! $order->id !!}/done">Mark as Done</a>
                                        </td>
                                        @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection