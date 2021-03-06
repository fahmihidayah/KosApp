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
					<li class="active"><a href="{{URL::to('main')}}" target="_blank">Cari Kos</a></li>
					<li><a href="{{URL::to('tentang')}}" target="_blank">Tentang</a></li>
				</ul>

			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row"><h1 class="page-header"></h1></div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{Form::label('email', 'Detail Kos', array('class' => 'awesome'))}}
					</div>
					<div class="panel-body">

						<div class="form-group">
							<p>Nama Kos : {{ $kos->nama}}<br>
							Alamat Kos : {{ $kos->alamat}}<br>
							</p>
							<a href="http://www.google.com" class="btn btn-default">Show Map</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>                                		