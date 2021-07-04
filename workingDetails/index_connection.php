<?php
    $server = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "oz";

    $conn = mysqli_connect($server,$user,$pass,$db);
    $linked = mysqli_select_db($conn,$db);

    if (!$linked) {
        echo "Connection Error!!!";
        die();
    } else {
        echo "Successful database connection \n";
        $uname = $_POST['uname'];
        $mail = $_POST['mail'];
        $firm = $_POST['firm'];
        $relation = $_POST['relation'];
        $phone = $_POST['phone'];
        $comment = $_POST['comment'];

        $conn = new mysqli('127.0.0.1', 'root', '', 'oz');
        if ($conn-> connect_error) {
            die("Connection Failed : ".$conn->connect_error);
        } else {
            $statement = $conn->prepare("insert into visitors(uname, mail, firm, relation, phone, comment) values(?, ?, ?, ?, ?, ?)");
            $statement->bind_param("ssssis",$uname, $mail, $firm, $relation, $phone, $comment);
            $statement->execute();
            echo "Successfully Submitted...";
            $statement->close();
            $conn->close();
        }
    }
?>