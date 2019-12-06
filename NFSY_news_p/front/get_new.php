﻿<?php


header("Content-Type: text/html; charset=utf-8");

$mysqli = new mysqli('localhost','root','','news');


$mysqli->set_charset('utf8');

if($mysqli->connect_errno) {
    die('<h2 style="color: red">连接错误</h2>'.$mysqli->connect_error);
}


$sql = "SELECT news_id,title,cre_date FROM news ORDER BY cre_date DESC LIMIT 8";
//执行查询，返回结果集对象
$mysqli_result = $mysqli->query($sql);
//如果结果集存在并且有数据
if ($mysqli_result && $mysqli_result->num_rows) {

    //指针复位
    $mysqli_result->data_seek(0);
//table head
    echo "<table class=\"table text-center table-striped\"> <tr>
      <th width=\"5%\">新闻编号</th>
      <th width=\"15%\">新闻名称</th>
      <th width=\"10%\">发布时间</th>
      <th width=\"10%\">访问</th>
    </tr>";
    while($row = $mysqli_result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row['news_id'].'</td><td>'.$row['title'].'</td><td>'.$row['cre_date'].'</td>';
        echo '<td>
        <div class="button-group">
          <a class="button border-main" href="javascript:void(0)" onclick="';

        echo "turn({$row['news_id']})";

        echo '"><span class="icon-link"></span> 查看</a>
        </div>
      </td>';
        echo '</tr>';
    }
    echo "</table>";

} else {
    echo '么有你想要的东西';
}
$mysqli->close();



