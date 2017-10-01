@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4 text-capitalize">{{ $section }}
                    {{-- <small>Secondary Text</small> --}}
                </h1>

                @foreach($items as $item)
                    <!-- Blog Post -->
                        <div class="card mb-4">
                            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p class="card-text">{{ $item->content }}</p>
                                <a href="{{ route('blog.show', $item->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on {{ $item->created_at }} By <a href="{{ route('user.show', $item->author['name']) }}">{{ $item->author['name'] }}</a>
                            </div>
                        </div>
                @endforeach


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {{-- $items->links() --}}
                </ul>

            </div>

            @include('.layouts.app.partials._widgets')
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection