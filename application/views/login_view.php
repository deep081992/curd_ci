<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php echo validation_errors();
				if($this->session->tempdata("success"))
				{
					echo "<p>".$this->session->tempdata("success")."</p>";
				}

				if($this->session->tempdata("error"))
				{
					echo "<p>".$this->session->tempdata("error")."</p>";
				}
				?>

				<?php echo form_open();?>
					<div class="row">
						<div class="col-md-9">
							<input type="text" name="uname" placeholder="Username" class="form-control">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9">
							<input type="password" name="login_pass" placeholder=" Enter Password" class="form-control">
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-md-9">
							<input type="submit" name="login" value="Login here!" class="btn btn-warning">
						</div>
					</div>
				<?php echo form_close()?>
			</div>
			<div class="col-md-3">
				
			</div>
			
		</div>
	</div>

	<div id="fh5co-started">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Hire Us!</h2>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					<p><a href="#" class="btn btn-default btn-lg">Contact Us</a></p>
				</div>
			</div>
		</div>
	</div>