<?php

include 'conn.php';
$my_data = $_GET['cd'];
$delete_query = $conn->query("DELETE FROM `tbl_student` WHERE `student_id` = '$my_data'");

    if ($delete_query) {
        echo "
            <script>
                window.alert('Successfully Deleted!');
                window.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                window.alert('Error');
                window.location.href = 'index.php'
            </script>
        ";
    }

?>