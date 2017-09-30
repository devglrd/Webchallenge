@extends('layouts.app.templates.app')

@section('content')
    <div class="container jumbotron mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <h1 class="text-center p-5">{{ $user->name }}</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <h2>designs</h2>
                @foreach($userDesigns as $design)
                    <div class="">
                        <strong>Titre du design</strong><br>{{ $design->title }}<br>
                        <strong>Contenue du design</strong><br>{{ $design->content }}<br>
                        <strong>Niveau de dificulté</strong><br>{{ $design->level_design }}<br>
                    </div>
                @endforeach
            </div>
            <div class="col">
                <h2>Information General</h2>
                    <strong>Email</strong> : {{ $user->email }}
                    <br>
                    <strong>Description</strong> : {{ $user->bio }}
                    <br>
                    <button type="button" class="btn btn-primary">{{ $user->statut }}</button>
            </div>
            <div class="col">
                <h2>Compétences</h2>
                @foreach($userSkills as $skill)
                    <button type="button" class="btn btn-success">{{ $skill->name }}</button>
                @endforeach
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center pt-5">
            <div class="col"></div>
            <div class="col-8">
                <h2>Articles</h2>
                @foreach($userPost as $post)
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection