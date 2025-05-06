<?php 
    $conn = mysqli_connect('localhost','root','','project');


if(isset($_POST['orderid']))
{
    $orderid=$_POST['orderid'];
    $query = "UPDATE `orders` SET `order_status`='Delevered' WHERE `order_id`='$orderid'";
    if (mysqli_query($conn, $query)) {
        echo "Order Delevered";
    } else {
        echo "Error updating payment: " . mysqli_error($con);
    }
}



if(isset($_POST['refundID']))
{
    $orderid=$_POST['refundID'];
    $query = "UPDATE `orders` SET `order_status`='Cancelled' WHERE `order_id`='$orderid'";
    if (mysqli_query($conn, $query)) 
    {
        $q1="UPDATE `payment` SET `status`='Refunded' WHERE `orderid`='$orderid'";
        if(mysqli_query($conn,$q1))
        {
            echo "Order Cancelled Successfully , Amount Refunded";
        }
    } else {
        echo "Error updating payment: " . mysqli_error($con);
    }
}
?>