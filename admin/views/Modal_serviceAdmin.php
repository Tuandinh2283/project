<div>
    <div id="QLKH">
    </div>
    <div id="doctor-list-container">
        <?php include '../app/Model/serviceModel.php'; ?>
    </div>
    <div class="content_addbtn">
        <a href="#" class="add_btn_order"><i class="fa-solid fa-user-plus"></i> Thêm Dịch Vụ</a>
        <div class="add_order">
            <div class="modal-content">
                <span class="close" id="closeOrder">&times;</span>
                <div class="doctor-form-container">
                    <h2 class="modal-content_title">Thêm Dịch Vụ</h2>
                    <form class="form_add-doctor" action="index.php?page=addService" method="POST"
                        enctype="multipart/form-data">
                        <label for="name_khach">Tên Dịch Vụ</label>
                        <input type="text" id="name_khach" name="name_service" required>

                        <label for="diachi">Giá </label>
                        <input type="text" id="diachi" name="Gia" required>

                        <label for="date_order">Đơn Vị</label>
                        <input type="text" id="date_order" name="don_vi" required>

                        <label for="ghi_chu">Bảo Hành </label>
                        <input type="text" id="ghi_chu" name="bao_hanh" required>

                        <input type="submit" class="btnAddoctor" name="sbm_service" value="Thêm Thông Tin">
                        <span class="Form_Success">Success</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>