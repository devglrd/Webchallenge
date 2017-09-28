@extends('layouts.app.templates.app')

@section('content')

    @foreach($designDispo as $design)

        {{ $design->title }}
        <br>
        {{ $design->content }}
        <br>
        {{ $design->level_design }}
        <br>
        <hr>
    @endforeach

@endsection