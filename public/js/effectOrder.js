const listImage_6nd = document.querySelector('.slider-6nd')
        const imgs_6nd = document.querySelectorAll('.list-6nd img')
        let indexx = 0;
        let lengthx = imgs_6nd.length
        setInterval(() =>{
            if(indexx == lengthx - 4){
                indexx = 0
                let widthx = imgs_6nd[0].offsetWidth
                listImage_6nd.style.transform = `translateX(0px)`
            }else{
                indexx ++
                let widthx = imgs_6nd[0].offsetWidth
                listImage_6nd.style.transform = `translateX(${widthx * -1 * indexx}px)`
            }
        }, 3000)

        const listImage = document.querySelector('.list')
        const imgs = document.querySelectorAll('.list img')
        const btnRight =document.querySelector('.next')
        const btnLeft =document.querySelector('.prev')
        let index = 0;
        let length = imgs.length
        
        const handleChangeSlide = () => {
            if(index == length -1){
                index = 0
                let width = imgs[0].offsetWidth
                listImage.style.transform = `translateX(0px)`
            }else{
                index ++
                let width = imgs[0].offsetWidth
                listImage.style.transform = `translateX(${width * -1 * index}px)`
            }
        }
       let handleEventChangeSlide = setInterval(handleChangeSlide, 5000)

        btnRight.addEventListener('click',() => {
            clearInterval(handleEventChangeSlide)
            handleChangeSlide()
            handleEventChangeSlide = setInterval(handleChangeSlide, 5000)
        })

        btnLeft.addEventListener('click', () =>{
            if(index == 0){
                index = length -1
                let width = imgs[0].offsetWidth
                listImage.style.transform = `translateX(${width * -1 * index}px)`
            }else{
                index --
                let width = imgs[0].offsetWidth
                listImage.style.transform = `translateX(${width * -1 * index}px)`
            }
            handleEventChangeSlide = setInterval(handleChangeSlide, 5000)
        })

        const btnPhone = document.querySelector('#btn-phone')
        const btnPhoneIcon = document.querySelector('#btn-phone i')
        
        setInterval(() =>{
            btnPhoneIcon.style.transform='rotateX(350deg)'
        }, 4000)