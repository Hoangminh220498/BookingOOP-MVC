 <section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Request Payment</h1>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
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
                    <td><?php echo $values['money']; ?></td>
                    <td><?php echo $values['day_request']; ?></td>
                    <td><?php echo $values['payment_day']; ?></td>
                    <td><?php echo $values['status']; ?></td>
                    <td>
                        
                        <?php
                            if(($values['status'] == "Approve") or ($values['status'] == "Reject")){
                                echo '';
                            }else{
                        ?>
                        <a href="index.php?controller=staff&action=cancel&id=<?php echo $values['id']; ?>" title="cancel"><i class="fas fa-times-circle"></i></a> 
                        
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
		  <a href="index.php?controller=staff&action=request">Send Request</a>
        </div>
      </section>
    </section>
  </div>

</body>
</html>