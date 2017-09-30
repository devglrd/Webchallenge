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
                                    <a href="#">{{ $tag->tag }}</a>
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
        <h5 class="card-header">Ajouter un desig !</h5>
        <div class="card-body">
            Ajouter votre design, si il obtient assez de vote il sera selectionner pour etre integré par des devellopeur cette semaine !
            <br>

            @if(Route::is('designs.index') or Route::is('designs.create') or Route::is('designs.show') or Route::is('designs.edit'))
            <a type="button" class="btn btn-outline-info mt-4" href="{{ route('designs.create') }}">
                Ajouter un design
            </a>
            @else
            <a type="button" class="btn btn-outline-info mt-4" href="{{ route('blog.create') }}">
                Ajouter un article
            </a>
                @endif
            </a>
        </div>
    </div>

</div>
