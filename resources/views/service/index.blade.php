@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow" style="margin-left: 16% ;width: 60%" >
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Services</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a data-toggle="modal" data-target="#addservice" class="btn btn-primary btn-sm" style="color: white">Add sevice</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-striped">
                        <thead class="thead-light">
                            <tr style="width: 100%">
                                <th scope="col" >Code_ser</th>
                                <th scope="col" >Libel</th>
                                <th scope="col" >Departement</th>
                                <th scope="col" style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->code_ser}}</td>
                            <td>{{$service->libel}}</td>
                            <td>{{\App\Departement::find($service->departement_id)->libel}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('showService',$service->id)}}"><i class="fa fa-info fa-fw"></i></i> Show</a>
                                    <a class="dropdown-item" href="{{route('editService',$service->id)}}"><i class="fa fa-edit fa-fw"></i></i> Edit</a>
                                    <a class="dropdown-item" @if (\App\Bureau::where('service_id',$service->id)->get()->isEmpty())
                                         href="{{ route('deleteService',$service->id) }}"
                                    @else
                                    data-toggle="modal" data-target="#mal"
                                    @endif><i class="fa fa-trash fa-fw"></i> Delete</a>

                                    </div>
                                    
                                  
                                </div>
                            </td>
                        </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>

                <div class="modal fade " id="mal" role="alert">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-body alert-warning text-center h5">
                                You cant delete this service, you have to delete its offices first..!
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addservice">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content " >
                            <form action="{{ route('storeService') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                {{ csrf_field() }}
                                <div class="modal-header" style="margin-right: 5%;margin-left: 5%">
                                    <h2>Add service :</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                                <div class="model-body" style="margin-right: 5%;margin-left: 5%">

                                        <div class="form-group">
                                            <label for="name">Code service :</label>
                                            <input type="text" name="code_ser" class="form-control" required>
                                            <div class="invalid-feedback">
                                              Please provide a valid code.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="adress">Libel :</label>
                                            <input type="text" name="libel" class="form-control" required>
                                            <div class="invalid-feedback">
                                              Please provide a valid libel.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="departement_id">Departement :</label>
                                                <select class="custom-select browser-default departementID" name="departement_id" id="departement_id" required>
                                                  <option value="" disabled selected>pick a departement</option>
                                                    @foreach(\App\Departement::all() as $departement)
                                                <option value="{{ $departement->id }}">{{$departement->libel}}</option>
                                                    @endforeach
                                                </select>               
                                                <div class="invalid-feedback">
                                                  Please select a departement.
                                                </div>
                                            </div>
                    
                                </div>
                                <br>
                                <div class="model-footer text-center">
                                    <button class="btn btn-info" type="submit" >Save</button>
                                    <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                       {!! $services->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('service.create')   --}} 
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>(function() {
  'use strict';
  window.addEventListener('load', function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit', function(event) {
  if (form.checkValidity() === false) {
  event.preventDefault();
  event.stopPropagation();
  }
  form.classList.add('was-validated');
  }, false);
  });
  }, false);
  })();
  </script>