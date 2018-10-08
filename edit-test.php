<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href="site.webmanifest">
		<link rel="apple-touch-icon" href="icon.png">
		<link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">

		<script src="vendor/jquery/dist/jquery.js"></script>
		<script src="vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
		
		<script src="js/index.js"></script>
	</head>
	<body class="bg-dark">

		<?php $lang = $_GET['lang']; ?>
		
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
			<a class="navbar-brand" href="#">#</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active mr-4">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Wyloguj</a>
					</li>
				</ul>
			</div>
		</nav>
<!-- END OF NAVBAR -->

<h1 class="text-center text-light my-4 text-uppercase">Test <?php echo $lang ?></h1>

<div id="pagination" class="container-fluid">
	<div class="row">
		<div class="mx-auto">
		</div>
	</div>
</div>

<!-- JS GENERATED TABLE -->
		<div id="test-content" class="container-fluid" data-testLang="<?php echo $lang ?>">			
		</div>
<!-- END OF JS GENERATED TABLE -->

<!-- MODAL OK -->
		<div class="modal fade" id="sqlUpdateOk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="sqlUpdateOkLabel">Zapisano pomyślnie</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Pomyślnie dokonano zmian.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
					</div>
				</div>
			</div>
		</div>
<!-- END OF MODAL OK -->

<!-- MODAL CONFIRM DELETION -->
		<div class="modal fade" id="deletionConfirmAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h5 class="modal-title text-light font-weight-bold" id="sqlUpdateOkLabel">Potwierdź usunięcie</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Czy napewno usunąć to pytanie?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Nie</button>
						<button type="button" id="deletionConfirm" data-idToDelete="" class="btn btn-success">Tak</button>
					</div>
				</div>
			</div>
		</div>
<!-- END OF MODAL CONFIRM DELETION -->

	</body>
</html>