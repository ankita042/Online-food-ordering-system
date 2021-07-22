<?php

include"connect.php";

$q="create table customer 
   (customer_id int(7) primary key auto_increment,
    name varchar(30) not null,
	email_id varchar(50) not null unique ,
    password varchar(50) not null,
    phone varchar(50) not null,
    address varchar(500) not null)";
$sq=mysqli_query($conect,$q);


$q="create table vendor
   (vendor_id int(7) primary key auto_increment,
    name varchar(30) not null,
	email_id varchar(50) not null unique ,
    password varchar(50) not null,
    phone varchar(50) not null,
    address varchar(500) not null)";
$sq=mysqli_query($conect,$q);


$q="create table enquire 
   (eq_id int(7) primary key auto_increment,
    name varchar(30) not null,
	email_id varchar(50) not null unique ,
    phone varchar(50) not null,
    message varchar(500) not null,
	msg_date date not null)";
$sq=mysqli_query($conect,$q);


$q="create table product
   (product_id int(7) primary key auto_increment,
    vendor_id int(50) not null,
    name varchar(30) not null,
	photo varchar(50) not null ,
    quantity varchar(50) not null,
    rate varchar(50) not null,
    description varchar(500) not null)";
$sq=mysqli_query($conect,$q);


$q="create table bill
   (bill_id int(7) primary key auto_increment,
    customer_id int(7) not null,
    vendor_id int(7) not null,
    product_id int(7) not null,
    quantity varchar(50) not null,
    status varchar(50) not null default'n',
    total varchar(50) not null)";
$sq=mysqli_query($conect,$q);

?>