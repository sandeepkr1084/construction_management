<?php include 'connection.php'; ?>
<?php

    if( $_REQUEST['service_id']!='' && $_REQUEST['action']=='status'){

        $service_id = $_POST["service_id"];
        $service_status = $_POST["status"];
        $sql = "UPDATE our_services SET status=$service_status WHERE id='$service_id'";

        if($service_status==1){
            echo "<i class='fas fa-times'></i> deactivate";
        }
        else{
            echo "<i class='fas fa-check'></i> activate";
        }

        $conn->query($sql);
    
    }
    if( $_REQUEST['service_id']!='' && $_REQUEST['action']=='delete'){

        $service_id = $_POST["service_id"];
        $sql = "DELETE FROM our_services WHERE id=$service_id";

        $conn->query($sql);
    }

?>