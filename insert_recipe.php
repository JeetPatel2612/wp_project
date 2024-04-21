<?php
    include('../php/config.php')

    // Create connection
    if(!$con){
        echo "Error";
    }
    if(isset($_POST["submit"])){
        $fname = $_POST["Dish_Name"];
        $lname = $_POST["addIngre"];
        $email = $_POST["addInstr"];
        $phone = $_POST["email"];

        if($_FILES["file"]["error"] == 4){
            echo "<script> alert('Image Does Not Exist'); </script>";
        }else{
        $filename = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $tempname = $_FILES["file"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));

        if ( !in_array($imageExtension, $validImageExtension) ){
            echo "<script> alert('Invalid Image Extension'); </script>";
        } else if($fileSize > 1000000){
            echo "<script> alert('Image Size Is Too Large'); </script>";
        } else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tempname, '../img/' . $newImageName);

        // move_uploaded_file($tempname, "../img/$filename");

        $sql = "INSERT INTO recipes(recipe_id, dishName, ingredients, instructions, email, file1)VALUES('NULL', '$fname', '$lname', '$email', '$phone', '$newImageName')";
        mysqli_query($con, $sql);
        echo "Upload Succcess";
        }
    }
    }
?>