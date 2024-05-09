var add_btn_order = document.querySelector('.add_btn_order');
var closeOrder = document.getElementById('closeOrder');
var add_order = document.querySelector('.add_order');
console.log(openModalBtn);
add_btn_order.onclick = function() {
    add_order.style.display = 'block';
};

closeOrder.onclick = function() {
    add_order.style.display = 'none';
};

window.onclick = function(event) {
    if (event.target == add_order) {
        add_order.style.display = 'none';
    }
};