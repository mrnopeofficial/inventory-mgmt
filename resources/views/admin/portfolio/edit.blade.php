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
                    <div class="card-header">Edit Portfolio</div>
                    <div class="card-body">
                        <form action="{{url('portfolio/update/'.$portfolios->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Old Image Data -->
                            <input type="hidden" name="old_image" value="{{$portfolios->image}}">

                            <!-- Update portfolio Name Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $portfolios->name }}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update portfolio link Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update link</label>
                                <input type="text" name="link" class="form-control" id="exampleFormControlInput1" value="{{ $portfolios->link }}">
                                @error('link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update portfolio task Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update portfolio task</label>
                                <textarea type="text" name="task" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $portfolios->task }}</textarea>
                                @error('task')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update portfolio result Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update portfolio result</label>
                                <textarea type="text" name="result" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $portfolios->result }}</textarea>
                                @error('result')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Update portfolio Image Input Box -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update portfolio logo</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlFile1" value="{{ $portfolios->image }}">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Existing portfolio Image -->
                            <div class="form-group">
                                <img src="{{asset($portfolios->image)}}" style="max-width:600px; max-height: 600px;">

                            </div>
                            <button type="submit" class="btn btn-primary">Update portfolio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection