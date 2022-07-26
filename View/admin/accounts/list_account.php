


<section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Quản lý Account</h1>
            <a href="index.php?controller=admin&action=add_account">Add Account</a>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th>USER/STAFF</th>
                <th>ACCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    foreach($dataAccount as $values){
                    if ($values['role'] == 1){
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $values['username']; ?></td>
                        <td><?php echo $values['email']; ?></td>
                        <td><?php echo $values['phone']; ?></td>
                        <td><?php echo $values['address']; ?></td>
                        <td>Staff</td>
                        <td>
                            <a href="index.php?controller=admin&action=edit_account&id=<?php echo $values['id']; ?>"><i class="fas fa-edit"></i></a> 
                            <a href="index.php?controller=admin&action=delete_account&id=<?php echo $values['id']; ?>" title="delete"><i class="fas fa-eraser"></i></a> 
                        </td>  
                    </tr>
                <?php
                    $stt++;
                    } elseif($values['role'] == 0){
                ?>
                     <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $values['username']; ?></td>
                        <td><?php echo $values['email']; ?></td>
                        <td><?php echo $values['phone']; ?></td>
                        <td><?php echo $values['address']; ?></td>
                        <td>User</td>
                        <td>
                            <a href="index.php?controller=admin&action=edit_account&id=<?php echo $values['id']; ?>"><i class="fas fa-edit"></i></a> 
                            <a href="index.php?controller=admin&action=delete_account&id=<?php echo $values['id']; ?>" title="delete"><i class="fas fa-eraser"></i></a> 
                        </td>  
                    </tr>
                <?php
                    $stt++;
                    }
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