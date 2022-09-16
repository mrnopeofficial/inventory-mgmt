@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create service</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.service')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Service Title</label>
                    <input name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter service title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection