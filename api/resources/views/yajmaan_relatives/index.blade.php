@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    @if(!empty($yajmaan_relatives))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Yajmaan Relatives List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('yajmaan_relatives.add') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <thead>
                        <th width="5%">Id</th>
                        <th width="15%">relname</th>
                        <th width="15%">relation</th>
                        <th width="15%">toexp</th>
                        <th width="15%">poexp</th>
                        <th width="15%">moexp</th>
                        <th width="15%">doexp</th>
                        <th width="15%">yajmaan_id</th>
                        <th width="15%">Created</th>
                        <th width="15%">Updated</th>
                        <th width="13%">Action</th>
                    </thead>
                    <tbody>
                    @foreach($yajmaan_relatives as $yajmaan_relative)
                        <tr>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->relname}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->relation}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->toexp}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->poexp}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->moexp}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->doexp}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->yajmaan_id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->created_at}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$yajmaan_relative->updated_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('yajmaan_relatives.details', $yajmaan_relative->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('yajmaan_relatives.edit', $yajmaan_relative->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('yajmaan_relatives.delete', $yajmaan_relative->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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