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
                        <h2 class="card-title">{{ $design->title }}</h2>
                        <p class="card-text">{{ $design->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $design->created_at }} by <a href="{{ route('user.show', $design->author['name']) }}">{{ $design->author['name'] }}</a>
                    </div>
                </div>
            </div>

            @include('.layouts.app.partials._widgets')
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection