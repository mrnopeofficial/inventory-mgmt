@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{url('contact/update/'.$contact->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" value="{{$contact->email}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone Number</label>
                    <input name="phone" type="text" class="form-control" id="exampleFormControlInput1" value="{{$contact->phone}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$contact->address}}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection