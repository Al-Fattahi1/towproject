<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop online | اضافة منتجات</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>موقع تسويقي اونلاين</h2>
                <img src="../img/log3.jfif" alt="" width="450px">
                <input type="text" name="name" id="">
                <br>
                <input type="text" name="price" id="">
                <br>
                <input type="file" name="image" id="file" style='display:none;'>
                <label for="file">أختيار صورة للمنتج</label>
                <button name="upload">رفع المنتج</button>
                <br><br>
                <a href="products.php">عرض كل المنتجات</a><br>
                <a href="card.php">الدخول  الى المنتجات المحجوزة</a>
            </form>
        </div>
        <p>Developer By Mohaanad</p>
    </center>
</body>
</html>