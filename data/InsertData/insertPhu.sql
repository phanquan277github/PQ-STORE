-- insert 

-- insert các bộ lọc
insert into filters(filter_type, category_id) values 
	('Thương hiệu', 2),
    ('Nhu cầu', 2),
    ('Kích thước màn hình', 2),
    ('Dung lượng Ram', 2)
    ;
	insert into filter_content(filter_id, content) values 
		(1, 'Acer'), (1, 'Asus'), (1, 'Dell'), (1, 'Hp'), (1, 'Lenovo'), (1, 'Gigabyte'),
		(2, 'Gaming'), (2, 'Doanh nghiệp'), (2, 'Doanh nhân'), (2, 'Gia đình'), (2, 'Đồ họa - kỹ thuật'),
        (3, '13"'), (3, '14"'), (3, '15.6"'), (3, '16"'), (3, '17"'), (3, '18+"'),
		(4, '4GB'), (4, '8GB'), (4, '16GB'), (4, '24GB'), (4, '32GB'), (4, '48GB'), (4, '64GB')
        ;
        
-- sản phẩm thuộc danh mục laptop gaming
insert into Product_categories(category_id, product_id) values
   (8, 1), (8, 2), (8, 3), (8, 4), (8, 5), (8, 6), (8, 7), (8, 8), (8, 9), (8, 10), (8, 11), (8, 12), (8, 13), (8, 14), (8, 15), (8, 16), (8, 17), (8, 18), (8, 19), (8, 20), (8, 21), (8, 22), (8, 23), (8, 24), (8, 25), (8, 26), (8, 27), (8, 28), (8, 29), (8, 30), (8, 31), (8, 32), (8, 33), (8, 34), (8, 35), (8, 36), (8, 37), (8, 38), (8, 39), (8, 40), (8, 40)
   ;
--  sản phẩm thuộc danh mục laptop văn phòng
insert into Product_categories(category_id, product_id) values
	(9, 41), (9, 42), (9, 43), (9, 44), (9, 45), (9, 46), (9, 47), (9, 48), (9, 49), (9, 50), (9, 51), (9, 52), (9, 53), (9, 54), (9, 55), (9, 56), (9, 57), (9, 58), (9, 59), (9, 60), (9, 61), (9, 62), (9, 63), (9, 64), (9, 65), (9, 66), (9, 67), (9, 68), (9, 69), (9, 70), (9, 71), (9, 72), (9, 73), (9, 74), (9, 75), (9, 76), (9, 77), (9, 78), (9, 79), (9, 80)
   ;

-- insert ảnh của sản phẩm id=1
insert into Pictures (product_id, image_path) values 
	(1, 'https://lh3.googleusercontent.com/YSGzzyiivz6GBZi825qGOEyePXHoz4hDb_Vj3PnVe9qiSGxQZViXQPSiFs8JkL5VKogBs0z9bX-49tgqR1Tj2jaSZOpxEL8=rw'),
    (1, 'https://lh3.googleusercontent.com/qJPXGdBoG3GcUyRZ3gOLFfRg6dQVgpFNpWfiFU8PkZ4PyIUAsUroZnSfmaf9UWIEGfIPMApERy4A_3l24xiJuucFYAB4MtH7xg=rw'),
    (1, 'https://lh3.googleusercontent.com/sXRIyR2SC7BqxCIvuKKQB6OjCY8Mbo7fRRQdg7xDRpj5W1XftRZLcjaeeSW1jxSGA6Mm-bqBCvHfPVxFrZN88lszeXDW9b9b=rw'),
    (1, 'https://lh3.googleusercontent.com/5W6GftdD1kI5hDClc4wvFuCOeWIQI-oaxbjQ3rEjfPgstf1CkkkAIcjLWyeLSYeXyYbdJFTEbsCpdoAb2HCJTkV1mASJESlr=rw')
    ;

-- insert các mô tả của sản phẩm id=1
insert into Describes (product_id, title, content, image_path) values
	(1, '', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với giá cả hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', ''),
	(1, 'Laptop Gaming Quốc Dân - Cấu Hình Mạnh Mẽ và Thiết Kế Đẹp Mắt', 'Laptop Gaming Quốc Dân là một thuật ngữ được sử dụng để chỉ những chiếc laptop chơi game có cấu hình mạnh mẽ và thiết kế đẹp mắt, phù hợp với nhu cầu của người chơi game. Acer Nitro 16 Phoenix là một chiếc laptop chơi game ấn tượng với thiết kế cấu trúc gaming từ bên ngoài cho đến vỏ hộp. Thiết kế này tạo nên một phong cách mạnh mẽ, độc đáo và tinh tế. Máy tính còn được điểm xuyết bởi các viền neon tinh tế, tạo sự hòa hợp và thu hút mọi ánh nhìn đến từ góc “setup” của game thủ.', 'https://storage.googleapis.com/teko-gae.appspot.com/media/image/2023/5/17/efa30c64-147a-4cbb-8cbd-4f706a7cb2e5/ACER%20Nitro%2016%20Phoenix%20%281%29.jpg'),
    (1, 'CARD ĐỒ HỌA RỜI CỰC KHỦNG MỚI NHẤT TỪ NVIDIA - Trang bị GPU RTX™ 4050', 'Với GPU GeForce RTX™ Series 40 mới nhất, Gaming Nitro 16 Phoenix đem đến sức mạnh đồ họa vô cùng ấn tượng cho cả game thủ và những người sáng tạo. Card đồ họa thế hệ mới này được phát triển dựa trên kiến trúc NVIDIA Ada Lovelace, tối ưu hiệu suất và tiết kiệm năng lượng, mang đến sức mạnh đồ họa vượt trội so với thế hệ trước.', 'https://storage.googleapis.com/teko-gae.appspot.com/media/image/2023/5/16/c4b72f2e-461c-43c3-aecb-7c7a5b6d5a90/image.png'),
    (1, 'MÀN HÌNH 165HZ CHUẨN GAMING', 'Màn hình rộng 16 inch với tỉ lệ 16:10 trên Gaming Nitro 16 Phoenix được thiết kế đặc biệt cho gaming, với tấm nền IPS và độ phân giải WUXGA (1920×1200). Tần số quét cao lên đến 165Hz cùng tính năng NVIDIA Advanced Optimus đảm bảo trải nghiệm chơi game mượt mà và không gặp gián đoạn hay hiện tượng bóng mờ. Điều đáng chú ý là màn hình của Nitro 16 Phoenix còn có độ phủ màu 100% sRGB, một chỉ số hiếm thấy trong dòng Laptop Gaming tầm trung từ 20 đến 40 triệu đồng.', 'https://storage.googleapis.com/teko-gae.appspot.com/media/image/2023/5/16/7e1ab251-cd81-4ff1-8457-a22565ce1d15/image.png'),
    (1, 'CHIẾN GAME KHÔNG GIỚI HẠN VỚI CPU AMD RYZEN™ 7000 SERIES', 'Nitro 16 Phoenix 2023 sở hữu cấu hình chiến game cực mạnh, cân mọi tựa game từ AAA đến game Esport. Điều này được thực hiện nhờ sự trang bị của CPU AMD Ryzen™ 7000 Series mới nhất, đặc biệt là Ryzen™ 5 7535HS, là sự lựa chọn hàng đầu cho những game thủ yêu thích "Đội Đỏ". Với kiến trúc Zen 3+ và công nghệ 6nm, CPU này mang lại hiệu suất ấn tượng với 6 nhân xử lý và 12 luồng, cùng với bộ nhớ đệm lên đến 16MB. Điều này đảm bảo khả năng xử lý nhanh chóng và mượt mà trong khi chơi game, đồng thời tối ưu hóa hiệu suất và tiết kiệm năng lượng.', 'https://storage.googleapis.com/teko-gae.appspot.com/media/image/2023/5/16/228b2163-2b75-461c-ac2a-59cda8e988af/image.png'),
    (1, 'GIẢI PHÁP TẢN NHIỆT TIÊN TIẾN VỚI 2 QUẠT SIÊU MÁT TRONG PHÂN KHÚC', 'Chiếc Laptop RTX 4050 của nhà Acer này được thiết kế với khung máy được tối ưu và điều chỉnh đặc biệt để nâng cao khả năng tản nhiệt, đây là một trong những thành tựu mà Acer Predator tự hào mang đến. Được trang bị 2 quạt tản nhiệt, 2 cổng hút gió (trên và dưới) và 4 cổng thoát nhiệt, máy đạt đến một tầm cao mới trong việc tản nhiệt hiệu quả. Đặc biệt, phiên bản 2023 của dòng Laptop Gaming Nitro 5 còn được trang bị tản nhiệt Kim Loại Lỏng cho CPU, giúp tăng cường hiệu suất làm mát và đảm bảo sức mạnh xử lý cùng độ bền bỉ lâu dài. Ngoài ra, để bạn có thể kiểm soát hệ thống của mình một cách tốt hơn, điều chỉnh tốc độ quạt và chế độ đèn theo ý muốn, chỉ cần kích hoạt NitroSense - phần mềm tối ưu hóa độc quyền của Acer dành riêng cho Nitro Gaming.', 'https://storage.googleapis.com/teko-gae.appspot.com/media/image/2023/5/16/d914ef1a-26e1-41fc-996c-154e9fbcdd03/image.png')
    ;
    
-- insert thông số kỹ thuật của sản phẩm id=1
insert into Specifications (product_id, title, content, isTitle) values 
	(1, 'Thương hiệu', 'ACER', false),
	(1, 'Bảo hành', '12 tháng', false),
	(1, 'Thông tin chung', '', true),
	(1, 'Series laptop', 'Nitro 16', false),
	(1, 'Part-number', 'NH.QKBSV.003', false),
	(1, 'Màu sắc', 'Đen', false),
	(1, 'Nhu cầu', 'Gaming, Văn phòng', false),
	(1, 'Cấu hình chi tiết', '', true),
	(1, 'Thế hệ CPU', 'Ryzen 5 , AMD', false),
	(1, 'CPU', 'AMD Ryzen 5 7535HS ( 3.3 GHz - 4.5 GHz / 16MB / 6 nhân, 12 luồng )', false),
	(1, 'Chip đồ họa', 'RTX 4050 6GB GDDR6 / AMD Radeon 660M', false),
	(1, 'RAM', '1 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', false),
	(1, 'Màn hình', '16" ( 1920 x 1200 ) WUXGA IPS 165Hz , không cảm ứng , HD webcam', false),
	(1, 'Lưu trữ', '512GB SSD M.2 NVMe', false),
	(1, 'Số cổng lưu trữ tối đa', '2 x M.2 NVMe', false),
	(1, 'Kiểu khe M.2 hỗ trợ', 'M.2 NVMe', false)
	;
     
-- tạo tk admin
insert into admin(username, password) values ('admin', '123');