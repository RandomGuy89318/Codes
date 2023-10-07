<?php 
session_start();
include("conn.php");

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['btn_edit'])){
        $new_name = $_POST['new_name'];
        $new_pass = $_POST['new_pass'];

        $update_profile = $conn->qury("UPDATE markups_user SET user_name = `$new_name`, user_pass = `$user_pass` WHERE user_id = `$user_id`");

        if($update_profile){
            echo 
            "
            <script>
               window.alert('Profile updated successfully..')
            </script> 
            ";
        }else{
            echo 
            "
            <script>
               window.alert('Failed to update profile')
            </script> 
            ";
        }
        header("Location: index.php");
        exit();
        
    }else{
        echo
        "
            <script>
               window.alert('Form not submited or btn_edit_profile not set.')
            </script> 
            ";
            var_dump($_POs);

    }
}else{
    echo " <scriot> window.alert('Invalid request.');</script>";
}
?>