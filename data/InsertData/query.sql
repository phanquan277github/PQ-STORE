chan loi;

delete from categories;
select * from categories;
select * from products;
select * from pictures;
select * from specifications;
select * from describes;
select * from carts;
select * from cart_items;
select * from product_categories;
drop table product_categories;
drop table main_specifications;
delete from products where id = 81;
ALTER TABLE products AUTO_INCREMENT = 1;

select id from categories where id = 2 or parent_id = 2;

SELECT p.*
FROM products p
LEFT JOIN product_categories pc ON p.id = pc.product_id
WHERE pc.category_id IN (SELECT id FROM categories);

select * from products order by id asc limit 0, 30;


SELECT p.*, ms.content
            FROM (products p LEFT JOIN main_specifications ms ON p.id = ms.product_id)
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            WHERE pc.category_id IN (SELECT id FROM categories WHERE id = 8 or parent_id = 8) LIMIT 40;


SELECT * FROM cart_items;


SELECT p.*, ci.quantity FROM products p LEFT JOIN (carts c RIGHT JOIN cart_items ci
     ON c.id = ci.cart_id) ON p.id = ci.product_id WHERE c.user_id = 1;
     
     SELECT p.*, ci.quantity FROM products p
      LEFT JOIN (carts c RIGHT JOIN cart_items ci ON c.id = ci.cart_id)
      ON p.id = ci.product_id WHERE c.user_id = 2;

SELECT count(*) AS count
            FROM products p
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            WHERE pc.category_id IN (SELECT id FROM categories WHERE id = 1 or parent_id = 1);