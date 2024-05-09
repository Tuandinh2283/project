<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./public/Css/doctor.css">
</head>
<body>
        <div class="doctor">
            <div class="doctor-container">
                <div class="doctor-container-body">
                    <h1>ĐỘI NGŨ BÁC SĨ NHA KHOA</h1>
                    <p style="background-color: #005f9d; color: rgb(240, 240, 240); padding: 15px;text-align: justify; line-height: 1.4;font-weight: bold;letter-spacing: 0.1px;">Nha Khoa quy tụ hơn 150 bác sĩ có 
                        chứng chỉ hành nghề, nhiều năm kinh nghiệm, tốt nghiệp Răng Hàm Mặt trong và ngoài nước, đã từng học tập cũng như tu nghiệp nhiều năm tại các nước có nền nha khoa phát triển bậc trên thế giới.</p>
                    <p>Đội ngũ bác sĩ của Nha Khoa thường xuyên được cập nhật kiến thức chuyên môn, đào tạo liên tục thông qua các khóa tập huấn, hội nghị khoa học, chuyển giao công nghệ… để áp dụng các thành tựu y học mới, kỹ thuật thẩm mỹ răng tiên tiến vào thực 
                        tiễn điều trị phục vụ nhu cầu chăm sóc, điều trị ngày càng cao của người dân.</p>
                    <p>Với kiến thức chuyên môn vững vàng cùng đôi bàn tay khéo léo, tận tâm với nghề, luôn áp dụng theo quy trình chuẩn quốc tế, các bác sĩ luôn mang đến kết quả tốt cho khách hàng.</p>
                    <div class="doctor-container-body-img">
                        <img src="https://nhakhoakim.com/wp-content/uploads/2021/10/BannerBS-6x-update-04.10.21-scaled.jpg">
                        <div>Hơn 150 Bác sĩ Nha Khoa uy tín hàng đầu, điều trị nhẹ nhàng, chính xác, tận tâm, luôn cập nhập nhập kiến thức từ nền y tế tiến bộ thế giới</div>
                    </div>
                    <div class="doctor-container-body-person">
                        <div  class="doctor-container-body-person-first">
                            <h2>Bác sĩ Trịnh Đình Hải</h2>
                            <ul>
                                <li>Công tác tại Khoa Phẫu thuật Hàm mặt thuộc Bệnh viện Răng Hàm Mặt TW Tp.HCM 2000-2010</li>
                                <li>Giảng viên Răng-Hàm-Mặt Đại Học Quốc Tế Hồng Bàng</li>
                                <li>Thạc sĩ chuyên ngành Răng-Hàm-Mặt tại trường Đại học Răng Hàm Mặt Hà Nội</li>
                                <li>Nghiên cứu sinh Viện Nghiên Cứu Lâm Sàng 108</li>
                                <li>Hoàn thành chương trình đào tạo Nha Khoa tại Monash Medical Center (Úc) 2014 theo quyết định của Bộ Y Tế</li>
                                <li>Thành viên danh dự nha sĩ quốc tế ICD</li>
                                <li>Giám đốc Bệnh viện KimHospital</li>
                                <li>Chủ tịch hệ thống Nha Khoa</li>
                            </ul>
                        </div>
                        <div class="doctor-container-body-person_second"><img src="https://nhakhoakim.com/wp-content/themes/kimdental-child/assets/images/doi-ngu-bac-sy/bs-nguyenhuunam.png" alt=""></div>
                    </div>
                </div>
            </div>
            <div style="background-color:rgb(250, 164, 6); color: rgb(250, 164, 6); height: 7px;">.</div>
            
            <div class="doctor-bottom">
                <div class="doctor-bottom-container">
                    <?php
                        include ('./app/Model/hienthiDoctor.php');  
                    ?>
                </div>
            </div>   
        </div>
</body>
</html>