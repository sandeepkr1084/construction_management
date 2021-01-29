<?php include 'connection.php'; ?>
<?php

    if( $_REQUEST['project_id']!='' && $_REQUEST['action']=='status'){

        $project_id = $_POST["project_id"];
        $project_status = $_POST["status"];
        $sql = "UPDATE our_projects SET status=$project_status WHERE id='$project_id'";

        if($project_status==1){
            echo "<i class='fas fa-times'></i> de-activate";
        }
        else{
            echo "<i class='fas fa-check'></i> activate";
        }

        $conn->query($sql);
            
    }
    if( $_REQUEST['project_id']!='' && $_REQUEST['action']=='delete'){
        $project_id = $_POST["project_id"];
        $sql = "DELETE FROM our_projects WHERE id=$project_id";

        $conn->query($sql);

    }


?>