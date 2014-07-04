
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="<?php echo site_url('home'); ?>">Bootstrap Admin Theme</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign Up</h6>
			                <input class="form-control" type="text" placeholder="E-mail address">
			                <input class="form-control" type="password" placeholder="Password">
			                <input class="form-control" type="password" placeholder="Confirm Password">
			                <div class="action">
			                    <a class="btn btn-primary signup" href="<?php echo site_url('signup'); ?>">Sign Up</a>
			                </div>                
			            </div>
			        </div>

			        <div class="already">
			            <p>Have an account already?</p>
			            <a href="<?php echo site_url('login'); ?>">Login</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>