
document.addEventListener('DOMContentLoaded', function () {
  // Lấy tham chiếu đến button bằng id
  const myButton = document.getElementById('btn-click');
  
  // Lấy tham chiếu đến form bằng id
  const form = document.getElementById('appointment-form');

  // Thêm sự kiện click cho button
  myButton.addEventListener('click', function () {
      // Xử lý hành động khi click vào button
      alert('Chúng tôi đang chuyển hướng bạn đến đặt lịch!');
      window.location.href = 'index.php?page=order';
      // Hiển thị form
      form.classList.remove('hidden');
  });

  // // Lấy tham chiếu đến nút gửi trong form
  // const submitButton = form.querySelector('button[type="submit"]');

  // // Thêm sự kiện click cho nút gửi
  // submitButton.addEventListener('click', function () {
  //     // Xử lý hành động khi click vào nút gửi
  //     alert('Lịch hẹn của bạn đã được đặt thành công!');

  //     // Chuyển hướng trang web về trang chính hoặc trang khác (thay đổi URL tùy ý)
  //     window.location.href = 'http://127.0.0.1:5500/view/test.html';
  // });
});