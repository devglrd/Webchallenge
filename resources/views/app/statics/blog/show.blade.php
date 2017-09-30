@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                <div class="card my-4">
                    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->created_at }}
                        <br>
                        By <a href="{{ route('user.show', $id = $post->author['name']) }}">{{ $post->author['name'] }}</a>
                    </div>
                </div>


            </div>

            @include('.layouts.app.partials._widgets')
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection