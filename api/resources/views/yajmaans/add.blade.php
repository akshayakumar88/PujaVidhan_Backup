@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a New Item <a href="{{ route('yajmaans.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('yajmaans.insert') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >yajmaan_name</label>
                        <div class="col-sm-10">
                            <input type="text" name="yajmaan_name" id="yajmaan_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >purohit</label>
                        <div class="col-sm-10">
                            <input type="text" name="purohit" id="purohit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >additional_purohit</label>
                        <div class="col-sm-10">
                            <input type="text" name="additional_purohit" id="additional_purohit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >contact_no</label>
                        <div class="col-sm-10">
                            <input type="number" name="contact_no" id="contact_no" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >yajmaan_location</label>
                        <div class="col-sm-10">
                            <input type="text" name="yajmaan_location" id="yajmaan_location" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >yajmaan_street</label>
                        <div class="col-sm-10">
                            <input type="text" name="yajmaan_street" id="yajmaan_street" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Add Item" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection