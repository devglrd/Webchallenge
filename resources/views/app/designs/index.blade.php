@extends('.layouts.app.app')

@section('content')
    @foreach($designDispo as $design)

    <hr>
    {{ $design->title }}
    <br>
    {{ $design->content }}
    <br>
    {{ $design->level_design }}
    <br>
    <hr>
    @endforeach
    @endsection