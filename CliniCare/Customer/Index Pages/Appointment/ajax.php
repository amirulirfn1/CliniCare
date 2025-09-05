<?php
include "../../db_conn.php";
$date = $_GET["date"];
if($date!=""){
    $stmt = $con->prepare("SELECT time FROM appointmentslot WHERE date = ? AND status = 0 AND count > 0");
    $stmt->bind_param('s', $date);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<div class='col-md-12' id='time1'>";
    echo "<label class='labels' style = 'font-size: 12px'>Choose Time</label>";
    echo "<select name='time' id='time' class='form-control' required>";
    while($row=mysqli_fetch_array($result)){
        echo "<option value='{$row['time']}'>".$row['time']."</option>";
    }
    echo "</select>";
}else{
    echo "<div class='col-md-12' id='time'>";
    echo "<label class='labels' style = 'font-size: 12px'>Choose Time</label>";
    echo "<select name='time' id='time' class='form-control' required>";
    echo "<option>Time</option>";
    echo "</select>";
}
