<div class="content-6nd">
    <div>
        <h2>NHA KHOA TIÊU CHUẨN CHẤT LƯỢNG</h2>
    </div>
    <div class="content-6nd-bot">
        <div class="slider-6nd">
            <div class="list-6nd">
                <img src="./img/gia1.png" alt="">
                <img src="https://nhakhoakim.com/wp-content/uploads/2023/03/KIMDENTAL-GLOBAL_size-A3-scaled.jpg" alt="">
                <img src="https://nhakhoakim.com/wp-content/uploads/2023/03/ISO-9001-NKK-2022_size-A3-scaled.jpg" alt="">
                <img src="https://nhakhoakim.com/wp-content/uploads/2021/11/nhakhoakimtop10thuonghieu.jpg" alt="">
                <img src="https://nhakhoakim.com/wp-content/uploads/2023/03/ISO-9001-NKK-2022_size-A3-scaled.jpg" alt="">
                <img src="https://nhakhoakim.com/wp-content/uploads/2023/03/KIMDENTAL-GLOBAL_size-A3-scaled.jpg" alt="">

            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer-contaier">
        <div>
            <div>
                <p>Trả góp 0%-Thanh toán linh hoạt</p>
            </div>
            <div>
                <p>hợp tác chiến lược</p>
            </div>
            <div>
                <p>Bảo hiểm liên kết</p>
            </div>
            <div>
                <p>Hệ thống phòng khám</p>
            </div>
            <div>
                <p>Tuyển dụng</p>
            </div>
        </div>
        <div>
            <div>
                <p>Nhà máy răng sứ</p>
            </div>
            <div>
                <p>Tiêu chuẩn chất lượng</p>
            </div>
            <div>
                <p>Niềng răng thẩm mỹ</p>
            </div>
            <div>
                <p>Trồng răng Implant</p>
            </div>
            <div>
                <p>Răng sứ thẩm mỹ</p>
            </div>
        </div>
        <div>
            <div>
                <p>Kết nối với chúng tôi</p>
            </div>
            <div>
                <div>
                    <img src=" ./img/640px-Facebook-icon-1.png" alt="">
                    <img style="background-color: rgb(245, 245, 245);" src=" ./img/zalo.png" alt="">
                    <img src=" ./img/instagram.png" alt="">
                </div>
            </div>
            <div>
                <p style="font-size: 12px;">Chính sách bảo mật-chính sách bảo hành</p>
            </div>
        </div>
    </div>
</footer>
</div>
<script>
    const listImage_6nd = document.querySelector('.slider-6nd')
    const imgs_6nd = document.querySelectorAll('.list-6nd img')
    let indexx = 0;
    let lengthx = imgs_6nd.length
    setInterval(() => {
        if (indexx == lengthx - 4) {
            indexx = 0
            let widthx = imgs_6nd[0].offsetWidth
            listImage_6nd.style.transform = `translateX(0px)`
        } else {
            indexx++
            let widthx = imgs_6nd[0].offsetWidth
            listImage_6nd.style.transform = `translateX(${widthx * -1 * indexx}px)`
        }
    }, 3000)

    const listImage = document.querySelector('.list')
    const imgs = document.querySelectorAll('.list img')
    const btnRight = document.querySelector('.next')
    const btnLeft = document.querySelector('.prev')
    let index = 0;
    let length = imgs.length

    const handleChangeSlide = () => {
        if (index == length - 1) {
            index = 0
            let width = imgs[0].offsetWidth
            listImage.style.transform = `translateX(0px)`
        } else {
            index++
            let width = imgs[0].offsetWidth
            listImage.style.transform = `translateX(${width * -1 * index}px)`
        }
    }
    let handleEventChangeSlide = setInterval(handleChangeSlide, 5000)

    btnRight.addEventListener('click', () => {
        clearInterval(handleEventChangeSlide)
        handleChangeSlide()
        handleEventChangeSlide = setInterval(handleChangeSlide, 5000)
    })

    btnLeft.addEventListener('click', () => {
        if (index == 0) {
            index = length - 1
            let width = imgs[0].offsetWidth
            listImage.style.transform = `translateX(${width * -1 * index}px)`
        } else {
            index--
            let width = imgs[0].offsetWidth
            listImage.style.transform = `translateX(${width * -1 * index}px)`
        }
        handleEventChangeSlide = setInterval(handleChangeSlide, 5000)
    })

    const btnPhone = document.querySelector('#btn-phone')
    const btnPhoneIcon = document.querySelector('#btn-phone i')

    setInterval(() => {
        btnPhoneIcon.style.transform = 'rotateX(350deg)'
    }, 4000)
</script>
</body>

</html>