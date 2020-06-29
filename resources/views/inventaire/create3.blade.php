@extends('app.edit_layout')
@section('content')
<style>
:root{
  --background-dark: #2d3548;
  --text-light: rgba(255,255,255,0.6);
  --text-lighter: rgba(255,255,255,0.9);
  --spacing-s: 8px;
  --spacing-m: 16px;
  --spacing-l: 24px;
  --spacing-xl: 32px;
  --spacing-xxl: 64px;
  --width-container: 1200px;
}

*{
  border: 0;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.hero-section{
  align-items: flex-start;
  background-image: linear-gradient(15deg, #0f4667 0%, #2a6973 150%);
  display: flex;
  min-height: 100%;
  justify-content: center;
  padding: var(--spacing-xxl) var(--spacing-l);
}

.card-grid{
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-column-gap: var(--spacing-l);
  grid-row-gap: var(--spacing-l);
  max-width: var(--width-container);
  width: 100%;
}

@media(min-width: 540px){
  .card-grid{
    grid-template-columns: repeat(2, 1fr); 
  }
}

@media(min-width: 960px){
  .card-grid{
    grid-template-columns: repeat(4, 1fr); 
  }
}

.card{
  list-style: none;
  position: relative;
  background: none;
}

.card:before{
  content: '';
  display: block;
  padding-bottom: 150%;
  width: 100%;
}

.card__background{
  background-size: cover;
  background-position: center;
  border-radius: var(--spacing-l);
  bottom: 0;
  filter: brightness(0.75) saturate(1.2) contrast(0.85);
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform-origin: center;
  trsnsform: scale(1) translateZ(0);
  transition: 
    filter 200ms linear,
    transform 200ms linear;
}

.card:hover .card__background{
  transform: scale(1.05) translateZ(0);
}

.card-grid:hover > .card:not(:hover) .card__background{
  filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
}

.card__content{
  left: 0;
  padding: var(--spacing-l);
  position: absolute;
  top: 0;
}

.card__category{
  color: var(--text-light);
  font-size: 0.9rem;
  margin-bottom: var(--spacing-s);
  text-transform: uppercase;
}

.card__heading{
  color: var(--text-lighter);
  font-size: 1.9rem;
  text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
  line-height: 1.4;
  word-spacing: 100vw;
}


</style>
<body>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

       
       <form action="{{ route('storeInventaire') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="row">
          <div class="col">
              <div style=" position: relative;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;border: 1px solid rgba(0, 0, 0, .05);border-radius: .375rem; background-color: #fff;background-clip: border-box;" class="shadow">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">Inventaire</h3>
                          </div>
                          <div class="col-4 text-right">
                          <a href="{{route('reset',['id',0])}}" class="btn btn-sm btn-primary">reset</a>
                          <button type="submit" class="btn btn-sm btn-primary">finish</button>
                          </div>
                      </div>
                  </div>
                  
                 
              
              
                <div class="card-grid">
                @foreach(\App\block::all() as $block)  
                  <div class="card" href="#">
                    <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557177324-56c542165309?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)"></div>
                    <div class="card__content">
                      <h4 class="card__heading">{{$block->name}}</h4>
                      <h3 class="card__category">{{$block->adress}}</h3>
                      <br><br><br><br><br><br>
                      <select class="form-control etage" style="border: none;background:#2d3548;color: #fff;" onchange="callbureaus({{$block->id}})" style="border-style:none ;"> 
                        <option selected disabled >select etage</option>
                        @for ($i = $block->sous; $i <= $block->nbre_etage; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor                   
                       </select>
                    </div>
                </div>
                @endforeach
                <div>
              </section>       
              
              <script type="text/javascript">
               function callbureaus(id) {
                  let url = "{{ route('getbureau', ['id'=>':id','etage'=>':etage']) }}";
                  url = url.replace(':id', id);
                  
                  url = url.replace(':etage', $('.etage').val());
                  document.location.href=url;
              }
              </script>


</div>  
</div>  
</div>
</form>

        
@endsection
