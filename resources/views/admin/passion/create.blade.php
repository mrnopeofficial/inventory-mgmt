@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Passion</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.passion')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Passion Title</label>
                    <input name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter passion title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Passion Description</label>
                    <input name="description" class="form-control" id="exampleFormControlInput1" placeholder="Enter passion description">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Passion Story</label>
                    <textarea name="story" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Passion Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection