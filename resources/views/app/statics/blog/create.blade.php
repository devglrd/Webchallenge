@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row d-flex justify-content-center m-3">

            <!-- Blog Entries Column -->
            <div class="col-8">
                <div class="card" style="">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un article</h4>
                        <form class="form-horizontal" method="POST" action="{{ route('blog.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Titre de l'article</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="title" value="{{ old('title') ?: $post->title }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Contenue de l'article</label>

                                <div class="col-md-6">
                                    <textarea style="color: black" id="" class="form-control" name="content" required>
                                        {{ old('content') ?: $post->content }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Categories de l'article</label>

                                <div class="col-md-6">
                                    <select name="categories[]">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ajouter un article !
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection