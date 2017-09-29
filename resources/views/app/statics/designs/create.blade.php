@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row d-flex justify-content-center m-3">

            <!-- Blog Entries Column -->
            <div class="col-8">
                <div class="card" style="">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un design</h4>
                        <form action="">
                            <form class="form-horizontal" method="POST" action="{{ route('designs.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Titre du design</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('title') ?: $design->title }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Parlez nous un peu du design..</label>

                                    <div class="col-md-6">
                                        <textarea style="color: black" id="" class="form-control" name="bio" required>
                                            {{ old('title') ?: $design->title }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Niveau de dificulté du design</label>

                                    <div class="col-md-6">
                                        <select name="level_integrator[]">
                                            <option value="1">Intermedaire</option>
                                            <option value="2">Bon</option>
                                            <option value="3">Expert</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Niveau de dificulté du design</label>

                                    <div class="col-md-6">
                                        <input type="file" multiple>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Ajouter un design !
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection