<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));

    // التحقق من تطابق كلمات المرور
    if ($pass !== $cpass) {
        $message[] = 'كلمة المرور وتأكيد كلمة المرور غير متطابقتين!';
    } else {
        // التحقق مما إذا كان المستخدم موجودًا بالفعل
        $select = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $message[] = 'المستخدم موجود بالفعل!';
        } else {
            // إدخال المستخدم الجديد في قاعدة البيانات
            mysqli_query($con, "INSERT INTO user(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
            $message[] = 'تم التسجيل بنجاح!';
            header('location:login_user.php');
            exit();
        }
    }
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
    <title>إنشاء حساب</title>
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
      <h3>إنشاء حساب جديد</h3>
      <input type="text" name="name" required placeholder="اسم المستخدم" class="box">
      <input type="email" name="email" required placeholder="البريد الإلكتروني" class="box">
      <input type="password" name="password" required placeholder="كلمة المرور" class="box">
      <input type="password" name="cpassword" required placeholder="تأكيد كلمة المرور" class="box">
      <input type="submit" name="submit" class="btn btn-warning" value="تسجيل حساب">
      <p>هل لديك حساب؟ <a href="login_user.php">تسجيل دخول</a></p>
   </form>
</div>

</body>
</html>