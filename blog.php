<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BLOG</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Handlee');

	body{
		background: #ddd;
	}

	.navbar-expand-md .navbar-nav .nav-link {
    padding-right: 1rem;
    padding-left: 1rem;
    color: #444;
	}

	#konten{
		font-family: 'Handlee', cursive;
		background: #fbfbfb;
		border: 1px solid #ccc;
		width: 80%;
		min-height: 300px;
		padding: 30px;
	}

	table td{
		padding: 10px;
	}
</style>
<body>
	<div class="container text-center">
		<div class="row">
			<div class="col"><br>
				<h1>Febri AndTo - LOG</h1>
				<h6 class="text-muted">Hanya Sebuah Catatan</h6>
			</div>
		</div>
	</div>

	<br><br>

	<nav class="navbar navbar-expand-md">
	    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2"></div> <!-- div kosong -->
		    <div class="mx-auto order-0">
		    <ul class="navbar-nav mr-auto">

		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>

		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
		      </li>

		      <li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		    </ul>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
		            <span class="navbar-toggler-icon"></span>
		        </button>
		    </div>
	    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2"></div> <!-- div kosong -->
	</nav>
	
	<div class="container" id="konten">
		<div class="row">
			<div class="col">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, accusamus.</p>
				<table>
					<tr>
						<th colspan="2">2018</th>
					</tr>
					<tr>
						<td>20 Jun 2018</td>
						<td><a href="#" class="text-success">Lorem ipsum dolor sit.</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>	
</body>
</html>