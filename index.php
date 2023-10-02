<?php
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample System</title>
    <link rel="stylesheet" href="sys.css">
</head>
<body>
    <?php
        if(isset($_POST{'btn_insert'})){
            $student_name = $_POST['txt_name'];
            $student_course = $_POST['txt_course'];

            $sql = $conn ->query("INSERT INTO tbl_student values ('NULL','$student_name','$student_course')");
            if($sql){
                echo
                "<script>
                window.alert('Successfully added to DataBase');
                </script>
                ";
            }
        }
    ?>
      <h1> INSERT DATA TO DATABASE</h1>
        <form method = "POST">

        <input type = "text" name ='txt_name' placeholder = "Name" required>
        <br><br>
        <input type = "text" name ='txt_course' placeholder = "Course" required>
        <br><br>
        <input type = "Submit" name = "btn_insert" value = "ok">
        </form>


        <?php
            if (isset($_POST['btn_retrieve'])){
                $id = $_POST ['txt_retrieve'];

                $ret = $conn -> query("SELECT * FROM tbl_student WHERE student_id = '$id'");
                $row = $ret -> fetch_array();
            }
        ?>

        <h1>RETRIEVE DATA FROM DATABASE </h1>
        <form method = "POST">
        <input type = "text" name = "txt_retrieve" placeholder = "Enter Student ID" required>
        <br><br>
        <input type = "Submit" name = "btn_retrieve">

        <h3> Display Data Here </h>
        <h4> ID: <?php echo @$row['student_id']?></h4>
        <h4> Name: <?php echo @$row['student_name']?></h4>
        <h4> Course: <?php echo @$row['student_course']?></h4>

        </form>

        <!-- SEARCH DATA FROM DATABASE -->
        <hr>
            <h1> SEARCH DATA FROM DATABASE</h1>
            <form  method = "POST">
                <input type = "text" name="txt_search" placeholder = "Enter the ID, Name, Course of the Student" >
            <br>
            <br> <input type = "Submit" Value="Search" name = "btn_search">

           

        </form>

        <style>
            thead,tbody,th,td{
                border: 1px solid WHITE;
            }
        </style>
        <table>
        <thead>
            <tr>
                <th> ID </th>
                <th> Course </th>
                <th> Name </th>
                <th> Edit </th>
                <th> Delete </th>
            <tr>
        </thead>
        <tbody> 
        <?php
                if(isset($_POST['btn_search'])){
                    $search_txt=$_POST['txt_search'];
                        $ret2 = $conn -> query("SELECT * FROM tbl_student WHERE CONCAT(student_id, student_name, student_course) LIKE '%$search_txt%' ");
          
                while($fetch_d = $ret2 ->fetch_array()){
        ?>
        <tr>
            <td> <?php echo$fetch_d['student_id'];?></td>
            <td> <?php echo$fetch_d['student_name'];?></td>
            <td> <?php echo$fetch_d['student_course'];?></td>
            <td><a href = "edit_page.php?id=<?php echo$fetch_d['student_id']; ?>">
            <button type = "button"> Edit</button></a></td>
            <!--DELETE FORM-->
            <form method = "POST" encytype="multipart/form-data" action="delete_function.php?cd=<?php echo $fetch_d['student_id'];?>"> 
              <td> <button type="submit" name="delete">Delete</button> </td>
                </form>
        </tr>

         <?php
            }
        }


    ?>
    </tbody>
    </table>


</body>
</html>