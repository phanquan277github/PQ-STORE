// lấy class
const accountBtn = document.querySelector('.js-account-btn')
const signIUOverlay = document.querySelector('.js-sign-iu-overlay')
const signIUClose = document.querySelector('.js-sign-iu-close') 
const signIUForm = document.querySelector('.js-sign-iu-form')
// hàm thêm xóa class open
function showSignIUForm() {
    signIUOverlay.classList.add('open') //them class open
}
function hideSignIUForm() {
    signIUOverlay.classList.remove('open') //xóa class open
}
//thêm sự kiện click vào các class ở trên và cho nó thực hiện hàm gì
accountBtn.addEventListener('click', showSignIUForm) //hiển thị form
signIUClose.addEventListener('click', hideSignIUForm) //đóng bằng nút close
signIUOverlay.addEventListener('click', hideSignIUForm) //đóng bằng lớp overlay
//ngăn sự kiện nổi bọt (khi click vào form sẽ không bị đóng vì thằng cha nó là overlay
// có găn sự kiên click close nên thằng con cũng bị ảnh hưởng nổi bọt)
signIUForm.addEventListener('click', function(event){
    event.stopPropagation() //hàm ngăn nổi bọt
})
