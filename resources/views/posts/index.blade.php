@extends('layouts.app')
@section('content')
<h1 style="text-align:center">Posts</h1>
<div class="card-body">
@if (session('message'))
  <div class="alert alert-success">
    <p style="color: green"><b>{{ session('message') }}</b></p>
  </div>
  @endif
  
    <table class="table">
        <tr>
            <th>Town</th>
            <th>Capacity</th>
            <th>Code</th>
            <th>Veiksmai</th>
        </tr>
        @if($errors->any())
    	<h4 style="color: red">{{$errors->first()}}</h4>
        @endif
        
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->town }}</td>
            <td>{{ $post->capacity }}</td>
            <td>{{ $post->code }}</td>
            <td>
                <form action={{ route('posts.destroy', $post->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('posts.edit', $post->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create</a>
    </div>
</div>
@endsection