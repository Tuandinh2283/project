
    <div class="order">
            <div class="order-container">
                <h2>ĐẶT LỊCH HẸN</h2>
                <p>Vui lòng để lại thông tin, nhu cầu của quý khách.</p>
                <p>Nha Khoa sẽ liên hệ đến Quý Khách trong thời gian sớm nhất</p>
                <form name="order" action="index.php?page=dathen" method="POST" enctype="multipart/form-data">
                   <div class="form-container margin_left-rigth">
                        <div class="form-container-raidio">
                            <div class="form-container-raidio_items">
                            <input type="radio" name="sex" value="Nam" id="male" required>
                            <label>Anh</label>
                            </div>
                            <div class="form-container-raidio_items">
                            <input type="radio" name="sex" value="Nữ" id="female" required>
                            <label>Chị</label>
                            </div>
                        </div>
                        <div class="form-container-text">
                            <input type="text" name="name_khach" placeholder="Họ tên..." value="" required>
                            <input type="date" name="ngay_sinh" id="dob" data-placeholder="Ngày Sinh" required aria-required="true" />
                            <p id="error-msg" style="color: red;"></p>
                        </div>
                        <div class="form-container-text">
                            <input type="text" name="number" placeholder="Số điện thoại.." value="" required>
                            <input type="text" name="diachi" placeholder="Địa chỉ.." value="" required>
                        </div>
                        <div class="form-container-text2">
                            <input type="datetime-local" name="date_order" data-placeholder="Lịch Hẹn" required aria-required="true" required>
                        </div>
                        <div>
                            <textarea name="ghi_chu" placeholder="Ghi chú (nếu có)..."></textarea>
                        </div>
                        <div class="btn_order btn_oder_datlich">
                            <input onclick="alert('Đặt Lịch Hẹn Thành Công')" type="submit" name="sbm_order" value=" ĐẶT LỊCH HẸN" >
                        </div>
                   </div>
                </form>
            </div>
    </div>
</body>
</html>