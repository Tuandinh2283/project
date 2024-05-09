document.getElementById("bac-si-link").addEventListener("click", function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("doctor-list-container").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "http://localhost/BTL_PHP/app/Model/doctorModel.php", true);
    xhr.send();
});

document.getElementById("khach-hang-link").addEventListener("click", function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("QLKH").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "http://localhost/BTL_PHP/app/Model/orderAdmin.php", true);
    xhr.send();
});



// Thêm vào phần JavaScript của bạn
var openModalBtn = document.getElementById('openModalBtn');
var closeModalBtn = document.getElementById('closeModalBtn');
var modal = document.getElementById('myModal');
openModalBtn.onclick = function () {
    modal.style.display = 'block';
};

closeModalBtn.onclick = function () {
    modal.style.display = 'none';
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
};

// // Thêm vào phần bác sĩ của bạn
// var openModalBtn = document.getElementById('openModalBtn_bs');
// var closeModalBtn = document.getElementById('closeModalBtn_bs');
// var modal = document.getElementById('myModal_bs');
// openModalBtn.onclick = function() {
//     modal.style.display = 'block';
// };

// closeModalBtn.onclick = function() {
//     modal.style.display = 'none';
// };

// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = 'none';
//     }
// };


// Thêm vào phần đặt thuốc của bạn
var openModalBtn_thuoc = document.getElementById('openModalBtndatthuoc');
var closeModalBtn_thuoc = document.getElementById('closeModalBtn_datthuoc');
var modal_datthuoc = document.getElementById('myModal_Datthuoc');
openModalBtn_thuoc.onclick = function () {
    modal_datthuoc.style.display = 'block';
};

closeModalBtn_thuoc.onclick = function () {
    modal_datthuoc.style.display = 'none';
};

window.onclick = function (event) {
    if (event.target == modal_datthuoc) {
        modal_datthuoc.style.display = 'none';
    }
};
function checkCartStatus() {
    var itemsWrapper = document.getElementById('items-wrapper');
    if (itemsWrapper.childElementCount === 0) {
        // Nếu giỏ hàng rỗng, thêm <h2>Thuốc Bạn đã chọn</h2> vào items-wrapper
        var heading = document.createElement('h2');
        heading.textContent = 'Giỏ hàng rỗng';
        itemsWrapper.appendChild(heading);
    } else {
        // Nếu giỏ hàng không rỗng, xoá thẻ <h2>Thuốc Bạn đã chọn</h2> nếu đã tồn tại
        var heading = document.querySelector('#items-wrapper h2');
        if (heading) {
            heading.remove();
        }
    }
}


document.addEventListener('DOMContentLoaded', function () {
    checkCartStatus();
    var totalAmount = 0; // Biến để lưu tổng tiền

    function updateTotalAmount() {
        var items = document.querySelectorAll('.item');
        totalAmount = 0;

        items.forEach(function (item) {
            var priceElement = item.querySelector('.item-price');
            var quantityElement = item.querySelector('.item-quantity');
            var price = parseFloat(priceElement.textContent.replace('Giá: ', '').replace(' VNĐ', ''));
            var quantity = parseInt(quantityElement.textContent);

            totalAmount += price * quantity;
        });

        // Hiển thị tổng tiền ở một vị trí trên trang web
        document.getElementById('total-amount').textContent = 'Tổng tiền: ' + totalAmount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        document.getElementById('total-amount-input').value = totalAmount.toFixed(2);

    }

    var addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var drugId = this.getAttribute('data-drug-id');
            var drugName = this.getAttribute('data-drug-name');
            var drugImage = this.getAttribute('data-drug-image');
            var drugPrice = this.getAttribute('data-drug-price');

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            var existingItem = document.querySelector('.item[data-drug-id="' + drugId + '"]');

            if (existingItem) {
                // Nếu sản phẩm đã tồn tại, tăng số lượng lên 1
                var itemQuantityElement = existingItem.querySelector('.item-quantity');
                var quantity = parseInt(itemQuantityElement.textContent);
                itemQuantityElement.textContent = quantity + 1;
            } else {
                // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng là 1
                var item = document.createElement('div');
                item.classList.add('item');
                item.setAttribute('data-drug-id', drugId);

                var divElementItem = document.createElement('div');
                divElementItem.classList.add('item-image');

                var itemImage = document.createElement('img');
                itemImage.src = drugImage;
                itemImage.alt = drugName;

                divElementItem.appendChild(itemImage);

                item.appendChild(divElementItem);

                var itemName = document.createElement('p');
                itemName.textContent = drugName;
                item.appendChild(itemName);

                var itemPrice = document.createElement('p');
                itemPrice.classList.add('item-price'); // Thêm class cho phần tử giá sản phẩm
                itemPrice.textContent = 'Giá: ' + drugPrice + ' VNĐ';
                item.appendChild(itemPrice);

                var itemQuantity = document.createElement('p');
                itemQuantity.classList.add('item-quantity');
                itemQuantity.textContent = '1';
                item.appendChild(itemQuantity);

                document.getElementById('items-wrapper').appendChild(item);
            }

            // Cập nhật tổng tiền sau khi thêm sản phẩm vào giỏ hàng
            updateTotalAmount();
            checkCartStatus();
        });
    });

    var checkoutButton = document.getElementById('checkout-button');
    checkoutButton.addEventListener('click', function () {
        // Thực hiện thanh toán - ở đây bạn có thể thêm logic xử lý thanh toán theo yêu cầu của mình

        // Hiển thị thông báo thanh toán thành công
        alert('Thanh toán thành công!');

        // Chuyển hướng đến trang PHP sau khi thanh toán thành công
        // window.location.href = 'index.php?page=donhang';
    });
});







