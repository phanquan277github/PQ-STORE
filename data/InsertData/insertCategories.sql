-- insert lần các cụm insert sau: 

-- root cate
insert into categories (name, parent_id, image_path, icon_path) values
	('Root Cate', null, '', ''); -- id: 1 mục gốc
    
 -- bac 1
insert into categories (name, parent_id, image_path, icon_path) values
	('Laptop', 1, 'https://lh3.googleusercontent.com/wOhcPJSPsA2l653-KPjmfodiem9y3NS6Mji6SZhkNCKsuyHK9Z3x0X-2l8gikfPI5n1DX0Fg9bBCHsOI0ACZD7n20XHN4e72=rw', 'https://lh3.googleusercontent.com/lFZZtBMUqkbl9qKKUe3DSmHqpb62UjWrOkxqcJ6lN3yM83Wg2Irp-ZlvkUwGO6TMcsscLELMZa_lN9jo8tKteWsCzmUii7po=rw'), -- id: 1
	('Máy tính - PC', 1, 'https://lh3.googleusercontent.com/AsrwiaAHgA9NcpFVm8hBkOkG3Chv2XzObdRlzJStQ5rTTI7YSzlGo2_fl6wwpWLJKkgv_aHOEiN8UXagLUHwq3nDYzEwFBw=rw', 'https://lh3.googleusercontent.com/Y7KEp2iUC1syVaF1SQuQ8ZPCLu8PVhCKqadoVKlI8ON-vKqxyvi0EbgM00Ky8Zb_wIcl9Q8HTLZkQj_MuTzqyJhGuLJz8mFTqw=rw'), -- id:2
	('Màn hình', 1, 'https://lh3.googleusercontent.com/rg0MMQFfyjZzGjsmcJrpqQx7Zp8c7KDPPMX6yUtafXTn9qgSMaA9lavKd8q1vz1nfxYgnjbjfHLmFsw7IxLfkupM83NBzYY=rw', 'https://lh3.googleusercontent.com/1rbqboPNTH2Gyx3dS28kewywgX0ovZAZHBcstS4KjeJO8j6Qc6Kn19xJH0XpaiqCAj4a-xf_EeAZjlARKaI9mQNBhlHDp6o=rw'), -- id:3
	('Linh kiện máy tính', 1, '', 'https://lh3.googleusercontent.com/0V32ezrE3Bn6r_lmv4YIyS7Y4QnfVAcjTQ8XjR-86cP_mAtiIzOPsWeEni-MpEklbR5jIfJvtXgD6K-eWhlO7sLsgbxBwsHduQ=rw'), -- id:4
	('Phụ kiện', 1, '', 'https://lh3.googleusercontent.com/JuVFuLJ2OmqyEO2mtZ0kJTWvACpFkXE_765ihiBIu8WQoHlS-jYXY8zsXDpZUBk26NqRulJ9U_u3DxLcBTxpPGY7n1uzGdKAuA=rw'), -- id:5
	('Thiết bị âm thanh', 1, '', 'https://lh3.googleusercontent.com/5H5fwM3O8jhVpnNCQziLVok28E6e1c8hT3579MXy3UD4YxKBv7ybyGeRzYrFrPoqvXe20fGGD2wndnDx9EwO_B6yy4kErU8KUw=rw'); -- id:6
	
	-- bac 2
		insert into categories (name, parent_id, image_path, icon_path) values
		-- laptop
		('Laptop gaming', 2, '', ''),
		('Laptop văn phòng', 2, '', ''),
		('Laptop đồ họa', 2, '', ''),
		('Laptop mỏng nhẹ', 2, '', ''),
		('Laptop cảm ứng', 2, '', ''),
		('Laptop workstation', 2, '', ''),
		-- pc
		('Desktop gaming', 3, '', ''),
		('Desktop đồ họa', 3, '', ''),
		('Desktop văn phòng', 3, '', ''),
		('Desktop all-in-one', 3, '', ''),
		('Desktop mini', 3, '', ''),
		-- màn hình
		('Màn hình gaming', 4, '', ''),
		('Màn hình thiết kế', 4, '', ''),
		('Màn hình cong', 4, '', ''),
		('Màn hình văn phòng', 4, '', ''),
		-- linh kiện pc
		('Case máy tính', 5, 'https://60a99bedadae98078522-a9b6cded92292ef3bace063619038eb1.ssl.cf2.rackcdn.com/images_CategoryImages_ComputerCases500_062022.jpg', ''),
		('Ổ cứng', 5, 'https://lh3.googleusercontent.com/stw8R9S4NPD2_WXwwxRbfVpm076f53ZQbnJ1gtFucrv6nWkcERiCfg7BJ2_AQv4zY8oIlO-SipQWOK7Uc8UvXw9pnuBN6bs=rw', ''),
		('CPU', 5, 'https://60a99bedadae98078522-a9b6cded92292ef3bace063619038eb1.ssl.cf2.rackcdn.com/images_CategoryImages_IntelAMDProcessors500.jpg', ''),
		('PSU - Nguồn', 5, 'https://60a99bedadae98078522-a9b6cded92292ef3bace063619038eb1.ssl.cf2.rackcdn.com/images_CategoryImages_PowerSupplies500_062022.jpg', ''),
		('Mainboard - Bo mạch', 5, 'https://60a99bedadae98078522-a9b6cded92292ef3bace063619038eb1.ssl.cf2.rackcdn.com/images_CategoryImages_motherboards_062022.jpg', ''),
		('VGA - Card màn hình', 5, 'https://60a99bedadae98078522-a9b6cded92292ef3bace063619038eb1.ssl.cf2.rackcdn.com/images_CategoryImages_videoCards500.jpg', ''),
		('Ram - Bộ nhớ', 5, 'https://lh3.googleusercontent.com/4Lt6ipknHdhytA3yBKGstu2R75Ip-RCpIng6rmnsOT6bHR_Nq0BiIEXI81-kV4otHS5epUEz8YSoIYg5DdeVCiVZ9UguiWsk=rw', ''),
		('Tản nhiệt', 5, 'https://60a99bedadae98078522-a9b6cded92292ef3bace063619038eb1.ssl.cf2.rackcdn.com/images_CategoryImages_cooling_500.jpg', ''),
		-- phụ kiện
		('Chuột', 6, 'https://lh3.googleusercontent.com/eIAVPQdJ20jpuDYypRQSF5zcugh6q6V4_04jopbdc5gdvQUo11j6z_1K9NGV2DNSlzofo2ztZaKZuZ0ijKDUvUExrOZuZTQ=rw', ''),
		('Bàn phím', 6, 'https://lh3.googleusercontent.com/x-UKqLN2rYJIb365dmAUfqR8T09NwI0gzqnUJsCIJsaaFUGSsWWzQoxY6e1FjghDm8E7kR9SR0jySLL6hBfgh2msMi2vJ2mp=rw', ''),
		('Webcam', 6, '', ''),
		-- thiết bị âm thanh
		('Tai nghe', 7, 'https://file.hstatic.net/200000722513/file/tai_nghe_ed3b4f52172f40929e1d3ab493099b73.jpg', ''),
		('Loa', 7, 'https://lh3.googleusercontent.com/S1yuYdyvEMVRPWQqTV9wVhhGLE2oa8Yc1JhT2hjDOFFLb-QeO9YFxNRIb7IV2MmeFCSa0SwE4bj0SiNvsX4MD7t4ZAiIWR15tA=rw', ''),
		('MicroPhone', 7, '', '');
        
			-- bac 3
			insert into categories (name, parent_id, image_path, icon_path) values  
				-- laptop
				('Apple', 7, '', ''),
				('Acer', 7, '', ''),
				('Asus', 7, '', ''),
				('HP', 7, '', ''),
				('Dell', 7, '', ''),
				('Lenovo', 7, '', ''),
				('MSI', 7, '', ''),
				('Gigabyte', 7, '', ''),

				('Laptop gaming', 8, '', ''),
				('Laptop văn phòng', 8, '', ''),
				('Laptop đồ họa', 8, '', ''),
				('Laptop mỏng nhẹ', 8, '', ''),

				('Laptop 14 inch', 9, '', ''),
				('Laptop 15 inch', 9, '', ''),
				('Laptop 16 inch', 9, '', ''),
				('Laptop 17 inch', 9, '', ''),
				-- pc
				('Apple', 10, '', ''),
				('Acer', 10, '', ''),
				('Asus', 10, '', ''),
				('HP', 10, '', ''),
				('Dell', 10, '', ''),
				('Lenovo', 10, '', ''),
				('MSI', 10, '', ''),
				('Gigabyte', 10, '', ''),

				('PC gaming', 11, '', ''),
				('PC văn phòng', 11, '', ''),
				('PC đồ họa', 11, '', ''),
				('PC All-in-one', 11, '', ''),
				('PC mini', 11, '', ''),

				('Dưới 10 triệu', 12, '', ''),
				('10 - 15 triêu', 12, '', ''),
				('15 -20 triệu', 12, '', ''),
				('Trên 20 triêu', 12, '', ''),
				-- manhinh
				('Apple', 13, '', ''),
				('Acer', 13, '', ''),
				('Asus', 13, '', ''),
				('HP', 13, '', ''),
				('Dell', 13, '', ''),
				('Lenovo', 13, '', ''),
				('MSI', 13, '', ''),
				('Gigabyte', 13, '', ''),
				('AOC', 13, '', ''),
				('LQ', 13, '', ''),
				('Philiips', 13, '', ''),
				('Viewsonic', 13, '', ''),
				('Samsung', 13, '', ''),

				('Dưới 19 inch', 14, '', ''),
				('24 inch', 14, '', ''),
				('27 inch', 14, '', ''),
				('32 inch', 14, '', ''),
				('32 inch trở lên', 14, '', ''),

				('60 Hz', 15, '', ''),
				('75 Hz', 15, '', ''),
				('100Hz', 15, '', ''),
				('144 Hz', 15, '', ''),
				('165 Hz', 15, '', ''),
				('240 Hz', 15, '', ''),
				('170hz', 15, '', ''),

				('HD 720p', 16, '', ''),
				('Full HD 1080p', 16, '', ''),
				('1440p', 16, '', ''),
				('UHD 4K', 16, '', ''),

				('Màn hình Gaming', 17, '', ''),
				('Màn hình thiết kế', 17, '', ''),
				('Màn hình cong', 17, '', ''),
				('Màn hình văn phòng', 17, '', ''),
				-- linh kien
				('SAMA', 18, '', ''),
				('XIGMATEK', 18, '', ''),
				('Golden Field', 18, '', ''),
				('Deepcool', 18, '', ''),
				('Cooler Master', 18, '', ''),
				('Aerocool', 18, '', ''),
				('ASUS', 18, '', ''),
				('MSI', 18, '', ''),
				('CORSAIR', 18, '', ''),
				('ANTEC', 18, '', ''),
				('Cougar', 18, '', ''),
				('DELUXE', 18, '', ''),
				('EROSI', 18, '', ''),
				('GIGABYTE', 18, '', ''),
				('MIK', 18, '', ''),
				('SEGOTEP', 18, '', ''),

				('Ổ cứng HDD', 19, '', ''),
				('Ổ cứng SSD', 19, '', ''),
				('Ổ cứng di động', 19, '', ''),

				('Pentium', 20, '', ''),
				('Core i3', 20, '', ''),
				('Core i5', 20, '', ''),
				('Core i7', 20, '', ''),
				('Core i9', 20, '', ''),
				('Xeon', 20, '', ''),
				('Athlon', 20, '', ''),
				('Ryzen 3', 20, '', ''),
				('Ryzen 5', 20, '', ''),
				('Ryzen 7', 20, '', ''),
				('Ryzen 9', 20, '', ''),
				('Threadripper', 20, '', ''),

				('Cooler Master', 21, '', ''),
				('Golden Field', 21, '', ''),
				('CORSAIR', 21, '', ''),
				('Gigabyte', 21, '', ''),
				('AcBel', 21, '', ''),
				('ASUS', 21, '', ''),
				('MSI', 21, '', ''),
				('SEGOTEP', 21, '', ''),
				('XIGMATEK', 21, '', ''),
				('ANTEC', 21, '', ''),
				('DEEPCOOL', 21, '', ''),
				('MIK SPOWER', 21, '', ''),

				('ASUS', 22, '', ''),
				('ASRock', 22, '', ''),
				('GIGABYTE', 22, '', ''),
				('MSI', 22, '', ''),
				('Intel', 22, '', ''),
				('AMD', 22, '', ''),('ASUS', 23, '', ''),

				('Colorful', 23, '', ''),
				('GALAX', 23, '', ''),
				('GIGABYTE', 23, '', ''),
				('MSI', 23, '', ''),
				('NVIDIA', 23, '', ''),
				('AMD', 23, '', ''),

				('Kingston', 24, '', ''),
				('Gigabyte', 24, '', ''),
				('KINGMAX', 24, '', ''),
				('G.SKILL', 24, '', ''),
				('CORSAIR', 24, '', ''),
				('Adata', 24, '', ''),
				('Apacer', 24, '', ''),
				('Lexar', 24, '', ''),
				('TEAM', 24, '', ''),
					-- tan nhiet 25
					
				-- phu kien
				('Có dây', 26, '', ''),
				('Không dây', 26, '', ''),

				('Bàn phím cơ', 27, '', ''),
				('Bàn phím thường', 27, '', ''),
				('Bàn phím giả cơ', 27, '', ''),
					-- web cam 28
				-- sound
				('Có dây', 29, '', ''),
				('Không dây', 29, '', ''),
				('Chụp tai', 29, '', ''),
				('Nhét tai', 29, '', ''),

				('Loa vi tính', 30, '', ''),
				('Loa SoundBar', 30, '', ''),
				('Loa Bluetooh', 30, '', ''),
				('Loa Mini', 30, '', ''),

				('Có dây', 31, '', ''),
				('Không dây', 31, '', '');