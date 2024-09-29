@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    @if(!empty($yajmaans))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Yajmaans List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('yajmaans.add') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <thead>
                        <th width="5%">Id</th>
                        <th width="15%">yajmaan_name</th>
                        <th width="15%">purohit</th>
                        <th width="15%">additional_purohit</th>
                        <th width="15%">contact_no</th>
                        <th width="15%">yajmaan_location</th>
                        <th width="15%">yajmaan_street</th>
                        <th width="15%">Created</th>
                        <th width="15%">Updated</th>
                        <th width="13%">Action</th>
                    </thead>
                    <tbody>
                    @foreach($yajmaans as $yajmaan)
                        <tr>
                            <td class="table-text">
                                <div>{{$yajmaan->id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->yajmaan_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->purohit}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->additional_purohit}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->contact_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->yajmaan_location}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->yajmaan_street}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->created_at}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan->updated_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('yajmaans.details', $yajmaan->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('yajmaans.edit', $yajmaan->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('yajmaans.delete', $yajmaan->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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