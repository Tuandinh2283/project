<div class="doctor_container">
    <div id="doctor-list-container">
        <?php include '../app/Model/thuocModel.php'; ?>
    </div>
    <div class="content_addbtn">
        <a href="#" id="openModalBtn"><i class="fa-solid fa-prescription-bottle-medical"></i> Thêm Thông Tin Thuốc</a>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModalBtn">&times;</span>
                <div class="doctor-form-container">
                    <h2 class="modal-content_title">Thêm Thông Tin Thuốc</h2>
                    <form class="form_add-doctor" action="index.php?page=addthuoc" method="POST" enctype="multipart/form-data">
                        <div style="display: flex; justify-content: center; flex-direction: column;align-items: center;margin-bottom: 20px;">
                            <div style=" width:100px; height:100px;overflow:hidden;border-radius:100% ; margin-bottom: 6px">
                                <img src="https://cdn-icons-png.flaticon.com/512/194/194915.png" width="100%" id="image__doctor-update" title="image">
                            </div>
                            <label class="custom-file-upload" for="fileInput">Tải ảnh lên</label>
                            <input type="file" id="fileInput" name="image" onchange="handleFileSelection()" accept="image/gif,image/jpeg, image/png,image/webp">
                        </div>
                        <div style="display: flex;justify-content: space-between;align-items: center;font-size: 1.2rem;color: #7366ff;">
                            <div style="margin-right:1rem;">
                                <label for="tenthuoc">Tên Thuốc</label>
                                <input type="text" id="tenthuoc" name="tenThuoc" required>

                                <label for="mavach">Mã Vạch</label>
                                <input type="text" id="mavach" name="mavach" required>

                                <label for="giaban">Giá Bán</label>
                                <input type="text" id="giaban" name="giaban" required>

                                <label for="soluong">Số Lượng</label>
                                <input type="text" id="soluong" name="soluong" required>
                            </div>
                            <div>
                                <label for="congtysx">Công ty Sản Xuất </label>
                                <input type="text" id="congtysx" name="congtysx" required>

                                <label for="ngaySx">Ngày Sản Xuất</label>
                                <input type="date" id="ngaySx" name="ngaySx" required>

                                <label for="hanSd">Hạn Sử Dụng</label>
                                <input type="date" id="hanSd" name="hanSd" required>

                                <label for="moTa">Mô Tả</label>
                                <input type="text" id="moTa" name="moTa" required>
                            </div>
                        </div>
                        <input type="submit" class="btnAddoctor" name="add_thuoc" value="Thêm Vào Danh Sách"><span class="Form_Success">Success</span>
                    </form>
                </div>
            </div>
        </div>



        <a href="#" id="openModalBtndatthuoc"><i class="fa-solid fa-prescription-bottle-medical"></i> Đặt Thuốc</a>
        <div id="myModal_Datthuoc" class="modal_datthuoc">
            <div class="modal-content_datthuoc">
                <span class="close_datthuoc" id="closeModalBtn_datthuoc">&times;</span>
                <?php echo "<h2 >Danh sách Thuốc</h2>
                <div class='left-panel'>
                ";

                $conn = new mysqli("localhost", "root", '', 'qlsuckhoe');
                $resultdes = mysqli_query($conn, 'SELECT * FROM thuoc');
                if ($resultdes->num_rows > 0) {
                    while ($row = $resultdes->fetch_assoc()) {
                        echo "<div class='drug'>";
                        echo "<h3>" . $row["ten_thuoc"] . "</h3>";
                        echo "<img src='../uploads/" . $row["hinh_anh"] . "' alt='" . $row["ten_thuoc"] . "'><br>";
                        echo "<p>Giá: " . $row["gia_ban"] . " VNĐ</p>";
                        echo "<div class='container_button_xemchitiet'><button onclick='addToCart(this)' class='add-to-cart' data-drug-id='" . $row["id"] . "'  data-drug-name='" . $row["ten_thuoc"] . "' data-drug-price='" . $row["gia_ban"] . "' data-drug-image='../uploads/" . $row["hinh_anh"] . "'>Thêm</button><a class='xemchitiet' href='https://tamanhhospital.vn/thuoc/panadol/'>Xem chi tiết</a></div>";
                        echo "</div>";
                    }
                } else {
                    echo "<h2?>Không có thông tin thuốc.</h2>";
                }
                echo "</div>";
                ?>
                <div class="right-panel" id="rightPanel">
                    <h2 style="padding:0;">Thuốc Bạn đã chọn</h2>
                    <hr>
                    <div class="item_wrapper" id="items-wrapper">

                    </div>
                    <hr>
                    <h3 id="total-amount">Tổng tiền: 0 </h3>
                    <form style="display:flex; flex-direction:column ; padding: 20px;" id="checkout-form" action="index.php?page=thanhtoan" method="post">
                        <!-- Các input type hidden để chứa thông tin đơn hàng -->
                        <input type="hidden" name="total_amount" id="total-amount-input">
                        <label style="font-size: 12px;color: #048feb" for="">Tên khách hàng</label>
                        <input style="outline: none; padding:4px 8px;border: 1px solid #ccc; margin-bottom:10px" type="text" name="customer_name">
                        <label style="color: #048feb;font-size: 12px;" for="">Số điện thoại</label>
                        <input style="outline: none; padding:4px 8px;border: 1px solid #ccc; margin-bottom:10px" type="text" name="customer_sdt" >
                        <input style="background-color:green;color: white; border:none;border-radius: 6px; padding:10px" id="checkout-button" type="submit" name="btnthanhtoan" value="Tạo đơn hàng">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>