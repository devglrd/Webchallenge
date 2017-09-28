@extends('layouts.app.templates.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Parlez nous un peu de vous</label>

                            <div class="col-md-6">
                                <textarea id="" class="form-control" name="bio" required  placeholder="{{ old('name') }}">
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
                                <select name="level_integrator[]" disabled="">
                                    <option value="Rien">Intermedaire</option>
                                    <option value="Rien">Bon</option>
                                    <option value="Rien">Expert</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Compétenes</label>

                            <div class="col-md-6">
                                <select name="skills[]">
                                    @foreach($allSkills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
