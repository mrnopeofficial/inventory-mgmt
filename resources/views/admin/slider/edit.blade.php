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
                    <div class="card-header">Edit Slider</div>
                    <div class="card-body">
                        <form action="{{url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Old Image Data -->
                            <input type="hidden" name="old_image" value="{{$sliders->image}}">

                            <!-- Update Slider Title Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Slider Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $sliders->title }}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update Slider Description Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Slider Description</label>
                                <textarea type="text" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $sliders->description }}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update Slider Image Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Slider Image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlFile1" value="{{ $sliders->image }}">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Existing Slider Image -->
                            <div class="form-group">
                                <img src="{{asset($sliders->image)}}" style="max-width:600px; max-height: 600px;">

                            </div>
                            <button type="submit" class="btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection