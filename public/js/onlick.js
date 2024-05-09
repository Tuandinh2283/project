let body = document.querySelector('.order');
let btnThem = document.querySelector('.btnThem');
let close = document.querySelector('.close');

btnThem.addEventListener('click' , ()=>{
    body.style.display="block";
})
close.addEventListener('click' , () =>{
    body.style.display="none";
})