
<?php 
include('../../../../config/config.php');
$quatrinh = $_POST['quatrinh'];
$giuaky = $_POST['giuaky'];
$cuoiky = $_POST['cuoiky'];


if(isset($_POST['themdiem'])){
    $sql_themdiem = "UPDATE bangdiem SET quatrinh='".$quatrinh."',giuaky='".$giuaky."',cuoiky='".$cuoiky."' 
    WHERE madiem = '$_GET[madiem]'";
    mysqli_query($mysqli,$sql_themdiem);
    header('location:../../../../index.php?action=diem');
}else{
    $id=$_GET['madiem'];
    $sql_xoa="DELETE FROM bangdiem WHERE madiem='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=diem');
}
?>