<section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Quản lý Booking</h1>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
                <th>ID ACCOUNT</th>
                <th>ID ROOM</th>
                <th>CHECK IN</th>
                <th>CHECK OUT</th>
                <th>TOTAL DAY</th>
                <th>PRICE</th>
                <th>TOTAL</th>
                <th>STATUS</th>
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
                    <td><?php echo $values['id_account']; ?></td>
                    <td><?php echo $values['id_room']; ?></td>
                    <td><?php echo $values['check_in']; ?></td>
                    <td><?php echo $values['check_out']; ?></td>
                    <td><?php echo $values['total_day']; ?></td>
                    <td><?php echo $values['price']; ?></td>
                    <td><?php echo $values['total']; ?></td>
                    <td><?php echo $values['status']; ?></td>
                    <td>
                        <a href="index.php?controller=admin&action=delete_booking&id=<?php echo $values['id']; ?>" title="delete"><i class="fas fa-eraser"></i></a>
                        <?php 
                          if($values['status']== NULL){
                        ?> 
                            <a href="index.php?controller=admin&action=confirm&id=<?php echo $values['id_account']; ?>" title="confirm payment"><i class="fas fa-check-circle"></i></a> 
                        <?php } else {
                          echo '';}
                        ?>
                        
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
        </div>
      </section>
    </section>
  </div>

</body>
</html>