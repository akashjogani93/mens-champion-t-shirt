<?php
session_start();
$conn = mysqli_connect('localhost','root','','project');
if(isset($_POST['amt']))
{
    $amt = $_POST['amt'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $imagepath = $_POST['imagepath'];
    $productid = $_POST['productid'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $userid = $_POST['userid'];

    // 1. Update user table
    $sql = "UPDATE `user` 
            SET 
                `pincode` = '$pincode',
                `street` = '$street',
                `city` = '$city',
                `state` = '$state',
                `address` = '$address' 
            WHERE `user_id` = '$userid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // 2. Insert into orders table
        $order_date = date('Y-m-d');
        $order_status = 'Placed';

        $insertOrder = "INSERT INTO `orders` (`order_date`, `order_amount`, `order_status`, `file`, `productid`,`userid`,`size`,`qty`) 
                        VALUES ('$order_date', '$amt', '$order_status', '$imagepath', '$productid','$userid','$size','$quantity')";
        mysqli_query($conn, $insertOrder);
        $order_id = mysqli_insert_id($conn); // get last inserted order id

        // 3. Insert into payment table
        $payment_date = date('Y-m-d');
        $payment_status = 'pending';

        $insertPayment = "INSERT INTO `payment` (`amount`, `date`, `orderid`, `productid`, `userid`, `status`) 
                          VALUES ('$amt', '$payment_date', '$order_id', '$productid', '$userid', '$payment_status')";
        mysqli_query($conn, $insertPayment);
        $payment_id = mysqli_insert_id($conn); // get last inserted payment id

        // 4. Store payment_id into session
        $_SESSION['OID'] = $payment_id;

    } 
}


if(isset($_POST['payment_id']))
{
    $payment_id=$_POST['payment_id'];
    $query = "UPDATE `payment` SET `status`='completed', `transaction`='$payment_id' WHERE `payment_id` = '".$_SESSION['OID']."'";

    if (mysqli_query($conn, $query)) {
        echo "Payment updated successfully";
    } else {
        echo "Error updating payment: " . mysqli_error($con);
    }
}
