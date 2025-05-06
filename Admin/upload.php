<?php
session_start();

if (isset($_FILES['design_file']) && isset($_POST['Amount'])) {
    $fileName = time() . '_' . $_FILES['design_file']['name'];
    $targetPath = 'Admin/product/uploads/' . $fileName;
    move_uploaded_file($_FILES['design_file']['tmp_name'], $targetPath);

    // Save uploaded file in session
    $_SESSION['uploaded_image'] = $fileName;
    $_SESSION['amount']=$_POST['Amount'];

    // Return filename to JS
    echo $fileName;
}
// $conn = mysqli_connect('localhost','root','','project');
// if(isset($_POST['add']))
// {
// 	$size = $_POST['size'];
// 	$quantity = $_POST['quantity'];
// 	$productid = 1;
// 	$userid = 1;
// 	$insert  = mysqli_query($conn, "insert into cart (size,quantity,productid,userid,file) values('$size','$quantity')");
// }
?>

