<?php
require 'config.php';

if(isset($_POST['update']))
{
    $ID=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_FILES['image'];
    $image_location=$_FILES['image']['tmp_name'];
    $img_name=$_FILES['image']['name'];
    $image_up="../images/".$img_name;
    $update="UPDATE prod SET name='$name' , price='$price' , image='$image_up' WHERE id=$ID";
    mysqli_query($con,$update);
    if(move_uploaded_file($image_location,'../images/'. $img_name)){
        echo "<script>alert('تم تحديث المنتج بنجاح')</script>";
    }
    else{
        echo "<script>alert('لم يتم تحديث المنتج بنجاح')</script>";

    }
    header('location: index.php');
}
?>