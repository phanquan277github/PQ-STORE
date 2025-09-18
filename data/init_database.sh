#!/bin/bash
# Script chạy tuần tự các file SQL vào MySQL

# Thông tin kết nối MySql
DB_USER="root"
DB_PASS="your_password"
DB_NAME="your_database"

# Đường dẫn tới thư mục data
DATA_DIR="./data"

# 1. Tạo bảng
echo "==> Chạy CreateTable.sql..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < "$DATA_DIR/CreateTable.sql"

# 2. Insert banners & slideshow
echo "==> Chạy insertBannersAndSlideshow.sql..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < "$DATA_DIR/InsertData/insertBannersAndSlideshow.sql"

# 3. Insert categories (theo từng cụm)
echo "==> Insert Categories - root + bậc 1..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < <(awk '/-- root cate/,/-- bac 1/' "$DATA_DIR/InsertData/insertCategories.sql")
mysql -u $DB_USER -p$DB_PASS $DB_NAME < <(awk '/-- bac 1/,/-- bac 2/' "$DATA_DIR/InsertData/insertCategories.sql")

echo "==> Insert Categories - bậc 2..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < <(awk '/-- bac 2/,/-- bac 3/' "$DATA_DIR/InsertData/insertCategories.sql")

echo "==> Insert Categories - bậc 3..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < <(awk '/-- bac 3/,0' "$DATA_DIR/InsertData/insertCategories.sql")

# 4. Insert products
echo "==> Chạy insertProducts.sql..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < "$DATA_DIR/InsertData/insertProducts.sql"

# 5. Insert phụ
echo "==> Chạy inserPhu.sql..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < "$DATA_DIR/InsertData/inserPhu.sql"

echo "✅ Hoàn thành!"
