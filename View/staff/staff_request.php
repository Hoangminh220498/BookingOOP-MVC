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
            <h1>Total Money : <?= $money['money']; ?></h1>
            <form method="POST" action="?controller=staff&action=send_request" id="contactForm" name="contactForm">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" name="withdraw" id="" placeholder="You want to withdraw">
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="form-group">
						<!-- <input type="submit" value="Add Account" name="add_account" class="btn btn-primary"> -->
						<input type="submit" name="send_request"value="Send Request" class="btn btn-primary" />
                        
						<div class="submitting"></div>
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