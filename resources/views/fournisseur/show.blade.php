@extends('app.edit_layout')
@section('content')
            <div class="card card-default">
                  <div class="card-header">  
                    Fournisseur {{$fournisseur->libel}}
                   <a class="close" href="#">&times;</a>
                </div>
            
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="libel">Name</label>
                    <input type="text" name="libel" disabled value="{{ $fournisseur->libel }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adress</label>
                        <input type="text" name="address" disabled value="{{$fournisseur->address}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tel">Tel</label>
                        <input type="text" name="tel" disabled value="{{$fournisseur->tel}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" disabled value="{{$fournisseur->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" disabled value="{{$fournisseur->website}}" class="form-control">
                    </div>
            
                
            </div>
        </div>
@endsection    