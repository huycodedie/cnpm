                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">khoa</label>
                        <div class="col-sm-10">
                        <select name="gv" id="search" asp-for="CreatedBy" type="text" class="form-control" >
                        
                        
                                <option>kinh tế</option >       
                                <option>công nghệ thông tin</option>                       
                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Giáo viên phụ trách</label>
                        <div class="col-sm-10">
                        <select name="gv" id="search" asp-for="CreatedBy" type="text" class="form-control" >
                        
                        
                        <option>mỹ tâm</option >       
                                <option>cao thanh sơn</option>                       
                        </select>
                        </div>
                    </div>
                    <button type="submit" name="themphutrach" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Thêm</button>


<script>
    $(document).ready(function() {
        $('#search').select2();    
    });
</script>

chỉnh để khi chọn khoa chỉ hiện đúng tên giáo viên của khoa đó
"mỹ tâm là khoa kinh tế còn cao thanh sơn là khoa công nghệ thông tin"