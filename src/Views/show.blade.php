@extends('layouts.master')

@section('content')

    <h1>Attribute</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Value</th><th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $attribute->id }}</td> <td> {{ $attribute->name }} </td><td> {{ $attribute->value }} </td><td> {{ $attribute->notes }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection