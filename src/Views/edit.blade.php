@extends( config('jonzz.layout') )

@section( config('jonzz.section') )

    <h1>{{ ( ($show == '0') ? 'Edit' : 'Viewing' ) }}  {{ $resource->name }}</h1>
    <hr/>

    {!! Form::model($resource, ['method' => 'PATCH', 'route' => [  config('jonzz.route.as') . 'update', $resource->id ], 'class' => 'form-horizontal']) !!}
    {!! Form::hidden('id', $resource->id) !!}    

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
        {!! Form::label('slug', 'Slug: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
        {!! Form::label('value', 'Value: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::number('value', null, ['class' => 'form-control']) !!}
            {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
        {!! Form::label('notes', 'Notes: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
            {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
           @if ($show == '0')
            {!! Form::submit('Edit', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            <div class="col-sm-offset-2 col-sm-3">
            {!! Form::open(['method'=>'delete','route'=> [ config('jonzz.route.as') . 'destroy',$resource->id] ]) !!}
              <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash-o fa-lg"></i> Delete
              </button>
            {!! Form::close() !!}
            </div>
           @else
                <i class="fa fa-pencil"></i> 
                <a href="{{ route( config('jonzz.route.as') . 'edit', $resource->id) }}" title="Edit '{{ $resource->name }}'">Edit '{{ $resource->name }}'</a>
           @endif
        </div>    
    </div>

@endsection