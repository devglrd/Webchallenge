@extends('layouts.app.templates.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header">Mettre a jour son profil</div>
                        <div class="card-body">
                            <div class="row justify-content-center ">
                                <div class="col">
                                    <form class="form-horizontal" method="POST" action="{{ route('user.update', $id = $userCurrent->id) }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $userCurrent->name  }}" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ $userCurrent->email }}" required>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Parlez nous un peu de vous</label>

                                            <div class="col-md-6">
                                            <textarea style="color: black" id="" class="form-control" name="bio" required>{{ $userCurrent->bio }}
                                            </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Votre status</label>

                                            <div class="col-md-6">
                                                <select name="state[]">
                                                    <option value="Etudiant">Etudiant</option>
                                                    <option value="Pro">Professionel</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-4">
                                                <label for="" class="control-label">Designer</label>

                                                <div class="">
                                                    <input type="checkbox" name="designer">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="control-label">Developpeur</label>

                                                <div class="">
                                                    <input type="checkbox" name="developpeur" id="developpeur">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Niveau de developpement</label>

                                            <div class="col-md-6">
                                                <select name="level_integrator[]">
                                                    <option value="Intermediaire">Intermedaire</option>
                                                    <option value="Bon">Bon</option>
                                                    <option value="Expert">Expert</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Les competences que vous avez actuellement</label>

                                            <div class="col-md-6">
                                                @foreach($userSkill as $skiller)
                                                    <button type="button" class="btn btn-outline-info">{{ $skiller->name }}</button>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Ajouter de nouvelles competences</label>

                                            <div class="col-md-6">
                                                <select name="skills[]" multiple>
                                                    @foreach($allSkill as $hasnotskill)
                                                        <option value="{{ $hasnotskill->id }}">{{ $hasnotskill->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Modifier mes informations
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
