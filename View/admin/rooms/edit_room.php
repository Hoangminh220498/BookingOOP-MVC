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
            <h1>Nhập thông tin chỉnh sửa Phòng</h1>
            <form method="POST" action="" id="contactForm" name="contactForm">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" name="room_number" id="room_number" placeholder="room_number" value="<?php echo $dataID['room_number']; ?>">
					</div>
				</div>
				<div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="img" value="<?php echo $dataID['img']; ?>"> 
                    </div>
                </div>
				<div class="col-md-12">
                    <label for="">Price</label>
                    <select name="price" id="" value="<?php echo $dataID['price']; ?>">
                        <option value ="100000">100,000</option>
                        <option value ="200000">200,000</option>
                        <option value ="300000">300,000</option>
                        <option value ="400000">400,000</option>
                        <option value ="500000">500,000</option>
                        <option value ="600000">600,000</option>
                        <option value ="700000">700,000</option>
                        <option value ="800000">800,000</option>
                        <option value ="900000">900,000</option>
                        <option value ="1000000">1,000,000</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="">Status</label>
                        <select name="status" id="">
                            <option value ="0">Trống</option>
                            <option value ="1">Đã Đặt</option>
                        </select>
                </div>
				<div class="col-md-12">
					<div class="form-group">
						<!-- <input type="submit" value="Add Account" name="add_account" class="btn btn-primary"> -->
						<button type="submit" name="update" class="btn btn-primary">Update</button>
						<div class="submitting"></div>
						<a href="index.php?controller=admin&action=list_room" type="submit" value="Back" class="btn btn-primary">Back</a>
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