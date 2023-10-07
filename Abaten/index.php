<?php
session_start();
include("conn.php");

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $query = $conn->query("SELECT * FROM markups_user WHERE user_id = '$user_id'");
    $user_data = $query->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset ="UTF -8">
        <meta name ="viewport" content = "width = device-width, iniatial-scale=1.0">
        <title>Welcome to Your Profile</title>
        <link rel = "stylesheet" href = "sys.css">
        <style>
            body{
                font-family: "Times New Roman", sans-serif;;
                margin:0;
                padding:0;
                text-align:center;
            }
            h1,h2,p{
                color:#333
            }

            form{
                max-width: 300px;
                margin: 20px, auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            input, button{
                display: block;
                width: 100%;
                padding: 10px;
                margin: 0 auto;
                border: 1px solid #ddd;
                border-radius: 3px;
            }
            button {
                background-color: #007bff;
                color: #fff;
                color: #fff;
                cursor: pointer;
            }
            a{
                color: #007bff;
                text-decoration: none;
            }
            a:hover{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <?php if(isset($user_data)): ?>
            <div class="user-info">
                 <h1>Welcome, <?php echo $user_data['user_name'];?>!</h1>
                 <p>Your Account ID: <?php echo $user_data["user_id"]; ?></p>
                 <p>Your UserName: <?php echo $user_data["user_name"]; ?></p>
                 <p>Your Password: <?php echo $user_data["user_pass"]; ?></p>
                 <p>Edit Your Profile:</p>
        </div>
            <form action="edit_profile.php" method = "POST">
                <input type="text" name = "new_name" placeholder="New Name">
                <br><br>
                <input type="password" name = "new_pass" placeholder="New Name">
                <br><br>
                <input type="submit" name = "btn_edit" value="Edit Profile">
            </form>
            <form method="POST" enctype = "multipart//form-data" action= "delete.php?cd = <?php echo $user_data['user_id'] ?>">
             <button type="submit" name= "delete">Delete</button>
            </form>
            <br>
            <a href = "logout.php" class="logout-link">Logout</a>
        <?php else: ?>
            <h1 class="main-title">MarkUps</h1>
            <h2 class="sub-title">Login To Your Profile</h1>
            <form action="login.php" method="POST">
                <input type="text" name="txt_name" placeholder="Username" required>
                <br><br>
                <input type="password" name="password" placeholder="Password" required>
                <br><br>
                <input type="submit" name="btn_login" value="Login">
            </form>
            <br>
            <h2 class="sub-title">Don't have an Account? Register below:</h2>
            <form action="register.php" method="POST">
                <input type="text" name="txt_name" placeholder="Username" required>
                <br><br>
                <input type="password" name="password" placeholder="Password" required>
                <br><br>
                <input type="submit" name="btn_register" value="Register">
            </form>
            <?php endif; ?>
    </body>