document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện click trên mỗi mục menu
    const menuItems = document.querySelectorAll('.menu');
    menuItems.forEach(item => {
      item.addEventListener('click', scrollToSection);
    });
  
    // Hàm xử lý sự kiện cuộn xuống
    function scrollToSection(event) {
      const targetId = event.currentTarget.getAttribute('data-scroll-target');
      const targetSection = document.getElementById(targetId);
  
      // Cuộn xuống vị trí của phần tử targetSection
      if (targetSection) {
        window.scrollTo({
          top: targetSection.offsetTop,
          behavior: 'smooth' // Hiệu ứng cuộn mượt mà
        });
        if (targetId === 'section4') {
            scrollToTable();
          }
      }
    }
    // Hàm cuộn đến bảng giá
    function scrollToTable() {
    const priceTable = document.querySelector('.price-table');

    if (priceTable) {
      window.scrollTo({
        top: priceTable.offsetTop - 50, // Khoảng cách từ đỉnh trang web đến bảng giá
        behavior: 'smooth' // Hiệu ứng cuộn mượt mà
      });
    }
  }
});