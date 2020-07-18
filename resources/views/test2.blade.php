<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,700);
form {
  max-width: 450px;
  margin: 0 auto;
}
form > div {
  position: relative;
  background: white;
  border-bottom: 1px solid #ccc;
}
form > div > label {
  opacity: 0.3;
  font-weight: bold;
  position: absolute;
  top: 22px;
  left: 20px;
}
form > div > input[type="text"],
form > div > input[type="email"],
form > div > input[type="password"] {
  width: 100%;
  border: 0;
  padding: 20px 20px 20px 50px;
  background: #eee;
}
form > div > input[type="text"]:focus,
form > div > input[type="email"]:focus,
form > div > input[type="password"]:focus {
  outline: 0;
  background: white;
}
form > div > input[type="text"]:focus + label,
form > div > input[type="email"]:focus + label,
form > div > input[type="password"]:focus + label {
  opacity: 0;
}
form > div > input[type="text"]:valid,
form > div > input[type="email"]:valid,
form > div > input[type="password"]:valid {
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/check.svg);
  background-size: 20px;
  background-repeat: no-repeat;
  background-position: 20px 20px;
}
form > div > input[type="text"]:valid + label,
form > div > input[type="email"]:valid + label,
form > div > input[type="password"]:valid + label {
  opacity: 0;
}
form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="email"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="password"]:invalid:not(:focus):not(:placeholder-shown) {
  background: pink;
}
form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown) + label,
form > div > input[type="email"]:invalid:not(:focus):not(:placeholder-shown) + label,
form > div > input[type="password"]:invalid:not(:focus):not(:placeholder-shown) + label {
  opacity: 0;
}
form > div > input[type="text"]:invalid:focus:not(:placeholder-shown) ~ .requirements,
form > div > input[type="email"]:invalid:focus:not(:placeholder-shown) ~ .requirements,
form > div > input[type="password"]:invalid:focus:not(:placeholder-shown) ~ .requirements {
  max-height: 200px;
  padding: 0 30px 20px 50px;
}
form > div .requirements {
  padding: 0 30px 0 50px;
  color: #999;
  max-height: 0;
  -webkit-transition: 0.28s;
  transition: 0.28s;
  overflow: hidden;
  color: red;
  font-style: italic;
}
form input[type="submit"] {
  display: block;
  width: 100%;
  margin: 20px 0;
  background: #41D873;
  color: white;
  border: 0;
  padding: 20px;
  font-size: 1.2rem;
}

body {
  background: #333;
  font-family: 'PT Sans', sans-serif;
  padding: 20px;
}

* {
  box-sizing: border-box;
}		
</style>
<body>
	<form action="#0">

		<div>
		  <input type="text" id="first_name" name="first_name" required placeholder=" " />
		  <label for="first_name">First Name</label>
		</div>
		
		<div>
		  <input type="text" id="last_name" name="last_name" required placeholder=" " />
		  <label for="last_name">Last Name</label>
		</div>
		
		<div>
		  <input type="email" id="email" name="email" required placeholder=" " />
		  <label for="email">Email Address</label>
		  <div class="requirements">
			Must be a valid email address.
		  </div>
		</div>
		
		<div>
		  <input type="password" id="password" name="password" required placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" />
		  <label for="password">Password</label>
		  <div class="requirements">
			Your password must be at least 6 characters as well as contain at least one uppercase, one lowercase, and one number.
		  </div>
		</div>
		
		<input type="submit" value="Sign Up" />
	  
	  </form>
</body>
<script>

</script>
</html>