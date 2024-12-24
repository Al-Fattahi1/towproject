<?php
session_start(); // بدء جلسة جديدة
session_destroy(); // إنهاء الجلسة
header('location:login_user.php'); // إعادة التوجيه إلى صفحة تسجيل الدخول
exit();
?>