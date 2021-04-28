@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create post:</div>
               <div class="card-body">
                   <form action="{{ route('posts.store') }}" method="POST">
                       @csrf
                       <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                           <label>Town: </label>
                           <input type="text" name="town" class="form-control">

                           <small class="text-danger">{{ $errors->first('town') }}</small>
                       </div>
                       <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                           <label>Capacity: </label>
                           <input type="number" name="capacity" class="form-control"> 

                           <small class="text-danger">{{ $errors->first('capacity') }}</small>
                       </div>
                       <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                           <label>Code: </label>
                           <input id="text" name="code" class="form-control">

                           <small class="text-danger">{{ $errors->first('code') }}</small>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection