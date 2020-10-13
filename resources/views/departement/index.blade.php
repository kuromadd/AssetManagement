@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow" style="margin-left: 16% ;width: 60%" >
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Departements</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a data-toggle="modal" data-target="#adddepartement" class="btn btn-primary btn-sm" style="color: white">Add departement</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-striped">
                        <thead class="thead-light">
                            <tr style="width: 100%">
                                <th scope="col" >Code_dep</th>
                                <th scope="col" >Libel</th>
                                <th scope="col" >Division</th>
                                <th scope="col" style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($departements as $departement)
                        <tr>
                            <td>{{$departement->code_dep}}</td>
                            <td>{{$departement->libel}}</td>
                            <td>{{\App\Division::find($departement->division_id)->libel}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('showDepartement',$departement->id)}}"><i class="fa fa-info fa-fw"></i></i> Show</a>
                                    <a class="dropdown-item" href="{{route('editDepartement',$departement->id)}}"><i class="fa fa-edit fa-fw"></i></i> Edit</a>
                                    <a class="dropdown-item" @if (\App\Service::where('departement_id',$departement->id)->get()->isEmpty())
                                         href="{{ route('deleteDepartement',$departement->id) }}"
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
                                You cant delete this departement, you have to delete its services first..!
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="adddepartement">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content " >
                            <form action="{{ route('storeDepartement') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                {{ csrf_field() }}
                                <div class="modal-header" style="margin-right: 5%;margin-left: 5%">
                                    <h2>Add Departement :</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                                <div class="model-body" style="margin-right: 5%;margin-left: 5%">

                                        <div class="form-group">
                                            <label for="name">Code departement :</label>
                                            <input type="text" name="code_dep" class="form-control" required>
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
                                            <label for="division_id">Division :</label>
                                                <select class="custom-select browser-default divisionID" name="division_id" id="division_id" required>
                                                  <option value="" disabled selected>pick a division</option>
                                                    @foreach(\App\Division::all() as $division)
                                                <option value="{{ $division->id }}">{{$division->libel}}</option>
                                                    @endforeach
                                                </select>               
                                                <div class="invalid-feedback">
                                                  Please select a division.
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
                       {!! $departements->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('departement.create')   --}} 
@endsection

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