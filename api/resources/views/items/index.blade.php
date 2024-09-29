@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    @if(!empty($items))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Items List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('items.add') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <thead>
                        <th width="15%">Name</th>
                        <th width="5%">Unit</th>
                        <th width="10%">SubCategory</th>
                        <th width="10%">Catagory</th>
                        <th width="10%">Created</th>
                        <th width="10%">Updated</th>
                        <th width="10%">Action</th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="table-text">
                                <div>{{$item->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$item->unit}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$item->item_sub_cat}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$item->catagory_id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$item->created_at}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$item->updated_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('items.details', $item->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('items.edit', $item->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('items.delete', $item->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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