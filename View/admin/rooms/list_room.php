<section class="main">
      <section class="attendance">
        <div class="attendance-list">
            <h1>Quản lý Room</h1>
            <a href="index.php?controller=admin&action=add_room">Add Room</a>
            <table class="table">
            <thead>
                <tr>
                <th>STT</th>
                <th>NUMBER ROOM</th>
                <th>PRICE</th>
                <th>STATUS</th>
                <th>ACCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    foreach($dataRoom as $values){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $values['room_number']; ?></td>
                    <td><?php echo $values['price']; ?></td>
                    <td><?php echo $values['status']; ?></td>
                    <td>
                        <a href="index.php?controller=admin&action=edit_room&id=<?php echo $values['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="index.php?controller=admin&action=delete_room&id=<?php echo $values['id']; ?>" title="delete"><i class="fas fa-eraser"></i></a> 
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