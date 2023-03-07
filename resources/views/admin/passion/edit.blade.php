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
                    <div class="card-header">Edit Passion</div>
                    <div class="card-body">
                        <form action="{{url('passion/update/'.$passions->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Old Image Data -->
                            <input type="hidden" name="old_image" value="{{$passions->image}}">

                            <!-- Update passion Title Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $passions->title }}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update passion Description Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Description</label>
                                <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="{{ $passions->description }}">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update Passion Story Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Passion Story</label>
                                <textarea type="text" name="story" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $passions->story }}</textarea>
                                @error('story')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update passion Image Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Passion Image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlFile1" value="{{ $passions->image }}">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Existing passion Image -->
                            <div class="form-group">
                                <img src="{{asset($passions->image)}}" style="max-width:600px; max-height: 600px;">

                            </div>
                            <button type="submit" class="btn btn-primary">Update Passion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection