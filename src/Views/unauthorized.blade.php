@extends( config('jonzz.layout') )

@section( config('jonzz.section') )

      <div class="alert alert-danger lead">
        <i class="fa fa-exclamation-triangle fa-1x"></i> You are not permitted to {{$message}}.
      </div>

@endsection