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
      <section class="attendance">
        <div class="attendance-list">
            <h1>Add Account</h1>
            <form method="POST" action="" id="contactForm" name="contactForm">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" name="username" id="username" placeholder="Username">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input type="password" class="form-control" name="password" id="subject" placeholder="Password">
					</div>
				</div>
				<div class="col-md-12"> 
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" name="address" id="subject" placeholder="Address">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input type="" class="form-control" name="phone" id="subject" placeholder="Phone">
					</div>
				</div>
				<div class="col-md-12">
					<label for="">Gender</label>
						<select name="gender" id="">
							<option value ="Male">Male</option>
							<option value ="Female">Female</option>
							<option value ="Other">Other</option>
						</select>
				</div>
				<div class="col-md-12">
					<label for="">Account</label>
						<select name="role" id="">
							<option value ="2">Admin</option>
							<option value ="1">Staff</option>
							<option value ="0">User</option>
						</select>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<!-- <input type="submit" value="Add Account" name="add_account" class="btn btn-primary"> -->
						<button type="submit" name="add_account" class="btn btn-primary">Add Account</button>
						<div class="submitting"></div>
						<a href="index.php?controller=admin&action=list_account" type="submit" value="Back" class="btn btn-primary">Back</a>
						<div class=""></div>
					</div>
				</div>
			</div>
		</form>
        </div>
      </section>
    </section>
  </div>

</body>
</html>