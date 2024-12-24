<?php
require 'config.php';

if(isset($_POST['upload']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_FILES['image'];
    $image_location=$_FILES['image']['tmp_name'];
    $img_name=$_FILES['image']['name'];
    $image_up="../images/".$img_name;
    $insert="INSERT INTO prod (name, price ,image ) VALUES ('$name','$price','$image_up')";
    mysqli_query($con,$insert);
    if(move_uploaded_file($image_location,'../images/'. $img_name)){
        echo "<script>alert('تم رفع المنتج بنجاح')</script>";
    }
    else{
        echo "<script>alert('لم يتم رفع المنتج بنجاح')</script>";

    }
    header('location: index.php');
}
?>