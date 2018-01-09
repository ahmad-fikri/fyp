<!-- @extends('master')
@section('title', 'Upload')

@section('content')
    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

    <div class="container">
      @if(Session::has('success'))
        <div class="alert-box success">
          <h2>{!! Session::get('success') !!}</h2>
        </div>
      @endif
      <h2>Please upload file</h2>
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
          @if(Session::has('error'))
            <p>{!! Session::get('error') !!}</p>
          @endif
          </div>
        {!! Form::submit('Submit', array('class'=>'btn btn-lg btn-primary col-md-4')) !!}
        {!! Form::close() !!}

      </div>
      
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- @endsection -->