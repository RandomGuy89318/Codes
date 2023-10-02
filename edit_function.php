<?php
    include  'conn.php';
    $my_data  = $_GET['cd'];
    $get_info = $conn -> query("SELECT * FROM `tbl_student` WHERE `student_id` = '$my_data' ");
    $info_row=$get_info->fetch_array();
    $new_id=$info_row['student_id'];

        if(isset($_POST['update'])){
            $name = $_POST['student_name'];
            $course = $_POST['student_course'];

            $update_query=$conn->query("Update `tbl_student` SET `student_name` = '$name', `student_course` = '$course' Where `student_id` = '$my_data'");
                if($update_query){
                    echo "
                        <script>
                            window.alert('Data Updated!');
                            window.location.href = 'index.php'
                        </script>
                    ";
                }
                else{
                    echo "
                        <script>
                        window.alert('Update Error!');
                        window.location.href = 'edit_page.php?cd=$new_id'
                        </script>
                    ";
                }
        }

?>