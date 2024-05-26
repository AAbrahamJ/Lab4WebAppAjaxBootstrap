<?php

require 'dbcon.php';

// Assuming $con is your database connection

if(isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $image_path = '';

    // Check if all fields are provided
    if($name == '' || $email == '' || $phone == '' || $course == '') {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    // Check if file is uploaded successfully
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $temp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $upload_dir = 'images/';
        $current_datetime = date('YmdHis');
        $image_name_with_datetime = $current_datetime . '_' . $image_name;
        $image_path = $upload_dir . $image_name_with_datetime;

        // Move the uploaded file to the desired location
        if(move_uploaded_file($temp_name, $image_path)) {
            // Insert student details into the database
            $query = "INSERT INTO students (name, email, phone, course, image) VALUES ('$name', '$email', '$phone', '$course', '$image_name_with_datetime')";
            $query_run = mysqli_query($con, $query);

            if($query_run) {
                $res = [
                    'status' => 200,
                    'message' => 'Student Created Successfully'
                ];
                echo json_encode($res);
                return;
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Error inserting student data into database'
                ];
                echo json_encode($res);
                return;
            }
        } else {
            $res = [
                'status' => 500,
                'message' => 'Error moving uploaded file'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 422,
            'message' => 'No file uploaded or error occurred'
        ];
        echo json_encode($res);
        return;
    }
}


// if(isset($_POST['save_student']))
// {
//     $name = mysqli_real_escape_string($con, $_POST['name']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $phone = mysqli_real_escape_string($con, $_POST['phone']);
//     $course = mysqli_real_escape_string($con, $_POST['course']);

//     //CHANGES FOR IMAGE FEATURE//
// //     $image_path = '';
// // if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
// //     $temp_name = $_FILES['image']['tmp_name'];
// //     $image_name = $_FILES['image']['name'];
// //     $upload_dir = 'uploads/';
// //     $image_path = $upload_dir . $image_name;
// //     move_uploaded_file($temp_name, $image_path);
// }
//     //CHANGES FOR IMAGE FEATURE// 
                             


//     if($name == NULL || $email == NULL || $phone == NULL || $course == NULL)
//     {
//         $res = [
//             'status' => 422,
//             'message' => 'All fields are mandatory'
//         ];
//         echo json_encode($res);
//         return;
//     }

//     $query = "INSERT INTO students (name,email,phone,course,image) VALUES ('$name','$email','$phone','$course','$image')";
//     $query_run = mysqli_query($con, $query);

//     if($query_run)
//     {
//         $res = [
//             'status' => 200,
//             'message' => 'Student Created Successfully'
//         ];
//         echo json_encode($res);
//         return;
//     }
//     else
//     {
//         $res = [
//             'status' => 500,
//             'message' => 'Student Not Created'
//         ];
//         echo json_encode($res);
//         return;
//     }
// }


if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    // $image = mysqli_real_escape_string($con, $_POST['image']);
    $image_path = '';


    if($name == NULL || $email == NULL || $phone == NULL || $course == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $temp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $upload_dir = 'images/';
    
        $current_datetime = date('YmdHis');
        $image_name_with_datetime = $current_datetime . '_' . $image_name;
        $image_path = $upload_dir . $image_name_with_datetime;

        if(move_uploaded_file($temp_name, $image_path)) {
            $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' , image= '$image_name_with_datetime'
                WHERE id='$student_id'"; 

            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $res = [
                    'status' => 200,
                    'message' => 'Student Updated Successfully'
                ];
                echo json_encode($res);
                return;
            }
            else
            {
                $res = [
                    'status' => 500,
                    'message' => 'Student Not Updated'
                ];
                echo json_encode($res);
                return;
            }

        }
    


    
   

    }  
}


if(isset($_GET['student_id']))
{
    $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

    $query = "SELECT * FROM students WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Student Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM students WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>