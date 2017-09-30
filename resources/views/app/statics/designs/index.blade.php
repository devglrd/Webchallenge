@extends('layouts.app.templates.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Designs
                    {{-- <small>Secondary Text</small> --}}
                </h1>

            @foreach($designs as $design)
                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{ $design->title  }}</h2>
                            <p class="card-text">{{ $design->content }}</p>
                            <a href="{{ route('designs.show', $design->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on
                            <br>
                            by <a href="{{ route('user.show', $id = $design->designer['name']) }}">{{ $design->designer['name'] }}</a>
                        </div>
                    </div>
            @endforeach


            <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {{ $designs->links() }}
                </ul>

            </div>

            @include('.layouts.app.partials._widgets')
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection