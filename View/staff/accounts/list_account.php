


<section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Quản lý Account</h1>
            <a href="index.php?controller=staff&action=add_account">Add Account</a>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th style="width: 1%;">ACCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    $id = $_SESSION['staff']['id'];
                    foreach($dataAccount as $values){
                      if (($values['role'] == 0)&&($values['id_staff_add']==$id)){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $values['username']; ?></td>
                    <td><?php echo $values['email']; ?></td>
                    <td><?php echo $values['phone']; ?></td>
                    <td><?php echo $values['address']; ?></td>      
                    <td>
                        <a href="index.php?controller=staff&action=edit_account&id=<?php echo $values['id']; ?>"><i class="fas fa-edit"></i></a> 
                        <a href="index.php?controller=staff&action=delete_account&id=<?php echo $values['id']; ?>" title="delete"><i class="fas fa-eraser"></i></a> 
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