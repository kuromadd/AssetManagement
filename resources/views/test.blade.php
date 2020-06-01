<style>
  .row {
display: flex;
flex-wrap: wrap;
padding: 0 4px;
}


@media screen and (max-width:300px) {
.column {
flex: 100%;
max-width: 100%;
}
}
.img{
height:auto; width:10%;
}
</style>
@if ($posts->count()>0)
<div class="row" style="float: left;">

@foreach($posts as $post)

<div class="column" style="height: auto;width: 300px;border-style:double;border-color: grey ">
 
  <div class="form-group">
  <img class="rounded-circle img-thumbnail" height="150 px" width="150 px" style="margin-left: 25%" src="{{ $post->featured }}" alt="doesn't exist" >
  </div>

  <div class="form-group">
      <label>&#160&#160 title :</label><label class="form-control">{{$post->title}}</label>
  </div>
  
  <div class="form-group">
      <label>&#160&#160 category :</label><label class="form-control">{{\App\category::find($post->category_id)->name}}</label>
  </div>

  <div class="form-group">
      <label >&#160&#160 tags</label><br>
      @foreach ()      
      &#160<label class="checkbox-inline"><input type="checkbox" value="{{$item->id}}" checked disabled>{{ $item->tag }}&#160&#160&#160</label>
          @endforeach
  </div>
  

  <div class="form-group">
  <label for="">&#160&#160 content :</label><textarea name="content" id="content" cols="5" rows="auto" class="form-control">{{ $post->content }}</textarea>
  </div><br>
  <div class="text-center">">trash&#160&#160</a><a class="text text-info" href="">&#160&#160edit</a>
  </div><br> 

</div>
@endforeach
@else
<label style="margin: 20%;color: grey;font-family: cursive;font-size: 20px">No posts</label>
@endif