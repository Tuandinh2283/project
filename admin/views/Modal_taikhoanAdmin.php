<div class="doctor_container">
    <div id="doctor-list-container">
    <?php include '../app/Model/taikhoanModel.php';?>
    </div>
    <div class="content_addbtn">
        <a href="#" id="openModalBtn"><i class="fa-solid fa-user-plus"></i> Thêm tài Khoản quản trị</a>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModalBtn">&times;</span>
                <div class="doctor-form-container">
                    <h2 class="modal-content_title">Thêm Tài Khoản Mới</h2>
                    <form class="form_add-doctor" action="index.php?page=addUser" method="POST" enctype="multipart/form-data">
                        <label for="tenDoctor">Tên Bác Sĩ</label>
                        <input type="text" id="tenDoctor" name="ten_user" required>

                        <label for="phone">Số Điện Thoại</label>
                        <input type="tel" id="phone" name="sdt_user" required>

                        <label for="pass1">Mật Khẩu</label>
                        <input type="password" id="pass1" name="pass" required>

                        <input type="submit" class="btnAddoctor" name="add_user" value="Thêm Người Dùng"><span class="Form_Success">Success</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
