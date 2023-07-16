<?php

    require('../db.php');
    if(isset($_GET['fldsFOFNelfeFDLN'])) {
        $idUser = $_GET['fldsFOFNelfeFDLN'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$idUser'"));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="alupa.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Lupa Password</title>
</head>
<body>
    <div class="container">
        <div class="box-lupa">
            <?php if(isset($_GET['fldsFOFNelfeFDLN'])) {?>
                <div></div>
                <h2>Silakan masukan password baru</h2>
                <form action="" method="post">
                    <?php  ?>
                    <input type="text" name="id" value="<?= $_GET['fldsFOFNelfeFDLN'] ?>" hidden>
                    <input type="text" name="password">
                    <input type="submit" name="submitLupa" value="Ubah">
                </form>
            <?php } else {?>
                <div></div>
                <div></div>
                <h2>Konfirmasi lupa password sudah kami kirimkan ke email. Silakan masuk lewat link yang telah dikirimkan</h2>
            <?php } ?>
        </div>
    </div>
    <?php
        if(isset($_POST['submitLupa'])) {
            $pass = $_POST['password'];
            if($pass == ""){
            } else {
                mysqli_query($conn, "UPDATE user SET password = '$pass' WHERE id_user='$idUser'");
                header("Location: sign.php");
            } 
        }
    ?>
</body>
</html>