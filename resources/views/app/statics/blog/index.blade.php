@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Blog
                    {{-- <small>Secondary Text</small> --}}
                </h1>

                @foreach($post as $posts)
                    <!-- Blog Post -->
                        <div class="card mb-4">
                            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $posts->title }}</h2>
                                <p class="card-text">{{ $posts->content }}</p>
                                <a href="{{ route('blog.show', $posts->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on
                                <br>
                                By <a href="{{ route('user.show', $id = $posts->author['name']) }}">{{ $posts->author['name'] }}</a>
                            </div>
                        </div>
                @endforeach


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {{ $post->links() }}
                </ul>

            </div>

            @include('.layouts.app.partials._widgets')
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection