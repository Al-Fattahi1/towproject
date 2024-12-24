<?php
require 'config.php';
$ID = $_GET['id'];
$up = mysqli_query($con, "SELECT * FROM prod WHERE id=$ID"); // يعطينا كل المعلومات حسب id
$data = mysqli_fetch_array($up);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد شراء المنتج</title>
    <style>
        body {
            background-color: gold;
        }
        .main {
            background-color: black;
            color: gold;
            width: 50%;
            padding: 20px;
            box-shadow: 1px 1px 10px gold;
            margin: 50px auto;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-warning {
            width: 100%;
        }
        a {
            color: gold;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main">
        <h2>هل فعلاً تريد شراء المنتج؟</h2>
        <form action="insert_card.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($data['name']); ?>">
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($data['price']); ?>">
            <button name="add" type="submit" class="btn btn-warning">تأكيد إضافة المنتج إلى العربة</button>
        </form>
        <a href="shop.php">الرجوع إلى صفحة المنتجات</a>
    </div>
</body>
</html>