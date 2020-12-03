@extends('layouts.app')


@section('content')
    @include('layouts.headers.cards')
    
    
  
      <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              
              
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <form action="{{route('bonsortieIndex')}}" class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </form>
              </nav>
            </div>
                      

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ordonnance de paiement</h3>
                            </div>
                            <div class="col-4 text-right">
                            <a href="{{route('ordonnancepaieCreate')}}" class="btn btn-sm btn-primary">Nouveau</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    </div>
    
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom patient</th>
                                    <th scope="col">Numero ordonnance</th>
                                    <th scope="col">Date signature document</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($ordonnacepaies as $ordonnacepaie)
                                    
                                
                                        <tr>
                                        <td>{{$ordonnacepaie->nom_patient}}</td>
                                        <td>{{$ordonnacepaie->num_ordonnance}}</td>
                                        <td>{{$ordonnacepaie->date_signature}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{route('ordonnancepaieEdit',$ordonnacepaie->id)}}">Modifier</a>
                                                    <a class="dropdown-item" href="{{route('ordonnancepaieShow',$ordonnacepaie->id)}}">Afficher</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
   
        

        

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush