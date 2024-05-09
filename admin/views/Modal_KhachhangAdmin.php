<div>
    <div id="QLKH">
    </div>
    <div id="doctor-list-container">
        <?php include '../app/Model/orderAdmin.php'; ?>
    </div>
    <div class="content_addbtn">
        <a href="#" class="add_btn_order"><i class="fa-solid fa-user-plus"></i> Thêm Khách Hàng</a>
        <div class="add_order">
            <div class="modal-content">
                <span class="close" id="closeOrder">&times;</span>
                <div class="doctor-form-container">
                    <h2 class="modal-content_title">Thêm khách hàng</h2>
                    <form class="form_add-doctor" action="index.php?page=addKH" method="POST"
                        enctype="multipart/form-data">
                        <label for="name_khach">Tên khách hàng</label>
                        <input type="text" id="name_khach" name="name_khach" required>

                        <div style="display:flex; justify-content: space-between; align-items:center;  ">
                            <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column;margin-bottom: 2rem; ;">
                                <label for="sex" style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Giới tính</label>
                                <select  name="sex" id="sex" style=" padding: 6px 12px;  outline:none; border: 1px solid #8dcafd; background-color: #e4f3fb;border-radius: 6px;">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column; margin-bottom: 2rem;">
                                <label for="ngay_sinh"style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Ngày sinh</label>
                                <input   type="date" style=" padding: 6px 12px; outline:none;  border: 1px solid #8dcafd; background-color: #e4f3fb;border-radius: 6px;" id="ngay_sinh" name="ngay_sinh" required>
                            </div>

                            <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column; margin-bottom: 2rem;">
                                <label for="number"style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Số điện thoại</label>
                                <input    type="tel" style=" padding: 6px 12px; outline:none; border: 1px solid #8dcafd; background-color: #e4f3fb;border-radius: 6px;" id="number" name="number" required>    
                            </div>
                        </div>

                        <label for="diachi">Địa chỉ </label>
                        <input type="text" id="diachi" name="diachi" required>

                        <label for="date_order">Giờ hẹn</label>
                        <input type="datetime-local" id="date_order" name="date_order" required>

                        <label for="ghi_chu">Ghi chú </label>
                        <input type="text" id="ghi_chu" name="ghi_chu" required>

                        <input type="submit" class="btnAddoctor" name="sbm_order" value="Thêm Thông Tin">
                        <span class="Form_Success">Success</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>