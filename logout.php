<?php
    session_start();
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
        echo "<script>window.location.href ='index.php'</script> ";
    } elseif(isset($_SESSION['staff'])) {
        unset($_SESSION['staff']);
        echo "<script>window.location.href ='index.php'</script> ";
    } else{
        unset($_SESSION['user']);
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>