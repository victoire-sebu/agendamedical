@extends('layouts.app')


@section('content')
    @include('layouts.headers.cards')
    
    
  
      <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                
              
                @include('pages.priseEnCharge.search')

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
                            <a href="{{route('prisechargeCreate')}}" class="btn btn-sm btn-primary">Nouveau</a>
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
                                    <th scope="col">Nom médecin</th>
                                    <th scope="col">Date signature document</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($prisecharges as $prisecharge)
                                    
                                
                                        <tr>
                                        <td>{{$prisecharge->nom_patient}}</td>
                                        <td>{{$prisecharge->nom_medecin}}</td>
                                        <td>{{$prisecharge->date_signature}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{route('prisechargeEdit',$prisecharge->id)}}">Modifier</a>
                                                    <a class="dropdown-item" href="{{route('prisechargeShow',$prisecharge->id)}}">Afficher</a>
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