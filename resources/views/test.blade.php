<html>
<head>
	<title>Select only one checkbox at time</title>
	
</head>
<body>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<input value="1" name="subject" class="subject-list" type="checkbox">Subject 1  
    <input value="2" name="subject" class="subject-list" type="checkbox">Subject 2  
    <input value="3" name="subject" class="subject-list" type="checkbox">Subject 3  
    <input value="4" name="subject" class="subject-list" type="checkbox">Subject 4  
    <input value="5" name="subject" class="subject-list" type="checkbox">Subject 5  
    <script type="text/javascript">
	    $('.subject-list').on('change', function() {
		    $('.subject-list').not(this).prop('checked', false);  
		});
    </script>
</body>
</html>