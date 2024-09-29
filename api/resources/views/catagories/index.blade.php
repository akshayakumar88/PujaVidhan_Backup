@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    @if(!empty($catagories))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>catagorys List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('catagories.add') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <thead>
                        <th width="5%">Id</th>
                        <th width="15%">Name</th>
                        <th width="15%">Catagory Img</th>
                        <th width="15%">Created</th>
                        <th width="15%">Updated</th>
                        <th width="13%">Action</th>
                    </thead>
                    <tbody>
                    @foreach($catagories as $catagory)
                        <tr>
                            <td class="table-text">
                                <div>{{$catagory->id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$catagory->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$catagory->catimg}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$catagory->created_at}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$catagory->updated_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('catagories.details', $catagory->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('catagories.edit', $catagory->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('catagories.delete', $catagory->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
@endsection