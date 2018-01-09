@extends('master')
@section('title', 'Edit a ticket')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <form class="form-horizontal" method="post">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    <legend>Edit order</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">ID</label>
                        <div class="col-lg-10">
                            <disabled class="form-control" rows="2" id="content" name="content">{!! $order->id !!}</disabled>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <disabled class="form-control" rows="2" id="status" name="status">{!! $order->status !!}</disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Price</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="2" id="price" name="price">{!! $order->price !!}</textarea>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a  href="/allorder" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection