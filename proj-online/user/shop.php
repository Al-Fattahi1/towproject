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
        h3 {
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }

        .card {
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
            background-color: black;
            color: gold;
        }
        .card img {
            width: 100%;
            height: 200px;
        }
        .btn {
            background-color: black;
            color: gold;
            border: 1px solid gold;
        }
        .btn:hover {
            background-color: gold;
        }
        main {
            width: 60%;
        }
        .navbar-brand {
            margin-left: 70px;
            color: gold;
        }
        body {
            background-color: gold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="card.php">Mycard | عربتي</a>
        <a class="navbar-brand" href="logout.php">تسجيل الخروج</a> <!-- إضافة زر تسجيل الخروج -->
    </nav>
    <center>
        <h3>المنتجات المتوفرة</h3>
    </center>
    <?php
    require 'config.php';
    
    // تأكد من أن المستخدم قد سجل دخوله
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول
        exit();
    }

    $result = mysqli_query($con, "SELECT * FROM prod");
    while ($row = mysqli_fetch_array($result)) {
        $imagePath = $row['image'];
        echo "<center>
                <main>
                    <div class='card' style='width: 15rem;'>
                        <img src='$imagePath' class='card-img-top' onerror=\"this.onerror=null; this.src='default-image.jpg';\" alt='Product Image'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['name']}</h5>
                            <p class='card-text'>{$row['price']}</p>
                            <a href='val.php?id={$row['id']}' class='btn'>اضافة المنتج الى العربة</a>
                        </div>
                    </div>
                </main>
              </center>";
    }
    ?>
</body>
</html>