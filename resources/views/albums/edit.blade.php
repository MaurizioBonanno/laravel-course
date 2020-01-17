
@extends('templetes.layout')

@section('content')
   <h1>Edit Album</h1>
   <form action="/updated/{{$album->id}}" method="POST" enctype="multipart/form-data">
       {{csrf_field()}}
       <input type="hidden" name="_method" value="PATCH">
       <div class="form-group">
        <label for="name">Name</label>
       <input type="text" name="name" id="name" value="{{$album->album_name}}" class="form-control" placeholder="name">

       @if ($album->album_thumb)
        <div class='form-group'>
        <img src="{{asset($album->path)}}" alt="" srcset="">
        </div>
       @endif

       @include('albums.partials.upload')

       <label for="description">Description</label>
       <textarea name="description" id="description"
        class="form-control" placeholder="description">{{$album->description}}</textarea>

       </div>
       <button class="btn-primary form-group" type="submit">Invia</button>
   </form>
@endsection


