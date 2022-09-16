@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="card-header">Edit Brand</div>
                    <div class="card-body">
                        <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Old Image Data -->
                            <input type="hidden" name="old_image" value="{{$brands->brand_image}}">

                            <!-- Update Brand Name Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update Brand Image Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
                                <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Existing Brand Image -->
                            <div class="form-group">
                                <img src="{{asset($brands->brand_image)}}" style="max-width:600px; max-height: 600px;">

                            </div>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection