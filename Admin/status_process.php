<?php 
    $conn = mysqli_connect('localhost','root','','project');


if(isset($_POST['orderid']))
{
    $orderid=$_POST['orderid'];
    $query = "UPDATE `orders` SET `order_status`='Cancel_requested' WHERE `order_id`='$orderid'";
    if (mysqli_query($conn, $query)) {
        echo "Order Will Cancel Requested Stage";
    } else {
        echo "Error updating payment: " . mysqli_error($con);
    }
}
?>