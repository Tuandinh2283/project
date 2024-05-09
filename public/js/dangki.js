document.addEventListener('DOMContentLoaded', function () {
    // Lấy tham chiếu đến ô hiển thị ngày giờ
    const clock = document.getElementById('clock');

    // Cập nhật thời gian mỗi giây
    setInterval(updateClock, 1000);

    // Hàm cập nhật thời gian
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const formattedTime = `${hours}:${minutes}:${seconds}`;
        clock.innerText = formattedTime;
    }

    // Lấy tham chiếu đến form và thêm sự kiện submit
    const registrationForm = document.getElementById('registration-form');
    registrationForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Ngăn chặn form gửi đi (để bạn có thể thêm xử lý của mình ở đây)

        // Thêm xử lý của bạn ở đây, ví dụ: gửi dữ liệu đến máy chủ
    });
});