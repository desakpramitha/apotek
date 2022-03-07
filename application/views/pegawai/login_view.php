<html>
	<head>
		<title>Form Login</title>
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom fonts for this template -->

    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> -->

     <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/clean-blog.min.css')?>" rel="stylesheet">
	</head>
	<body style="background-color:lightblue;">
	<div class="container">
		<div class="row justify-content-center mt-5">
        	<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-transparent mb-0">
						<h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5>
					</div>
					
					<div class="card-body">
						<?php 
						if($this->session->flashdata('error') !='')
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo $this->session->flashdata('error');
							echo '</div>';
						}
						?>

						<?php 
						if($this->session->flashdata('success_register') !='')
						{
							echo '<div class="alert alert-info" role="alert">';
							echo $this->session->flashdata('success_register');
							echo '</div>';
						}
						?>
						<form method="post" action="<?php echo base_url(); ?>index.php/login_controller/login">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
							</div>
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>		
	</body>
</html>