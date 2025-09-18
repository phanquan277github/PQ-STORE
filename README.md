🚀 Quy trình triển khai
1.	Clone code từ GitHub
Tạo folder chứa dự án – sau đó clone project về
git clone -b apache2_ubuntu https://github.com/phanquan277github/PQ-STORE.git
2. Cài docker V2
   Cài docker bản phù hợp với OS
   Nguồn tham khảo: https://azdigi.com/blog/linux-server/tools/huonng-dan-cai-dat-docker-tren-ubuntu-22-04/  (chỉ làm bước 1 và 2)

    # Tạo group docker nếu chưa có
    sudo groupadd docker
    # Thêm user hiện tại vào group docker
    sudo usermod -aG docker $USER
    # Sau đó đăng xuất rồi đăng nhập lại (hoặc reboot) để áp dụng.
4.	Build & Run
cd PQ-STORE/docker
docker compose up --build -d
5.	Check container
docker ps -a
6.	Truy cập web
👉 Mở trình duyệt: http://<IP-server>:8080



#Lưu ý:
  + Để sử dụng chức năng đăng nhập đăng ký bằng fb xampp phải chạy https -> vì vấn đề bảo mật
  + Tài khoản admin: admin -> Mật khẩu: 123
