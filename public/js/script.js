let navbar = document.getElementById('nav');
let data = document.getElementById('data');
let toggle = document.getElementById('toggle');


toggle.addEventListener("click", () => {
    navbar.classList.toggle("close");
    data.classList.toggle("animate__bounceInDown")
})

// modal log-out
let modal_keluar = document.getElementById('modal-keluar');
let modal_content_keluar = document.getElementById('modal-content-keluar');
let btn_log_out = document.getElementById('log-out');
let btn_close_modal_keluar = document.getElementById('btn-close');

btn_close_modal_keluar.addEventListener("click",()=>{
    modal_keluar.style.display = 'none';
    modal_content_keluar.classList.toggle("animate__bounceIn");
})

btn_log_out.addEventListener("click", ()=>{
    modal_keluar.style.display = 'flex';
    modal_content_keluar.classList.toggle("animate__bounceIn");
})

// modal ajukan pinjaman
let btn_info = document.getElementById('btn_info');
let modal_pinjaman = document.getElementById("modal-pinjaman");
let modal_content_pinjaman = document.getElementById('modal-content-pinjaman');
let btn_tutup_pinjaman = document.getElementById('btn-tutup-pinjaman');

btn_info.addEventListener('click', ()=>{
    modal_pinjaman.style.display = 'flex';
    modal_content_pinjaman.classList.toggle("animate__jackInTheBox");
})

btn_tutup_pinjaman.addEventListener("click",()=>{
    modal_pinjaman.style.display = 'none';
    modal_content_pinjaman.classList.toggle("animate__jackInTheBox");
})

window.addEventListener("click",(e)=>{
    if(e.target == modal_keluar){
        modal_keluar.style.display = 'none';
        modal_content_keluar.classList.toggle("animate__bounceIn");
    }else if(e.target == modal_pinjaman){
        modal_pinjaman.style.display = 'none';
        modal_content_pinjaman.classList.toggle("animate__jackInTheBox");
    }
})


