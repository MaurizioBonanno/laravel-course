
@extends('templetes.layout')

@section('content')

{{$title}}

@component('component.card',
    [
        'img_title'=>'image blog',
        'img_url'=>'http://lorempixel.com/400/200'
    ]
)

<p>Questo è il contenuto che va nello slot</p>

    @if($staff)
        <ul>

        </ul>
        @foreach($staff as $person)
            <li>{{$person['name']}}, {{$person['lastname']}}</li>
        @endforeach
    @endif

@endcomponent

@component('component.card')

@slot('img_url','http://lorempixel.com/400/200')
@slot('img_title','Seconda immagine')


@endcomponent


@include('component.card')

@endsection
