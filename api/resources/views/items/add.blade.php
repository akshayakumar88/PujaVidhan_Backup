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
                Add a New Item <a href="{{ route('items.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('items.insert') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Unit</label>
                        <div class="col-sm-10">
                            <select name="unit" id="unit" class="form-control">
                                <option></option>
                                <option>Pcs</option>
                                <option>Set</option>
                                <option>Dzn</option>
                                <option>Kg</option>
                                <option>Gm</option>
                                <option>Gm/Kg</option>
                                <option>Ltr</option>
                                <option>Ltr/Kg</option>
                                <option>Mtr</option>
                                <option>Pkt</option>
                                <option>Pkt/Kg</option>
                            </select>
                            <!--<input type="text" name="unit" id="unit" class="form-control">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Sub Category</label>
                        <div class="col-sm-10">
                            <input type="text" name="item_sub_cat" id="item_sub_cat" class="form-control" value="ବାପା ଘର">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category Id</label>
                        <div class="col-sm-10">
                            <input type="number" name="catagory_id" id="catagory_id" class="form-control" value="4">
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