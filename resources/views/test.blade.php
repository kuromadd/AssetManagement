@extends('app.edit_layout')
@section('content')
<style>
<<<<<<< HEAD
<<<<<<< HEAD
#checkbox-container{
  margin: 10px 5px;
}
=======
@blue: #4cc9c8;
@pink: #fa001a;

.dots(@color) {
  background:
    radial-gradient(@color 20%, transparent 19%),
    radial-gradient(@color 20%, transparent 19%),
    transparent;
  background-size: 6px 6px;
  background-position: 0 0, 3px 3px;
}

.card {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  display: grid;
  font-family: 'Trebuchet MS', sans-serif;
  height: 200px;
  margin: 20px auto;
  width: 350px;
}

// Front of card

.front {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(4, 1fr);
  
  .blue {
    background-color: @blue;
    grid-column: 8 / span 5;
    grid-row: 1 / span 4;
  }

  .yellow {
    background-color: #f1ef1c;
    grid-column: 1 / span 7;
    grid-row: 1 / span 4;
  }

  .pink {
    background-color: @pink;
    clip-path: polygon(0% 0%, 100% 0%, 0% 100%);
    grid-row: 1 / span 3;
    grid-column: 1 / span 11;
    position: relative;
    z-index: 2;
  }

  .dots {
    .dots(@pink);
    grid-column: 1 / span 12;
    grid-row: 3 / span 2;
    margin: 0 0 15px 20px;
    z-index: 1;
  }

  .personal-intro {
    background: black;
    color: white;
    display: flex;
    flex-direction: column;
    grid-column: 4 / span 6;
    grid-row: 2 / span 2;
    justify-content: center;
    text-align: center;
    z-index: 3;
    p {
      letter-spacing: 1px;
      text-transform: uppercase;
      &:first-of-type {
        font-size: 18px;
      }
      &:last-of-type {
        font-size: 8px;
        margin-top: 5px;
      }
    }
  }
}


// Back of card

.back {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(12, 1fr);
  
  .yellow {
    background-color: #f1ef1c;
    grid-column: 1 / span 9;
    grid-row: 1 / span 3;
  }
  
  .top.dots {
    .dots(@blue);
    grid-column: 8 / span 6;
    grid-row: 2 / span 3;
  }
  
  .personal-info {
    grid-column: 2 / span 6;
    grid-row: 5 / span 6;
    p {
      font-size: 10px;
      &:first-of-type {
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      &:nth-of-type(2){
        font-size: 12px;
        margin-bottom: 15px;
      }
    }
  }
  
  .bottom.dots {
    .dots(@blue);
    grid-column: 1 / span 8;
    grid-row: 11 / span 2;
    z-index: 2;
  }
  
  .pink {
    background-color: @pink;
    grid-column: 8 / span 5;
    grid-row: 10 / span 3;
  }
}



>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d

#checkbox-container div{
  margin-bottom: 5px;
}

#checkbox-container button{
  margin-top: 5px;
}

input[type=text] {
  padding: .5em .6em;
  display: inline-block;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 3px #ddd;
  border-radius: 4px;
}
=======

>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
</style>

<<<<<<< HEAD
<div id="checkbox-container">
  <div>
<<<<<<< HEAD
    <label for="option1">Option 1</label>
    <input type="checkbox" id="option1">
  </div>
  <div>
    <label for="option2">Option 2</label>
    <input type="checkbox" id="option2">
  </div>
  <div>
    <label for="option3">Option 3</label>
=======
    <label for="option">Option 1</label>
    <input type="checkbox" id="option1">
  </div>
  <div>
    <label for="option">Option 2</label>
    <input type="checkbox" id="option2">
  </div>
  <div>
    <label for="option">Option 3</label>
>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
    <input type="checkbox" id="option3">
  </div>
</div>
</body>
<<<<<<< HEAD
<script>
$(function(){
    var test = localStorage.input === 'true'? true: false;
    $('input').prop('checked', test || false);
});

$('input').on('change', function() {
    localStorage.input = $(this).is(':checked');
    console.log($(this).is(':checked'));
});
</script>
=======
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script>
              var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {},
                  $checkboxes = $("#checkbox-container :checkbox");
              
              $checkboxes.on("change", function(){
                $checkboxes.each(function(){
                  checkboxValues[this.id] = this.checked;
                });
                
                localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
              });
              
              // On page load
              $.each(checkboxValues, function(key, value) {
                $("#" + key).prop('checked', value);
                console.log("#" + key);
              });
              </script>

>>>>>>> 643516987fbeadb6b5b99bf5ab890447026af245
</html>
=======
<div class="card front">
  <div class="blue"></div>
  <div class="yellow"></div>
  <div class="pink"></div>
  <div class="dots"></div>
  <div class="personal-intro">
    <p>Krista Stone</p>
    <p>Photographer Maker Doer</p>
  </div>
</div>
<div class="card back">
  <div class="yellow"></div>
  <div class="top dots"></div>
  <div class="personal-info">
    <p>Krista Stone</p>
    <p>Photographer. Maker. Doer.</p>
    <p>123 Address St</p>
    <p>Sacramento, CA 14234</p>
    <p>567.890.1234</p>
    <p>www.kristastone.com</p>
    <p>@kristastone</p>
  </div>
  <div class="bottom dots"></div>
  <div class="pink"></div>
</div><script src="">
// Playing around with css grid, flexbox, clip-path, and radial-gradient

// Recreating the business card template as found here: https://novadonna.me/product/business-card-template-designs-pop-geometric/ 
</script>

@endsection
>>>>>>> bdc7b7d41342e12a5b90cd2c55ec534fb829cd0d
