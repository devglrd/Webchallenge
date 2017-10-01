@extends('layouts.app.templates.app')

@section('content')
    <div class="container jumbotron mt-3">
        <div class="row">
            <div class="col-12 my-4">
                <h2>Information General</h2>
                <div class="col-12">
                    @foreach($userInfo as $info)
                        <p class="font-weight-bold">Email : {{ $info->email }}</p>
                        <p class="font-weight-bold">Description : {{ $info->bio }}</p>
                        <button type="button" class="btn btn-primary">{{ $info->statut }}</button>
                        <a type="button" class="btn btn-outline-secondary" href="{{ route('user.edit', $id = Auth::id()) }}">
                            Modifier mes informations
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 my-4">
                <h2>Compétences</h2>
                @foreach($userSkills as $skill)
                    <button type="button" class="btn btn-success m-2">{{ $skill->name }}</button>
                @endforeach
            </div>
            <div class="col-12 my-4">
                <h2 class="d-block">Vos Articles</h2>
                <div class="col-12 d-flex flex-wrap">
                    @foreach($userPost as $post)
                        <div class="col-5 bg-danger text-white m-2 p-2 ">
                            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <p class="card-text">{{ $post->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 my-4">
                <h2>Mes designs</h2>
                <div class="col-12 d-flex flex-wrap">
                    @foreach($userDesigns as $design)
                        <div class="col-5 bg-info text-white m-2 p-2">
                            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="my-2">Titre du design</h4>{{ $design->title }}
                                <p>{{ $design->content }}</p>
                                <p>Niveau de difficulté : {{ $design->level_design }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection