<section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Quản lý Booking</h1>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
                <th>ACCOUNT</th>
                <th>ID ROOM</th>
                <th>CHECK IN</th>
                <th>CHECK OUT</th>
                <th>TOTAL DAY</th>
                <th>PRICE</th>
                <th>TOTAL</th>
                <th>ACCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    if(!empty($dataBooking)){
                      foreach($dataBooking as $values){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $_SESSION['user']['username'];?></td>
                    <td><?php echo $values['id_room']; ?></td>
                    <td><?php echo $values['check_in']; ?></td>
                    <td><?php echo $values['check_out']; ?></td>
                    <td><?php echo $values['total_day']; ?></td>
                    <td><?php echo $values['price']; ?></td>
                    <td><?php echo $values['total']; ?></td>
                    <td>
                        <!-- <a href="index.php?controller=user&action=edit_booking&id=<?php echo $values['id']; ?>" title="update">Update</i></a> -->
                        <a href="index.php?controller=user&action=delete_booking&id=<?php echo $values['id']; ?>" title="cancel">Cancel</i></a>                      
                    </td>  
                </tr>
                <?php
                    $stt++;
                    } 
                  }  else {
                      echo "No Data";
                    } 
                ?>
            </tbody>
          </table>
          <a href="index.php?controller=user&" type="submit" value="Back" class="btn btn-primary">Back</a>
        </div>
      </section>
    </section>
  </div>

</body>
</html>