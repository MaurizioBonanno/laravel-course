

@extends('templetes.layout')

@section('content')
   <h1>New Album</h1>
<form action="{{route('album.save')}}" method="POST" enctype="multipart/form-data">
       {{csrf_field()}}

       <div class="form-group">
        <label for="name">Name</label>
       <input type="text" name="name" id="name" value="" class="form-control" placeholder="name">
        <label for="description">Description</label>

        @include('albums.partials.upload')

       <textarea name="description" id="description"
        class="form-control" placeholder="description"></textarea>

       </div>
       <button class="btn-primary form-group" type="submit">Invia</button>
   </form>
@endsection
