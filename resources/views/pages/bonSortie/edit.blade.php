@extends('layouts.app', ['title' => __('Profil utilisateur')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Mme/Mr ') . ' '. auth()->user()->name,
        'description' => __('Prenez garde de bien renseigner les les champs proposé sur cette page avant tout enregistrement.'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            {{-- <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image ">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body pt-0 pt-md-4 mt-8">
                       
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                           
                            
                            <hr class="my-4" />
                            <p>{{ __('Astuce d\'utilisation de la page.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div> --}}


            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nouveau bon de sortie') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bonsortieUpate',$bonsorties->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                             <div class="form-row">
                             <div class="col-md-4 form-group">
                                <label class="control-label" for="date_signature">Nom patient</label>
                                  <input required type="text" value="{{$bonsorties->nom_patient}}" name="nom_patient" class="form-control form-control-alternative" id="nom_patient" placeholder="Nom patient">
                                  <div class="validate"></div>
                             </div>
                               <div class="col-md-4 form-group">
                                <label class="control-label" for="date_signature">Hopital/Centre</label>
                                 <input required type="text" value="{{$bonsorties->hotital_centre}}" name="hotital_centre" class="form-control form-control-alternative" id="hotital_centre" placeholder="Hopital/Centre">
                                 <div class="validate"></div>
                               </div>
                               <div class="col-md-4 form-group">
                                <label class="control-label" for="date_signature">Date signature</label>
                                <input required type="date" value="{{$bonsorties->date_signature}}" class="form-control form-control-alternative" name="date_signature" id="email" placeholder="Date signature">
                               </div> 
                             </div>
                            
                            <div class="form-group">
                               <label for="file">Choisir Image du doc</label>
                               
                               <img src="{{asset($bonsorties->image)}}" id="previewImg" alt="image doc" style="max-width:130px;margin-top:20px;" />
                               <input required type="file" name="image" value="{{$bonsorties->image}}" class="form-control" onChange="previewFile(this)"/>
                            </div>
                           
                            
                             <div class="text-center"><button type="submit" class="btn btn-success mt-4">Sauvegarder</button></div>
                        </form>

                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
    <script>
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
      </script>
@endsection
