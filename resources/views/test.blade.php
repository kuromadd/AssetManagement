<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
<<<<<<< HEAD
#checkbox-container{
  margin: 10px 5px;
}

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
<body>
  <input type="text" placeholder="Type something here" />

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