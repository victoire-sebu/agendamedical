<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <form action="{{route('factureproSearch')}}" class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Chercher" type="text" name="chercher">
            </div>
        </div>
    </form>
    @if (request()->input())
    <h5>{{$factureProformas->total()}} resultat(s) pour la recherche "{{request()->chercher ?? ''}}" </h5>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>

    @endif

    @if (count($errors)>0)
    <div class="alert alert-danger">
    <ul class="mb-0 mt-0">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>

    @endif
  </nav>