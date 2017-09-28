@extends('layouts.app.templates.app')

@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col">
                <h2>Mes designs</h2>
                @foreach($userDesign as $design)
                    <div class="card">
                        <strong>Titre du design</strong><br><br>{{ $design->title }}
                        <strong>Contenue du design</strong><br><br>{{ $design->content }}
                        <strong>Niveau de dificulté</strong><br><br>{{ $design->level_design }}
                    </div>
                @endforeach
            </div>
            <div class="col">
                <h2>Information General</h2>
                @foreach($userInfo as $info)
                    <strong>Email</strong> : {{ $info->email }}
                    <br>
                    <strong>Description</strong> : {{ $info->bio }}
                    <br>
                    <button type="button" class="btn btn-primary">{{ $info->statut }}</button>
                @endforeach
            </div>
            <div class="col">
                <h2>Compétences</h2>
                @foreach($userSkill as $skill)
                    <button type="button" class="btn btn-success">{{ $skill->name }}</button>
                @endforeach
            </div>
        </div>
    </div>
@endsection