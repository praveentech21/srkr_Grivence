<?php

include 'connect.php';

if(isset($_GET['stugid'])){
    $changestatus = mysqli_query($conn,"UPDATE `studentgrievence` SET `status` = '1' WHERE `gid` = '{$_GET['stugid']}'");
    header("location:grievenceadmin.php");
}
if(isset($_GET['staffgid'])){
    $changestatus = mysqli_query($conn,"UPDATE `staffgrievence` SET `status` = '1' WHERE `gid` = '{$_GET['staffgid']}' ");
    header("location:grievenceadmin.php");
}

?>
<!-- Checked All Good Shiva -->