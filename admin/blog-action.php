<?php include 'connection.php'; ?>
<?php
	if( $_REQUEST['blog_id']!='' && $_REQUEST['action']=='status'){

        $blog_id = $_POST["blog_id"];
        $blog_status = $_POST["status"];
        $sql = "UPDATE blogs SET status=$blog_status WHERE id='$blog_id'";

        if($blog_status==1){
            echo "<i class='fas fa-times'></i> deactivate";
        }
        else{
            echo "<i class='fas fa-check'></i> activate";
        }

        $conn->query($sql);
            
    }
    if( $_REQUEST['blog_id']!='' && $_REQUEST['action']=='delete'){
        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            $blog_id = $_POST["blog_id"];
        }

        $sql = "DELETE FROM blogs WHERE id=$blog_id";

        $conn->query($sql);
    }

?>