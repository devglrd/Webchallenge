<!-- Sidebar Widgets Column -->
<div class="col-md-4"><!-- Search Widget -->
    <div class="card my-4"><h5 class="card-header">Search</h5>
        <div class="card-body">
            <div class="input-group"><input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn"><button class="btn btn-secondary" type="button">Go!</button></span>
            </div>
        </div>
    </div>@isset($category) <!-- Tags Widget -->
    <div class="card my-4"><h5 class="card-header">Category</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('categories.'.$section, $category) }}">{{ $category }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> @endisset @isset($tags) <!-- Tags Widget -->
    <div class="card my-4"><h5 class="card-header">Tags</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($tags as $tag)
                            <li><a href="{{ route('tags.'.$section, $tag->name) }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endisset

    <!-- Side Widget -->
    <div class="card my-4"><h5 class="card-header">Ajouter un {{ $section }} !</h5>
        <div class="card-body">@if(!empty(Auth::id())) Ajouter un {{ $section }}, Lorem ipsum dolor sit amet,
            consectetur adipisicing elit. At cumque <br>
            @if($section === 'designs')
                <strong class="{{ !isset($is_designer) ? 'mt-3' : ''}}">{{ !isset($is_designer) ? 'Vous devez etre designer pour ajouter un designe !' : '' }}</strong>
                <br>
                <a type="button" class="btn {{ !isset($is_designer) ? 'btn-outline-danger' : 'btn-outline-success' }} mt-4 {{ !isset($is_designer) ? 'disabled' : '' }}" href="{{ route($section.'.create')}}">Ajouter un {{ $section }}</a>
            @elseif($section === 'posts')
                <a type="button" class="btn btn-outline-success mt-4" href="{{ route($section.'.create')}}">Ajouterun {{ $section }}</a>
            @endif
            @else
                <strong>Vous devez être connecté pour ajouterun {{ $section }}</strong>
            <br>
            <a type="button" class="btn mt-4" href="{{route('login') }}">Connectez-vous</a>
            @endif
        </div>
    </div>
</div>
