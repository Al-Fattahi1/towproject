<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | المنتجات</title>
    
    <style>
        h3{
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;

        }
        body{
            background-color:gold;
            
        }

        .card{
            float:right;
            margin-top:20px;
            margin-left:10px;
            margin-right:10px;
            background-color:black;
            color:gold;
        }
        .card img{
            width: 100%;
            height: 200px;
        }
        main{
            width: 60%;
        }
        .btn{
            background-color:black;
            color:gold;
            border:1px solid gold;
        }
        .btn2:hover{
            background-color:black;
            color:red;
            border:1px solid red;
        }
        .btn1:hover{
            background-color:gold;
            color:black;
        }
      
        </style>
</head>
<body>
    <center>
        <h3>جميع المنتجات المتوفرة</h3>
    </center>
    <?php
require 'config.php';
$result = mysqli_query($con, "SELECT * FROM prod");
while ($row = mysqli_fetch_array($result)) {
    $imagePath = $row['image'];
    echo "<center>
            <main>
                <div class='card' style='width: 14rem;'>
                    <img src='$imagePath' class='card-img-top' onerror=\"this.onerror=null; this.src='default-image.jpg';\" alt='Product Image'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['name']}</h5>
                        <p class='card-text'>{$row['price']}</p>
                        <a href='delete.php? id=$row[id]' class='btn btn-danger btn2'>حذف منتج</a>
                        <a href='update.php? id=$row[id]' class='btn btn-primary btn1'>تعديل منتج</a>
                    </div>
                </div>
            </main>
          </center>";
}
?>

</body>
</html>