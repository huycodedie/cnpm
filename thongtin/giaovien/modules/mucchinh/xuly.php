
<?php 
include('../../config/config.php');
$quatrinh = $_POST['quatrinh'];

$cuoiky = $_POST['cuoiky'];
$sua = 1;
$malhp = isset($_GET['malhp']) ? $_GET['malhp'] : ''; // Kiểm tra nếu 'malhp' tồn tại
$masv = isset($_GET['masv']) ? $_GET['masv'] : '';   // Kiểm tra nếu 'masv' tồn tại

// Xây dựng URL
if(isset($_POST['gvthemdiem'])){
    $sql_themdiem = "UPDATE bangdiem SET quatrinh='".$quatrinh."',cuoiky='".$cuoiky."',sua='".$sua."' 
    WHERE madiem = '$_GET[madiem]'";
    mysqli_query($mysqli,$sql_themdiem);
    header("Location:../../index.php?action=them-diem-sinh-vien&malhp=$malhp&masv=$masv");


    exit();
}
?>