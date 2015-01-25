	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Twitter Bootstrap 3 Fixed Layout Example</title>
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
						<li class="active"><a href="http://www.tutorialrepublic.com" target="_blank">Cari Kos</a></li>
						<li><a href="http://www.tutorialrepublic.com/about-us.php" target="_blank">Tentang</a></li>
						<li><a href="http://www.tutorialrepublic.com/contact-us.php" target="_blank">Kontak</a></li>
					</ul>

				</div>
			</div>
		</nav>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">Cari Kos</div>
				{{Form::open(array('url' => 'find'))}}	
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<label>Jarak</label>
							<select name="jarak" class="form-control">
								<option>Dekat</option>
								<option>Sedang</option>
								<option>Jauh</option>
								<option>Sangat Jauh</option>
							</select>
						</div>
						<div class="col-lg-2">
							<label>Harga</label>
							<select name="harga" class="form-control">
								<option>Murah</option>
								<option>Sedang</option>
								<option>Mahal</option>
								<option>Sangat Mahal</option>
							</select>
						</div>
						<div class="col-lg-2">
							<label>Suasan</label>
							<select name="suasana" class="form-control">
								<option>Nyaman</option>
								<option>Sedang</option>
								<option>Tidak Nyaman</option>
								<option>Sangat Tidak Nyaman</option>
							</select>
						</div>

					</div>
					<br>
					<button type="submit" class="btn btn-primary">Cari</button>
				</div>
				{{Form::close()}}
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Hasil</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nama Kos</th>
							</tr>
						</thead>
						@foreach($list_kos as $kos)
						<tbody>
							<tr>
								<td>{{$kos->id}}</td>
								<td>{{$kos->nama}}</td>
							</tr>							
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
		</div>


	</div>
</body>
</html>                                		