<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>

    @isset($category)
        <!-- Tags Widget -->
            <div class="card my-4">
                <h5 class="card-header">Category</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">{{ $category }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    @endisset

    @isset($tags)
        <!-- Tags Widget -->
        <div class="card my-4">
            <h5 class="card-header">Tags</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="list-unstyled mb-0">
                            @foreach($tags as $tag)
                                <li>
                                    <a href="{{ route('tags.'.$section, $tag->name) }}">{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endisset

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Add {{ $section }}</h5>
            <div class="card-body">
                @if(!empty(Auth::id()))
                    <a type="button" class="btn mt-4" href="{{ route($section.'.create')}}">
                        Ajouter un {{ $section }}
                    </a>
                @else
                    <a type="button" class="btn mt-4" href="{{route('login') }}">
                        Connectez-vous
                    </a>
                @endif
            </div>
        </div>
</div>
