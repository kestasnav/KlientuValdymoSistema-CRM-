<nav class="navbar navbar-expand-lg bg-success">
    <div class="container">
        @if ($user->canEdit())
        <a class="navbar-brand" href="#">Super Admin menu</a>
            @else
            <a class="navbar-brand" href="#">Admin menu</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    @foreach($user->getNavigation() as $item)
                        <a class="btn btn-danger float-end mx-1" href="{{$item['link']}}"> {{$item['name']}}</a>
                    @endforeach
                </li>

            </ul>

        </div>
    </div>
</nav>