﻿<?php

header("Content-Type: text/html; charset=utf-8");

session_start();


// 连接mysql数据库
$mysqli = new mysqli('localhost','root','','news');

if($mysqli->connect_errno) {
    die('<h2 style="color: red">连接错误</h2>'.$mysqli->connect_error);
}

$sql = "SELECT username,password FROM root";
$mysqli_result = $mysqli->query($sql);
if ($mysqli_result && $mysqli_result->num_rows>0) {
    $rows = $mysqli_result->fetch_all(MYSQLI_ASSOC);

//    echo '<pre>';
//    print_r($rows);//二维数组
//    echo '</pre>';

    $flag = 0;
    foreach ($rows as $row) {
        if ($row['username'] == $_POST['username'] && $row['password'] == $_POST['password']) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 1) {
        $_SESSION['uname'] = $_POST['username'];
        $_SESSION['pwd'] = $_POST['password'];
        $_SESSION['pwd2'] = '1123123';
        echo "<script>alert('欢迎您，管理员');
        window.location.href=\"index.php\"</script>";
    } else {
        echo "<script>alert('账户或者密码错误！重新填写');
        window.location.href=\"login.html\";</script>";
    }
    echo session_id();

}