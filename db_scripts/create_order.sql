CREATE TABLE ecom_order (
  id int NOT NULL AUTO_INCREMENT,
  uid int,
  pid int NOT NULL,
  refid varchar(255),
  name varchar(255),
  email varchar(255),
  address varchar(255),
  city varchar(255),
  zipcode varchar(20),
  PRIMARY KEY (id),
  FOREIGN KEY (uid) REFERENCES ecom_customer(id),
  FOREIGN KEY (pid) REFERENCES ecom_products(id)
);