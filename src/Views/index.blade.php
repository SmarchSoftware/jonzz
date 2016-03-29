@extends( config('jonzz.layout') )

@section( config('jonzz.section') )

    <h1><i class="fa fa-money fa-fw"></i> {{ config('jonzz.title', 'Jonzz Attributes') }}
    <div class="btn-group pull-right" role="group" aria-label="..."> 
      
        <a href="{{ route( config('jonzz.route.as') . 'create') }}">
        <button type="button" class="btn btn-info">
          <i class="fa fa-plus fa-fw"></i> 
          <span class="hidden-xs hidden-sm">Add New Jonzz Attribute</span>
        </button></a>
      
    </div>
    </h1>

    <div class="table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th><th>Value</th><th>Notes</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($resources as $item)
                <tr>
                    <td><a href="{{ url('jonzz', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->value }}</td><td>{{ $item->notes }}</td>
                
                    <td>
                        <a href="{{ route( config('jonzz.route.as') . 'show', $item->id) }}">
                          <button type="button" class="btn btn-primary btn-xs">
                          <i class="fa fa-search fa-fw"></i> 
                          <span class="hidden-xs hidden-sm">View</span>
                          </button></a>

                        <a href="{{ route( config('jonzz.route.as') . 'edit', $item->id) }}">
                          <button type="button" class="btn btn-default btn-xs">
                          <i class="fa fa-pencil fa-fw"></i> 
                          <span class="hidden-xs hidden-sm">Edit</span>
                          </button></a>

                        {!! Form::open(['method'=>'delete','route'=> [ config('jonzz.route.as') . 'destroy',$item->id], 'style' => 'display:inline']) !!}
                          <button type="submit" class="btn btn-danger btn-xs">
                          <i class="fa fa-trash-o fa-lg"></i> 
                          <span class="hidden-xs hidden-sm">Delete</span>
                          </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
              @empty
                <tr><td>There are no Jonzz attributes</td></tr>
              @endforelse
            </tbody>
        </table>
        <div class="pagination"> {!! $resources->render() !!} </div>
    </div>

@endsection
