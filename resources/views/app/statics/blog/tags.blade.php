@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Blog
                    <small>Tags</small>
                </h1>
            @foreach($posts as $post)
                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on January 1, 2017 by
                            <a href="#">Start Bootstrap</a>
                        </div>
                    </div>
            @endforeach

            {{--
                <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4">
                        {{ $posts->links() }}
                    </ul>

                </div>
             --}}


            @include('.layouts.app.partials._widgets')
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection