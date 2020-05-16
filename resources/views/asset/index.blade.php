@extends('app.layout')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Assets</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="#popupac" class="btn btn-sm btn-primary">Add asset</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush minha-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Mise en service a</th>
                                <th scope="col">Category</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($assets as $asset)
                        <tr>
                            <td>{{$asset->name}}</td>
                            <td>{{$asset->dateservice}}</td>
                            <td>{{$asset->category}}</td>
                            <td>
                                    <input type="checkbox" name="selects[]" 
                                    @if($asset->selected)
                                    checked 
                                    @endif id="box-{{$asset->id}}">
                                    <label class="" for="box-{{$asset->id}}"></label>
                                    
                            </td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('editAsset',$asset->id)}}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('deleteAsset',$asset->id) }}">delete</a>

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
                       {!! $assets->render() !!} 
                    </nav>
                </div>
            </div>
        </div>
    </div>
   @include('asset.create')  
   <script>
        var $table = document.querySelector('.minha-table');

        $table.addEventListener("click", function(ev){
        if (ev.target.tagName == "INPUT") {
            if (ev.target.checked) {
            ev.target.parentNode.parentNode.classList.add("selected");
            }else {
            ev.target.parentNode.parentNode.classList.remove("selected");
            }
        }
        });
</script>     
@endsection