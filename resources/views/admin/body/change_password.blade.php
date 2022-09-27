@extends('admin.admin_master')
@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin.updatepassword')}}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">Current Password</label>
                <input name="oldpassword" type="password" class="form-control" id="current_password" >
                @error('oldpassword')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input name="password" type="password" class="form-control" id="password" >
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" >
            </div>
            <button type="submit" class="btn btn-primary btn-default" >Save</button>
        </form>
    </div>
</div>
@endsection