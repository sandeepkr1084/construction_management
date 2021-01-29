<?php include 'connection.php'; ?>
<?php

    if( $_REQUEST['user_id']!='' ){
        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            $user_id = $_POST["user_id"];
        }

        $sql = "DELETE FROM user WHERE id=$user_id";

        $conn->query($sql);
    }

?>