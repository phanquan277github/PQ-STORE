#!/bin/bash
set -e


MARKER="/var/lib/mysql/.db_inited"

if [ -f "$MARKER" ]; then
  echo "⚠️ Init script đã chạy trước đó, bỏ qua."
  exit 0
fi

echo "🚀 Bắt đầu khởi tạo database ..."

# Config DB (lấy từ biến môi trường docker-compose)
DB_HOST="localhost"
DB_USER="${MYSQL_USER:-pquser}"
DB_PASS="${MYSQL_PASSWORD:-pqpass}"
DB_NAME="${MYSQL_DATABASE:-pqstore}"

# Hàm chạy SQL
run_sql() {
    echo "==> Running $1"
    mysql -h $DB_HOST -u"$DB_USER" -p"$DB_PASS" "$DB_NAME" < "$1"
}

echo "🚀 Bắt đầu khởi tạo database $DB_NAME ..."

# 1. Insert banners & slideshow
run_sql "/docker-entrypoint-initdb.d/InsertData/insertBannersAndSlideshow.sql"

# 2. Insert categories theo từng cụm
echo "==> Insert Categories (root + bậc 1)"
awk '/-- root cate/,/-- bac 1/' /docker-entrypoint-initdb.d/InsertData/insertCategories.sql \
    | mysql -h $DB_HOST -u"$DB_USER" -p"$DB_PASS" "$DB_NAME"

awk '/-- bac 1/,/-- bac 2/' /docker-entrypoint-initdb.d/InsertData/insertCategories.sql \
    | mysql -h $DB_HOST -u"$DB_USER" -p"$DB_PASS" "$DB_NAME"

echo "==> Insert Categories (bậc 2)"
awk '/-- bac 2/,/-- bac 3/' /docker-entrypoint-initdb.d/InsertData/insertCategories.sql \
    | mysql -h $DB_HOST -u"$DB_USER" -p"$DB_PASS" "$DB_NAME"

echo "==> Insert Categories (bậc 3)"
awk '/-- bac 3/,0' /docker-entrypoint-initdb.d/InsertData/insertCategories.sql \
    | mysql -h $DB_HOST -u"$DB_USER" -p"$DB_PASS" "$DB_NAME"

# 3. Insert products
run_sql "/docker-entrypoint-initdb.d/InsertData/insertProducts.sql"

# 4. Insert phụ
run_sql "/docker-entrypoint-initdb.d/InsertData/insertPhu.sql"

echo "✅ Database $DB_NAME đã được khởi tạo thành công!"

touch "$MARKER"
