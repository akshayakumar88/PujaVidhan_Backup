@extends('layouts.admin')

@section('content')
<?php
    $toexplist = ["Pratipada","Dwitiya","Trititiya","Chaturthi","Panchami","Sasthi","Saptami","Asthami","Navami","Dashami","Ekadashi","Dwadashi","Trayodashi","Charturdashi","Amvashya","Purnnami"];
    $moexplist = ["Baishakh","Jestha","Aashadh","Sravan","Bhadrav","Aswin","Kartik","Margasir","Paush","Magh","Phalgun","Chaitra"];
    $relatives = ["Father","Mother","Wife","Brother","Sister","Son","Daughter","Grandfather","Grandmother","Great Grandfather","Great Grandmother","Self"];

?>
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
                Add a New Item <a href="{{ route('yajmaan_relatives.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('yajmaan_relatives.insert') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >relname</label>
                        <div class="col-sm-10">
                            <input type="text" name="relname" id="relname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >relation</label>
                        <div class="col-sm-10">
                            <!--<input type="text" name="relation" id="relation" class="form-control">-->
                            <select name="relation" id="relation" class="form-control">
                                @foreach($relatives as $relatives)
                                    <option>{{$relatives}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >toexp</label>
                        <div class="col-sm-10">
                            <!--<input type="text" name="toexp" id="toexp" class="form-control">-->
                            <select name="toexp" id="toexp" class="form-control">
                                @foreach($toexplist as $toexplist)
                                    <option>{{$toexplist}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >poexp</label>
                        <div class="col-sm-10">
                            <!--<input type="text" name="poexp" id="poexp" class="form-control">-->
                            <select name="poexp" id="poexp" class="form-control">
                                <option>Krishna</option>
                                <option>Shukla</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >moexp</label>
                        <div class="col-sm-10">
                            <!--<input type="text" name="moexp" id="moexp" class="form-control">-->
                            <select name="moexp" id="moexp" class="form-control">
                                @foreach($moexplist as $moexplist)
                                    <option>{{$moexplist}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >doexp</label>
                        <div class="col-sm-10">
                            <input type="date" name="doexp" id="doexp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >yajmaan_id</label>
                        <div class="col-sm-10">
                            <input type="text" name="yajmaan_id" id="yajmaan_id" class="form-control">
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