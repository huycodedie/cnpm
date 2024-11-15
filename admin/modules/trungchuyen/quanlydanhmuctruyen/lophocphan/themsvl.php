<?php 
$sql_sualhp = "SELECT*FROM qllophocphan l
                     JOIN qlhocphan p
                     ON l.mahp = p.mahp
                     JOIN qllophanhchinh c
                     ON p.malhc = c.idlhc
                     JOIN qlkhoa k
                     ON c.makhoa = k.idkhoa
                     JOIN usergv g
                     ON g.idgv = l.magv
                     WHERE malhp='$_GET[malhp]'LIMIT 1 ";
$query_sualhp = mysqli_query($mysqli,$sql_sualhp);
?>
<?php

$malhp = isset($_GET['malhp']) ? $_GET['malhp'] : '';
?>
<?php 
$sql_joine = "SELECT * 
FROM  qllophanhchinh             
ORDER BY idlhc";
$query_joine= mysqli_query($mysqli, $sql_joine); 
$sql_joine2 = "SELECT * 
               FROM  usersv             
               WHERE malhc='$_GET[malhc]'";
$query_joine2= mysqli_query($mysqli, $sql_joine2); 
?>
<main id="main" class="main">
    <form method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/lophocphan/xulylhp.php?malhp=<?php echo $_GET['malhp'] ?>" enctype="multipart/form-data">
    <div class="row pb-2">
        <h2>Thêm sinh viên vào lớp học phần</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form method="post" asp-action="Edit">                    
                        <?php 
                        while($dong = mysqli_fetch_array($query_sualhp)){
                        ?>
                        <div class="row mb-3" >
                            <label class="col-sm-2 col-form-label">Tên lớp học phần</label>
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['tenlhp'] ?>" class="form-control" type="text" placeholder="Nhập" readonly >
                            </div>
                        </div>
                        <div class="row mb-3" style="display: none;">
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['malhp'] ?>" type="text" name="malhp"  placeholder="Nhập"  >
                            </div>
                        </div>
                        <div class="row mb-3" style="display: none;">
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['idkhoa'] ?>" type="text" name="idkhoa"  placeholder="Nhập"  >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">giáo viên</label>
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['username'] ?>" type="text"  class="form-control" placeholder="Nhập" readonly>
                            </div>
                        </div>
                        <div class="row mb-3" style="display: none">
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['magv'] ?>" type="text" name="magv" class="form-control" placeholder="Nhập" >
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                        <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Lớp hành chính</label>
    <div class="col-sm-10">
        <select id="classSelection" class="form-control" placeholder="Nhập" name="idlhc">
            <option>Chọn lớp hành chính</option>
            <?php
            while($row = mysqli_fetch_array($query_joine)){
            ?>
                <option value="<?php echo $row['idlhc'] ?>">
                    <?php echo $row['idlhc'] . ' - ' . $row['tenlop']; ?>
                </option>
            <?php 
            }
            ?>
        </select>
    </div>
</div>



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lớp học phần</label>
                            <div class="col-sm-10">

                            <select asp-for="BookName" id="search" class="form-control" placeholder="Nhập" name="masv">
                                        <option > Chọn sinh viên</option>
                                    <?php
                                    while($row = mysqli_fetch_array($query_joine2)){
                                    ?>
                                        <option ><?php echo $row['idsv'] ?> - <?php echo $row['usernamesv']  ?></option>
                                    <?php 
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                        
                            <div class="col-sm-12">
                                <input  asp-for="CreatedBy" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('Y-m-d H:i:s') ?>"  class="form-control" placeholder="Nhập" name="ngaytao" type="hidden"   readonly >
                            </div>
                        </div>
                            <button type="submit" name="themsvl" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button> <a  href="index.php?action=lhp" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</main>

<script>
    $(document).ready(function() {
    $('#search').select2({    
    });
});

</script>
<script>
    $(document).ready(function() {
        // Khởi tạo select2
        $('#classSelection').select2();

        // Khi chọn một lớp hành chính
        $('#classSelection').change(function() {
            var selectedClassId = $(this).val(); // Lấy id của lớp hành chính được chọn
            var malhp = "<?php echo $malhp; ?>"; // Lấy malhp từ PHP
            if (selectedClassId) {
                // Chuyển hướng với URL mới chứa malhc
                window.location.href = "index.php?action=themsvl&malhp=" + malhp + "&malhc=" + selectedClassId;
            }
        });
    });
</script>