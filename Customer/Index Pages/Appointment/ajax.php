<?php
$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
$date = $_GET["date"];
$sql = "select time from appointmentslot WHERE date = '$date' AND status = 0 AND count > 0 ";
if($date!=""){
    $result = mysqli_query($con, $sql);
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
