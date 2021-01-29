<?php include 'connection.php'; ?>
<?php
	if( $_REQUEST['our_team_id']!='' && $_REQUEST['action']=='status'){

        $our_team_id = $_POST["our_team_id"];
        $our_team_status = $_POST["status"];
        $sql = "UPDATE our_team SET status=$our_team_status WHERE id='$our_team_id'";

        if($our_team_status==1){
            echo "<i class='fas fa-times'></i> de-activate";
        }
        else{
            echo "<i class='fas fa-check'></i> activate";
        }

        $conn->query($sql);
            
    }
    
    if( $_REQUEST['our_team_id']!='' && $_REQUEST['action']=='delete'){
        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            $our_team_id = $_POST["our_team_id"];
        }

        $sql = "DELETE FROM our_team WHERE id=$our_team_id";

        $conn->query($sql);
    }



?>