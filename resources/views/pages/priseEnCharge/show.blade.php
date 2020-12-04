@extends('layouts.app', ['title' => __('Profil utilisateur')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Mme/Mr ') . ' '. auth()->user()->name,
        'description' => __('Prenez garde de bien renseigner les les champs proposé sur cette page avant tout enregistrement.'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image ">
                                {{-- <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body pt-0 pt-md-4 ">
                       
                        <div class="text-center">
                            <h3 class="mb-5">
                                Information de base pour ce document
                            </h3>
                            <hr>
                            <p>
                                <h3>Nom patient :</h3>
                                {{$prisecharges->nom_patient}}
                            </p>
                            <hr>
                            <p>
                                <h3> Hôpital / Centre</h3>
                                {{$prisecharges->nom_medecin}}
                            </p>
                            <hr>
                            <p>
                                <h3>Date de signature du document</h3>
                                {{$prisecharges->date_signature}}
                            </p>
                            <hr>
                            <p>
                                <h3>Date d'enregistrement du document dans l'application</h3>
                                {{$prisecharges->created_at}}
                            </p>
                           
                            
                            <hr class="my-4" />
                          
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Document en image') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="{{asset($prisecharges->image)}}" height="800px" width="600px" class="img-fluid"/>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
    {{-- <script>
        function previewFile(input){
          var file=$("input[type=file]").get(0).files[0];
          if(file){
            var reader=new FileReader();
            reader.onload=function(){
              $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
          }
        }
      </script> --}}
@endsection
