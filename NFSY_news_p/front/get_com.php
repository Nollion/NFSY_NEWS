﻿<?php


header("Content-Type: text/html; charset=utf-8");

$mysqli = new mysqli('localhost','root','','news');


$mysqli->set_charset('utf8');

if($mysqli->connect_errno){
    die('<h2 style="color: red">连接错误</h2>'.$mysqli->connect_error);
}


$sql = "SELECT * FROM comment WHERE nid=".$_GET['new_nid']." ORDER BY ctime DESC";
//执行查询，返回结果集对象
$mysqli_reseult = $mysqli->query($sql);
//如果结果集存在并且有数据
if ($mysqli_reseult && $mysqli_reseult->num_rows) {

    //指针复位
    $mysqli_reseult->data_seek(0);

    echo "<div id=\"postcomments\">
        <ol id=\"comment_list\" class=\"commentlist\">";

    while($row = $mysqli_reseult->fetch_assoc()) {
        echo "<li class=\"comment-content\"><div class=\"comment-main\"><p><b>{$row['cuser']}</b><span class=\"time\">({$row['ctime']})</span><br>{$row['ctext']}</p></div></li>";
    }

    echo "</ol>
    </div>";

} else {
    echo '<h2 align="center" style="padding: 20px">还没有评论哦，快抢沙发吧</h2>';
}
$mysqli->close();



