@extends('templetes.layout')

@section('content')
<h1>Albums</h1>
    @if(session()->has('message'))
       <div class="alert-info alert-dismissible fade show">
           {{session()->get('message')}}
       </div>
    @endif
<form>
<input type="hidden" name='_token' id='_token' value="{{csrf_token()}}">
<ul class='list-group'>
    @foreach ($albums as $album)

    <li class="list-group-item justify-content-between">({{$album->id}}) {{$album->album_name}}

         <div>
             @if ($album->album_thumb)
         <img width=120 src="{{asset($album->path)}}" alt="" srcset="">

             @endif
          <a href="albums/{{$album->id}}/edit" class="btn btn-primary btn-small">edit</a>
          <a href="albums/{{$album->id}}" class="btn btn-danger btn-small">Delete</a>
        </div>
     </li>

    @endforeach
</ul>
</form>
@endsection

@section('footer')

@parent

<script>
$('document').ready(function(){
    $('ul.list-group').on('click','a.btn-danger',function(ele){
        ele.preventDefault();
        var url = $(this).attr('href');
        var li = ele.target.parentNode.parentNode;
        $.ajax(url,
        {
            method: 'DELETE',
            data: {
                '_token': $('#_token').val()
            },
            complete: function(resp){
                if(resp.responseText == 1){
                    li.parentNode.removeChild(li);
                }else{
                    alert('qualcosa è andato storto');
                }
            }
        })
    })
});
</script>

@endsection
