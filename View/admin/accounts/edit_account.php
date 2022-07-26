
	<style>
input {
	width: 90%;
	height: 50px;
	border-style: inset;
	margin: 8px 0;
}
button {
	color: white;
	background-color: blue;
	font-size: 100%;
	border-style: outset;
	margin: 0 40%;
}
</style>

<section class="main" style=" width: 50%;">

				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">CHỈNH SỬA ACCOUNT</h2>
				</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">NHẬP THÔNG TIN THAY ĐỔI</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" action="" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" value="<?php echo $dataID['username']; ?>" class="form-control" name="username" id="username" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" value="<?php echo $dataID['password']; ?>" class="form-control" name="password" id="subject" placeholder="Password">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" value="<?php echo $dataID['email']; ?>" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
                                            <div class="col-md-12">
												<div class="form-group">
													<input type="text" value="<?php echo $dataID['address']; ?>" class="form-control" name="address" id="subject" placeholder="Address">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" value="<?php echo $dataID['phone']; ?>" class="form-control" name="phone" id="subject" placeholder="Phone">
												</div>
											</div>
                                            <div class="col-md-12">
                                                <label for="">Account</label>
                                                    <select name="role" id="">
                                                        <?php
                                                            if ($dataID['role'] == 2) {
                                                              echo ' <option selected="selected" value ="2">Admin</option>
                                                              <option value ="1">Staff</option>
                                                              <option value ="0">Users</option>';
                                                            }else if ($dataID['role'] == 1) {
                                                                echo ' <option  value ="2">Admin</option>
                                                                <option selected="selected" value ="1">Staff</option>
                                                                <option value ="0">Users</option>';
                                                            }else{
                                                                echo ' <option  value ="2">Admin</option>
                                                                <option value ="1">Staff</option>
                                                                <option selected="selected"  value ="0">Users</option>';
                                                            }
                                                        ?>
                                                    </select>
											</div>
                                            <input type="hidden" name="id" value="">
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="update" name="update" class="btn btn-primary">
													<div class="submitting"></div>
													<a href="index.php?controller=admin&action=list_account" type="submit" value="Back" class="btn btn-primary">Back</a>
													<div class=""></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js"></script>

