@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change post information: </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Town: </label>
                            <input type="text" name="town" class="form-control" value="{{ $post->town }}">

                            <small class="text-danger">{{ $errors->first('town') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="">Capacity: </label>
                            <input type="number" name="capacity" class="form-control" value="{{ $post->capacity }}">

                            <small class="text-danger">{{ $errors->first('capacity') }}</small>
                        </div>
                        <div class="form-group">
                            <label>Code: </label>
                            <input type="text" name="code" class="form-control" value="{{ $post->code }}">

                            <small class="text-danger">{{ $errors->first('code') }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection