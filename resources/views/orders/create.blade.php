@extends('master')
@section('title', 'Create a new order')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" accept-charset="UTF-8" enctype="multipart/form-data">

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
                    <legend>Submit a new order</legend>
                    
                    <!-- <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Price</label>
                        <div class="col-lg-10">
                            <input class="form-control" rows="3" id="price" name="price" required>
                        </div>
                    </div> -->
                    

                      <div class="form-group">
                        <form class="form-horizontal">
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Size</label>
                          <div class="col-lg-10">
                            <label class="radio-inline">
                              <input type="radio" name="size" id="size" value="A2"> A2 <small><strong>(RM1.10/pieces)</strong></small>
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="size" id="size" value="A3"> A3 <small><strong>(RM0.60/pieces)</strong></small>
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="size" id="size" value="A4"> A4 <small><strong>(RM0.15/pieces)</strong></small>
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-lg-2 control-label">Number of Copies</label>
                          <div class="col-lg-3">
                            <input type="copies" name="copies" class="form-control" id="copies" placeholder="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Page Layout</label>
                          <div class="col-lg-10">
                            <label class="radio-inline">
                              <input type="radio" name="layout" id="layout" value="potrait"> POTRAIT
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="layout" id="layout" value="landscape"> LANDSCAPE
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Printing Format</label>
                          <div class="col-lg-10">
                            <label class="radio-inline">
                              <input type="radio" name="colour" id="colour" value="bw"> BLACK & WHITE <small><strong>(RM0.00/pieces)</strong></small>
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="colour" id="colour" value="colored"> COLOURED <small><strong>(RM0.10/pieces)</strong></small>
                            </label>
                          </div>
                        </div>

                        <div class="form-group col-md-10" class="upload_file">
                          <div class="col-md-10">
                          {!! Form::open(array('url'=>'upload/uploadFiles','method'=>'POST', 'files'=>true)) !!}
                              <div class="form-group is-empty is-fileinput"> 
                              {!! Form::file('images[]', array('multiple'=>true)) !!}
                                {!!$errors->first('images')!!}
                                <div class="input-group">
                                  <input type="text" readonly="" class="form-control" placeholder="Placeholder w/file chooser...">
                                    <span class="input-group-btn input-group-sm">
                                      <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="material-icons">attach_file</i>
                                      </button>
                                    </span>
                                </div>
                                </div>
                              </div>
                            </div>
                    

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>  
                </fieldset>
            </form>
        </div>
    </div>
@endsection