- Cơ sở dữ liệu ở folder data: (Lệnh được bằng MySql)
  - Chạy tệp CreateTable.sql để tạo các bảng
  - Sau đó lần lượt các tệp insert trong folder InsertData theo thứ tự sau:
    insertBannersAndSlideshow.sql -> insertCategories.sql -> insertProducts.sql -> inserPhu.sql
    \*Lưu ý: tệp insertCategories.sql phải insert tuần tự các bậc (các cụm insert)

#Lưu ý:
  + Để sử dụng chức năng đăng nhập đăng ký bằng fb xampp phải chạy https -> vì vấn đề bảo mật
  + Tài khoản admin: admin -> Mật khẩu: 123