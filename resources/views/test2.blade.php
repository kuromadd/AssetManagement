
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
	
	<!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css"  type="text/css">
	
	<ul class="nav navbar-nav">
		  
		<li><a href="#" class="dropleft"><i class="fa fa-list"></i> blocks</a>
		  <ul class="dropdown-menu">
			  @foreach(\App\block::all() as $block)      
			<li><a href="#">Others<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				  @for($i = $block->sous; $i < $block->nbre_etage; $i++)   
				<li><a href="#">{{$i}}<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					  @foreach(\App\bureau::all() as $bureau)
					  @if($bureau->etage == $i) 
					<li><a href="#">Action</a></li>
					@endif
					@endforeach
				  </ul>
				</li>
				@endfor
			  </ul>
			</li>
			@endforeach  
		  </ul>
		</li>
	   
	  </ul>
	  
	</div><!--/.nav-collapse -->
	
    	
    <!-- Once the page is loaded, initialized the plugin. -->
    <script type="text/javascript" src="js/jquery-2.1.1.js" ></script>
	<script src="js/bootstrap.min.js"></script>
	

	<!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>

    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
