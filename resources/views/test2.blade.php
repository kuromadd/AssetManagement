<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>

</style>
<body>
  <input type="text" placeholder="Type something here" />

<div id="checkbox-container">
  <div>
    <label for="option">Option 1</label>
    <input type="checkbox" id="option">
  </div>
  <div>
    <label for="option">Option 2</label>
    <input type="checkbox" id="option">
  </div>
  <div>
    <label for="option">Option 3</label>
    <input type="checkbox" id="option">
  </div>
</div>
</body>
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

</html>