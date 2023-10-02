<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Edit Page</title>
    <link rel="stylesheet" href="sys.css">
</head>

<body>
    <?php
    include 'conn.php';
    $get_data = $_GET['id'];
    $get_info = $conn->query("SELECT * FROM `tbl_student` WHERE `student_id` = '$get_data'");
    $info_row = $get_info->fetch_array();
    $new_id = $info_row['student_id'];
    ?>

    <div class="container">

        <div class="one"></div>

        <div class="two">
            <form method="POST" encytype="multipart/form-data" action="edit_function.php?cd=<?php echo $new_id; ?>">

                <div class="header">
                    <h1>Your Information</h1>
                </div>

                <input type="text" name="student_name" class="enterInfo" value="<?php echo $info_row['student_name'] ?>"><br>
                <input type="text" name="student_course" class="enterInfo" value="<?php echo $info_row['student_course'] ?>"><br>
                <button type="submit" name="update" class="button">Update</button>
            </form>

        </div>

        <div class="three"></div>
    </div>

</body>

</html>