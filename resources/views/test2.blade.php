@extends('app.edit_layout')
@section('content')
<style>
*
{
	background: #f1f2f6;
	margin: 0;
	padding: 0;
}

.image-area
{
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	position: absolute;
}

.img-wrapper
{
	width: 300px;
	height: 400px;
	position: relative;
	overflow: hidden;
}

.img-wrapper:before
{
	content: '';
	position: absolute;
	top: 0;
	left: 180%;
	height: 100%;
	width: 100%;
	background: rgba(255,255,255,.3);
	z-index: 1;
	transform: skew(45deg);
	transition: .5s;
}

.img-wrapper:hover:before
{
	left: -180%;
}

.img-wrapper img
{
	height: 400px;
	width: 300px;
	filter: grayscale(100%);
	transition: 2s;
}
.img-wrapper:hover img
{
	filter: grayscale(0%);
	transform: scale(1.1);
}

.img-wrapper h2
{
	background: tomato;
	font-family: Poppins;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
	margin: 0;
	padding: 10px 0;
	position: absolute;
	bottom: 0;
	width: 100%;
	transform: perspective(400px) rotateY(90deg);
	transform-origin: right;
	transition: 1s;
}

.img-wrapper:hover h2
{
	transform: perspective(400px) rotateY(0deg);
}

.img-wrapper ul
{
	position: absolute;
	top: 0;
	left: 0;
	margin: 0;
	padding: 0;
	list-style: none;
	background: rgba(255,255,255,0);
}

.img-wrapper ul li
{
	background: #333;
	height: 40px;
	width: 40px;
	text-align: center;
	line-height: 40px;
	transform: perspective(800px) rotateY(90deg);
	transition: .5s;
	transform-origin: left;
}

.img-wrapper:hover ul li
{
	transform: perspective(800px) rotateY(0deg);
}

.img-wrapper:hover ul li:nth-child(1)
{
	transition-delay: .2s;
}

.img-wrapper:hover ul li:nth-child(2)
{
	transition-delay: .6s;
}

.img-wrapper:hover ul li:nth-child(3)
{
	transition-delay: .8s;
}

.img-wrapper:hover ul li:nth-child(4)
{
	transition-delay: 1s;
}

.img-wrapper ul li a
{
	color: tomato;
	background: rgba(255,255,255,0);
}

.img-wrapper ul li i
{
	color: tomato;
	background: rgba(255,255,255,0);
}

.img-wrapper ul li i:hover
{
	color: #fff;
	background: rgba(255,255,255,0);
}
</style>
<body>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Profile Image hover effect</title>
    <link rel="stylesheet" href="style.css">
  
    <!-- ------------ Font awesome CDN link ------------------ -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>
  <body>
    <div class="image-area">
      <div class="img-wrapper">
        <img src="https://images.pexels.com/photos/1220757/pexels-photo-1220757.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Atul Prajapati">
        <h2>David james</h2>
        <ul>
          <li><a href="https://github.com/atuljustano"><i class="fab fa-github"></i></a></li>
          <li><a href="https://www.instagram.com/atulkprajapati2000/"><i class="fab fa-instagram"></i></a></li>
          <li><a href="https://twitter.com/atuljustano"><i class="fab fa-twitter"></i></a></li>
          <li><a href="https://www.youtube.com/channel/UCf-KfxuY8PZBSD_8RW2nYsw"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </body>
  </html>
</body>
@endsection