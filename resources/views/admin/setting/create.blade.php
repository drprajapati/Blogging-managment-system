@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('setting.update')}}" method ='post'>
                {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="site_name">Site Name </label>
                        <input type="text" name = "site_name"  class="form-control" value = "{{$setting->site_name}}">
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name = "contact_number" value = "{{$setting->contact_number}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact_email">Contact Email</label>
                        <input type="email" name = "contact_email" value = "{{$setting->contact_email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name = "address" value = "{{$setting->address}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type = "submit">Update Setting</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop