let body = document.querySelector('.doctorAdmin_print');
let order_update = document.querySelector('.order_update');
let btnThem = document.querySelector('.btnThem');
let close = document.querySelector('.close');
let btnSua= document.querySelector('.btnSua');

btnThem.addEventListener('click' , ()=>{
    body.style.display="block";
})
close.addEventListener('click' , () =>{
    body.style.display="none";
})
btnSua.addEventListener('click', ()=>{
    order_update.style.display="block";
})