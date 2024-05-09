<div class="doctor_container">
    <div id="doctor-list-container">
    <?php include '../app/Model/DoctorModel.php';?>
    </div>
    <div class="content_addbtn">
        <a href="#" id="openModalBtn"><i class="fa-solid fa-user-plus"></i> Thêm Thông Tin Bác Sĩ</a>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModalBtn">&times;</span>
                <div class="doctor-form-container">
                    <h2 class="modal-content_title">Thêm Thông Tin Bác Sĩ</h2>
                    <form class="form_add-doctor" action="index.php?page=addBS" method="POST" enctype="multipart/form-data">
                        <div style="display: flex; justify-content: center; flex-direction: column;align-items: center;margin-bottom: 20px;">
                                <div style=" width:100px; height:100px;overflow:hidden;border-radius:100% ; margin-bottom: 6px">
                                   <img src="https://cdn-icons-png.flaticon.com/512/194/194915.png" width="100%" id="image__doctor-update" title="image"  >
                                 </div>
                                <label class="custom-file-upload" for="fileInput">Tải ảnh lên</label>
                                <input type="file" id="fileInput" name="image" onchange="handleFileSelection()" accept="image/gif,image/jpeg, image/png,image/webp" > 
                        </div>
                        <label for="tenDoctor">Tên Bác Sĩ</label>
                        <input type="text" id="tenDoctor" name="tenDoctor" required>

                        <label for="congTac">Công Tác</label>
                        <input type="text" id="congTac" name="congTac" required>

                        <label for="totNghiep">Tốt Nghiệp</label>
                        <input type="text" id="totNghiep" name="totNghiep" required>

                        <label for="chuyenNganh">Chuyên Ngành</label>
                        <input type="text" id="chuyenNganh" name="chuyenNganh" required>

                        <label for="chuyenNganh">Thông tin </label>
                        <input type="text" id="TTin1" name="TTin1" required>

                        <input type="submit" class="btnAddoctor" name="add_doctor" value="Thêm Vào Danh Sách"><span class="Form_Success">Success</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
