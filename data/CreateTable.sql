use pqstore;

ALTER DATABASE pqstore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- starts server data 
CREATE TABLE `slideshows` (
  `id` int PRIMARY KEY auto_increment,
  `name` varchar(255), -- hiện thị bên admin
  `image_path` text,
  `link` text default null, -- đường dẫn đến trang mong muốn
  `display` boolean default false, -- biến cờ để admin set cái nào sẽ được hiển thị ra giao diện
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp
);
-- insert into slideshows (image_path, display) values ("");

CREATE TABLE `banners` (
  `id` int PRIMARY KEY auto_increment,
  `name` varchar(255),
  `image_path` varchar(255),
  `link` text default null, -- đường dẫn đến trang mong muốn
  `position` varchar(255), -- vị trí hiển thị
  `display` boolean, -- biến cờ để admin set cái nào sẽ được hiển thị ra giao diện
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp
);
-- insert into banners (image_path) values ("");
CREATE TABLE `categories` (
	`id` int PRIMARY KEY auto_increment,
	`name` varchar(255),
	-- `sku` varchar(20) DEFAULT (uuid_short()),
	`parent_id` int,
	`image_path`text ,
	`icon_path`text default null,
	`inserted_at` timestamp default current_timestamp,
	`updated_at` timestamp default current_timestamp on update current_timestamp,
	foreign key (parent_id) references categories(id) -- "Mối quan hệ đệ quy (recursive relationship)" hoặc "Mối quan hệ tự tham chiếu (self-referencing relationship)".
);
-- insert into categories (name, parent_id, image_path) values ("", 0, "");

-- chứa các bộ lọc tương ứng cho từng category
CREATE TABLE `filters` (
	id int primary key auto_increment,
    filter_type varchar(255),
    category_id int,
    foreign key (category_id) references categories(id) ON DELETE CASCADE -- composition: xoá cha -> con tự xóa
);
-- insert into filters(filter_type, category_id) values ('', )

CREATE TABLE `filter_content` (
	id int primary key auto_increment,
    filter_id int,
    content varchar(255),
    foreign key (filter_id) references filters(id) ON DELETE CASCADE -- composition: xoá cha -> con tự xóa
);

CREATE TABLE `products` (
  `id` int PRIMARY KEY auto_increment,
  `sku` char(36) DEFAULT (uuid_short()), -- trả về dãy số nguyên 64bit
  `name` varchar(255),
  `brand` varchar(255),
  -- `slug` varchar(255), -- tạo URL bằng tên sản phẩm để dùng hiển thị thay cho sku hay id của sản phẩm
  `price` DECIMAL(10, 2),
  `discount` DECIMAL(15, 2),
  `stock_quantity` int,
  `thumbnail_path` text,
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp
);
-- insert into Products (product_name, slug, price, discount, quantity, thumbnail_path) values (); 

CREATE TABLE `product_categories` (
  `id` int primary key auto_increment,
  `category_id` int,
  `product_id` int,
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp,
    foreign key (category_id) references categories(id) ON DELETE CASCADE, -- composition: xoá cha -> con tự xóa
    foreign key (product_id) references products(id) ON DELETE CASCADE -- composition: xoá cha -> con tự xóa
);
-- insert into Product_categories (category_id, product_id) values (0, 0); 

CREATE TABLE `pictures` (
  `id` int PRIMARY KEY auto_increment,
  `product_id` int,
  `image_path` text,
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp,
  foreign key (product_id) references products(id) on delete cascade -- composition
);
-- insert into Pictures (product_id, image_path) values ();

CREATE TABLE `describes` (
  `id` int PRIMARY KEY auto_increment,
  `product_id` int,
  `title` varchar(255),
  `content` text,
  `image_path` text,
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp,
  foreign key (product_id) references products(id) on delete cascade -- composition
);
-- insert into Detailed_Descriptions (product_id, title, content, image_path) values ();

CREATE TABLE `specifications` (
  `id` int PRIMARY KEY auto_increment,
  `product_id` int,
  `title` varchar(255),
  `content` varchar(255),
  `isTitle` boolean default false, -- đánh dấu là tiêu đề nên sẽ không có content cho nó
  `isMain` boolean default false, -- đánh dấu là thông số kỹ thuật chính để hiển thị ở phần thông số kỹ thuật chính
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp,
  foreign key (product_id) references products(id) on delete cascade -- composition
);

-- end server data 
        

-- start user data
CREATE TABLE `users` (
 `id` int primary key AUTO_INCREMENT,
 `oauth_provider` enum('facebook','google',  'local') NOT NULL DEFAULT 'local',
 `oauth_uid` varchar(255) NOT NULL,
   `password` VARCHAR(255) NULL,      -- chỉ dùng cho local (bcrypt hash)
 `first_name` varchar(50) DEFAULT NULL,
 `last_name` varchar(50) DEFAULT NULL,
 `email` varchar(255) NOT NULL,
 `gender` varchar(10) DEFAULT NULL,
 `picture` text default NULL, -- avata 
 UNIQUE KEY (`email`),   -- mỗi email duy nhất
  UNIQUE KEY (`oauth_provider`, `oauth_uid`), -- tránh trùng fb/gg/local
  `inserted_at` timestamp default current_timestamp,
  `updated_at` timestamp default current_timestamp on update current_timestamp
);

CREATE TABLE `carts` (
  `id` int PRIMARY KEY auto_increment,
  `user_id` int NOT NULL UNIQUE
);
ALTER TABLE `carts` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

CREATE TABLE `cart_items` (
  `id` int PRIMARY KEY auto_increment,
  `cart_id` int,
  `product_id` int,
  `quantity` int,
  foreign key (cart_id) references carts(id) on delete cascade, -- composition
  foreign key (product_id) references products(id) on delete cascade -- composition
);

CREATE TABLE `orders` (
  `id` int PRIMARY KEY auto_increment,
  `customer_id` int,
  `phone_number` char(255),
  `address` nvarchar(255),
  `status` nchar(255),
  `notes` text,
  `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `order_items` (
  `id` int PRIMARY KEY auto_increment,
  `order_id` int,
  `product_id` int,
  `quantity` int,
  `total` DECIMAL(10, 2)
);
-- end user data
-- constaint for user data
-- ALTER TABLE `customers` ADD FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
ALTER TABLE `order_items` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
-- ALTER TABLE `orders` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);


CREATE TABLE `admin` (
	id int primary key auto_increment,
    username varchar(255) not null unique,
    password varchar(255) not null,
    role enum('admin', 'manager')
);
