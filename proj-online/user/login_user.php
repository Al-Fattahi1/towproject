<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, md5($_POST['password']));

    $select = mysqli_query($con, "SELECT * FROM user WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:shop.php');
        exit();
    } else {
        $message[] = 'البريد الإلكتروني أو كلمة المرور غير صحيحة!';
    }
}

// إضافة وظيفة لتسجيل الخروج إذا كان المستخدم مسجلاً دخوله
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:login_user.php');
    exit();
}
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
    <title>تسجيل الدخول</title>
    <style>
        body {
            background-color: gold;
        }
        .form-container {
            background-color: black;
            color: gold;
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            margin-bottom: 15px;
            text-align: center;
        }
        .btn {
            width: 100%;
        }
        .message {
            background-color: red;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 5px;
        }
        a {
            color: gold;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">'.$msg.'</div>';
    }
}
?>
   
<div class="form-container">
   <form action="" method="post">
      <h3>تسجيل الدخول</h3>
      <input type="email" name="email" required placeholder="البريد الإلكتروني" class="box">
      <input type="password" name="password" required placeholder="كلمة المرور" class="box">
      <input type="submit" name="submit" class="btn btn-warning" value="تسجيل الدخول">
      <p>هل لديك حساب بالفعل؟ <a href="register.php">إنشاء حساب جديد</a></p>
   </form>
</div>



</body>
</html>