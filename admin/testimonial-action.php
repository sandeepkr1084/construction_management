<?php include 'connection.php'; ?>
<?php
	if( $_REQUEST['feedback_id']!='' && $_REQUEST['action']=='status'){

        $feedback_id = $_POST["feedback_id"];
        $feedback_status = $_POST["status"];
        $sql = "UPDATE testimonial SET status=$feedback_status WHERE id='$feedback_id'";

        if($feedback_status==1){
            echo "<i class='fas fa-times'></i> de-activate";
        }
        else{
            echo "<i class='fas fa-check'></i> activate";
        }

        $conn->query($sql);
            
    }
    if( $_REQUEST['feedback_id']!='' && $_REQUEST['action']=='delete'){
        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            $feedback_id = $_POST["feedback_id"];
        }

        $sql = "DELETE FROM testimonial WHERE id=$feedback_id";

        $conn->query($sql);
    }

?>