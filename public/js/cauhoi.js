document.addEventListener('DOMContentLoaded', function () {
    const faqItems = document.querySelectorAll('.faq-list li');
  
    // Thêm sự kiện click cho mỗi mục câu hỏi
    faqItems.forEach(item => {
      const question = item.querySelector('h3');
      const answer = item.querySelector('p');
  
      question.addEventListener('click', () => toggleFaq(item, answer));
    });
  
    // Hàm xử lý sự kiện mở rộng/collapse câu hỏi
    function toggleFaq(item, answer) {
      // Đóng tất cả các câu hỏi trước khi mở câu hỏi mới
      faqItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('open');
          otherItem.querySelector('p').style.display = 'none';
        }
      });
  
      // Mở rộng/collapse câu hỏi được nhấp
      item.classList.toggle('open');
  
      // Hiển thị/ẩn nội dung chi tiết của câu hỏi
      const isOpen = item.classList.contains('open');
      answer.style.display = isOpen ? 'block' : 'none';
    }
  });