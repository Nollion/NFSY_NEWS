<?php
require 'mysqli_connect.php';

$sql = "DELETE FROM user WHERE user_id=".$_GET["uid"];
if($mysqli->query($sql)) {
    echo '成功删除了'.$mysqli->affected_rows.'条记录';
}
else {
    echo '删除失败'.$mysqli->errno.': '.$mysqli->error;
}

$mysqli->close();