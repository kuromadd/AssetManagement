@extends('app.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0" style="background-color: #ecf4fd">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Fournisseurs</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('fournisseur-create')<a href="#popupfc" class="btn btn-sm btn-primary">Add Fournisseur</a>@endcan
                        </div>
                    </div>
                </div>

                    
                                <style>
                                    .our-team {
                                  padding: 30px 0 40px;
                                  margin-bottom: 30px;
                                  
                                  text-align: center;
                                  overflow: hidden;
                                  position: relative;
                                }
                                
                                .our-team .title {
                                  display: block;
                                  font-size: 15px;
                                  color: #4e5052;
                                  text-transform: capitalize;
                                }
                                
                                .our-team .social {
                                  width: 100%;
                                  padding: 0;
                                  margin: 0;
                                  background-color: #1369ce;
                                  position: absolute;
                                  bottom: -100px;
                                  left: 0;
                                  transition: all 0.5s ease 0s;
                                }
                                
                                .our-team:hover .social {
                                  bottom: 0;
                                }
                                
                                .our-team .social li {
                                  display: inline-block;
                                }
                                
                                .our-team .social li a {
                                  display: block;
                                  padding: 10px;
                                  font-size: 17px;
                                  color: white;
                                  transition: all 0.3s ease 0s;
                                  text-decoration: none;
                                }
                                
                                .our-team .social li a:hover {
                                  color: #1369ce;
                                  background-color: none;
                                }
                                
                                </style>
                                
                                                        <div class="row" style="margin-left: 1px">
                                                            @foreach($fournisseurs as $fournisseur)
                                                        
                                                        
                                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                                              <div class="our-team" style="border-style: solid; border-color: #1369ce;">
                                                                
                                                                <div class="team-content">
                                                                    <h3 class="name">{{$fournisseur->libel}}</h3>
                                                                    <h3 class="name">{{$fournisseur->adress}}</h3>
                                                                    <h3 class="name">{{$fournisseur->tel}}</h3>
                                                                    <h3 class="name">{{$fournisseur->email}}</h3>  
                                                                    <h3 class="name">{{$fournisseur->website}}</h3>

                                                                </div>
                                                                <ul class="social">
                                                                  <li></li>
                                                                  <a  href="{{route('showFournisseur',$fournisseur->id)}}"><i class="fa fa-info fa-fw" style="color: white"></i>&#160&#160</a>
                                                                  @can('fournisseur-edit')<a href="{{route('editFournisseur',$fournisseur->id)}}"><i class="fa fa-edit fa-fw" style="color: white"></i>&#160&#160</a>@endcan
                                                                  @can('fournisseur-delete')<a href="{{ route('deleteFournisseur',$fournisseur->id) }}"><i class="fa fa-trash fa-fw" style="color: white"></i></a>@endcan
                                                                </ul>
                                                              </div>
                                                            </div>
                                                        
                                
                                
                                                                               
                                                        @endforeach 
                                                    </div> 

</div>
</div>
</div>
    @include('fournisseur.create')   
@endsection
