<section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Request Payment</h1>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
                <th>ID STAFF</th>
                <th>MONEY</th>
                <th>DAY REQUEST</th>
                <th>DAY PAYMENT</th>
                <th>STATUS</th>
                <th>ACCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    foreach($dataPayment as $values){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $values['id_staff']; ?></td>
                    <td><?php echo $values['money']; ?></td>
                    <td><?php echo $values['day_request']; ?></td>
                    <td><?php echo $values['payment_day']; ?></td>
                    <td><?php echo $values['status']; ?></td>
                    <td>
                        <!-- <a href="index.php?controller=admin&action=approve&id=<?php echo $values['id']; ?>" title="approve"><i class="fas fa-check-circle"></i></a> -->
                        <?php
                            if(($values['status'] == "Approve") or ($values['status'] == "Reject")){
                                echo '';
                            }else{
                        ?>
                         <a href="index.php?controller=admin&action=approve&id=<?php echo $values['id']; ?>" title="approve"><i class="fas fa-check-circle"></i></a>
                        <a href="index.php?controller=admin&action=reject&id=<?php echo $values['id']; ?>" title="reject"><i class="fas fa-times-circle"></i></a> 
                        
                        <?php
                            }
                        ?>

                    </td>  
                </tr>
                <?php
                    $stt++;
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