<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update |  تعديل منتج</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    require 'config.php';
    $ID=$_GET['id'];
    $update=mysqli_query($con,"SELECT * FROM prod WHERE id=$ID");
    $data=mysqli_fetch_array($update);



    ?>
    <center>
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>تعديل المنتجات</h2>
                <img src="<?php echo $data['image']; ?> "alt="" width="450px">
                <input type="text" name="id" id="" value="<?php echo $data['id'] ; ?>">
                    <br>
                <input type="text" name="name" id="" value="<?php echo $data['name'] ; ?>">
                <br>
                <input type="text" name="price" id="" value="<?php echo $data['price'] ; ?>">
                <br>
                <input type="file" name="image" id="file" style='display:none;'>
                <label for="file"> تحديث صورة المنتج</label>
                <button name="update" type="submit"> تعديل المنتج</button>
                <br><br>
                <a href="products.php">عرض كل المنتجات</a>
            </form>
        </div>
        <p>Developer By Mohaanad</p>
    </center>
</body>
</html>