@extends('app.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow" style="margin-left: 16% ;width: 60%" >
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Blocks</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="#popupbc" class="btn btn-sm btn-primary">Add block</a>
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr style="width: 100%">
                                <th scope="col" style="width: 40%">Name</th>
                                <th scope="col" style="width: 40%">Adress</th>
                                
                                <th scope="col" style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                        <tr>
                            <td>{{$block->name}}</td>
                            <td>{{$block->adress}}</td>
                            
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('editBlock',$block->id)}}"><i class="fa fa-edit fa-fw"></i></i> edit</a>
                                    <a class="dropdown-item" href="{{ route('deleteBlock',$block->id) }}"><i class="fa fa-trash fa-fw"></i> delete</a>

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
                       {!! $blocks->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('block.create')   
@endsection