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