	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Twitter Bootstrap 3 Fixed Layout Example</title>
		<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="{{URL::asset('css/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="{{URL::asset('css/sb-admin-2.css')}}" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
		<!-- 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<style type="text/css">
			body{
				padding-top: 70px;
			}
		</style>

		<script>
			$(".dropdown-menu li a").click(function(){
				var selText = $(this).text(); 
				$(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
			});
		</script>
	-->
</head>
<body>
	<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Kos App</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li ><a href="{{URL::to('main')}}">Cari Kos</a></li>
					<li class="active"><a href="{{URL::to('tentang')}}">Tentang</a></li>
				</ul>

			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row"><h1 class="page-header"></h1></div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-primary">

					</div>
					<div class="panel-body">

						<div class="form-group">
							
							<div class="jumbotron">
							<h1>Aplikasi Kos V.1</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing.</p>
								<p><a class="btn btn-primary btn-lg" role="button">Learn more</a>
								</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>                                		