@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit About</h2>
        </div>
        <div class="card-body">
            <form action="{{url('about/update/'.$about->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">About Title</label>
                    <input name="title" class="form-control" id="exampleFormControlInput1" value="{{$about->title}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea name="short_desc" class="form-control" id="exampleFormControlTextarea1">{{$about->short_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea name="long_desc" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$about->long_desc}}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection