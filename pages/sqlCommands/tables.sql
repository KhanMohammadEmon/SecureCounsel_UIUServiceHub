DROP DATABASE IF EXISTS uiuservicehub;
CREATE DATABASE IF NOT EXISTS uiuservicehub;
USE uiuservicehub;

create table admin
(
    id int AUTO_INCREMENT,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) UNIQUE,
    phone_number varchar(50),
    passwords VARCHAR(20),
    gender varchar(20) not null,
    primary key(id)
);

create table general_user(
    id int AUTO_INCREMENT,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) UNIQUE,
    phone_number varchar(50),
    passwords VARCHAR(20),
    gender varchar(20) not null,
    primary key(id)
);


ALTER TABLE general_user DROP COLUMN failed_attempts;
ALTER TABLE admin DROP COLUMN failed_attempts;
ALTER TABLE forumRep DROP COLUMN failed_attempts;

ALTER TABLE general_user ADD COLUMN failed_attempts int(15) NOT NULL DEFAULT 0 After gender;
ALTER TABLE admin ADD COLUMN failed_attempts int(15) NOT NULL DEFAULT 0 After gender;
ALTER TABLE forumRep ADD COLUMN failed_attempts int(15) NOT NULL DEFAULT 0 After gender;






create table forumRep(
    id int AUTO_INCREMENT,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) UNIQUE,
    phone_number varchar(50),
    passwords VARCHAR(20),
    gender varchar(20) not null,
    primary key(id)
);


CREATE TABLE categories (
  id int(11) NOT NULL,
  cat_name varchar(255) NOT NULL,
  cat_order varchar(255) NOT NULL
);

INSERT INTO `categories` (`id`, `cat_name`, `cat_order`) VALUES
(1, 'Events', '1'),
(2, 'Job Post', '2');

CREATE TABLE posts (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  title varchar(255) NOT NULL,
  description longtext NOT NULL,
  img varchar(255) NOT NULL,
  old_img varchar(255) NOT NULL,
  cat_id varchar(255) NOT NULL,
  date varchar(255) NOT NULL,
  view int(11) NOT NULL,
  f_email varchar(50) not null
);

create table post_comment(
    id int (5) AUTO_INCREMENT,
    cDates date,
    cTime time,
    content varchar(1000),
    cLike int,
    post_id int,
    PRIMARY key(id) 
);

ALTER TABLE post_comment ADD COLUMN name VARCHAR(250) After post_id;

-- admin panel:

create table shuttle_add (
id int(5) Auto_increment,
busname varchar(50) not null,
`source` varchar(50) not null,
destination varchar (50) not null,
`time` varchar(50) not null,
 capacity int(5) not null,
 PRIMARY key(id)
);

ALTER TABLE shuttle_add ADD COLUMN email VARCHAR(250) After capacity;


CREATE TABLE loan_application (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    full_name varchar(100) NOT NULL,
    student_id varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    phone_number varchar(50) NOT NULL,
    amount double NOT NULL,
    documents varchar(255) NOT NULL,
    application_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status enum('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    user_type enum('admin', 'general_user', 'forumRep') NOT NULL,
    user_id int(11) NOT NULL
);


CREATE TABLE request_shuttle(
    id int AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    student_id varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    phone_number varchar(50),
    source varchar(50) NOT NULL,
    destination varchar(50) NOT NULL,
    time varchar(50) NOT NULL,
    `status`enum('pending', 'approved','rejected') NOT NULL DEFAULT 'pending'
);

CREATE TABLE shuttle_payment(
    id int AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    student_id varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    phone_number varchar(50),
    payment_number varchar(50) NOT NULL,
    amount varchar(50) NOT NULL,
    route_name varchar(50) NOT NULL,
    route_id int(5) NOT NULL
);
CREATE TABLE loan_payment(
    id int AUTO_INCREMENT PRIMARY KEY,
    full_name varchar(100) NOT NULL,
    student_id varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    phone_number varchar(50),
    payment_number varchar(50) NOT NULL,
    amount varchar(50) NOT NULL,
    loan_id int(5) NOT NULL
);


-- create table room(
--     id int AUTO_INCREMENT,
--     forum_name VARCHAR(100),
--     forumRep_id int, 

--     primary key(id),
--     Foreign Key (forumRep_id) REFERENCES forumRep(id)
-- );

-- ALTER TABLE room ADD COLUMN active int(10) After forumRep_id;

CREATE table room1(

    id int AUTO_INCREMENT,
    forum_name VARCHAR(100),
    forumRep_id int AUTO_INCREMENT, 
    primary key(id),
    active int(10) 
);


create table users(
    room_id int,
    users_id int,
    approve int, 

    Foreign Key (room_id) REFERENCES room1(id),
    Foreign Key (users_id) REFERENCES general_user(id)
);

create table chats(
    room_id int,
    users_id int,
    forumRep_id int,
    texts varchar(200), 
    sl_no int AUTO_INCREMENT PRIMARY KEY,
    dates date,
    mtime time,

    Foreign Key (room_id) REFERENCES room(id),
    Foreign Key (users_id) REFERENCES general_user(id),
    Foreign Key (forumRep_id) REFERENCES forumRep(id)
);

CREATE TABLE hostel_rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255),
    img VARCHAR(255),
    price FLOAT,
    available_room INT
);


CREATE TABLE hostel_payment(
    id int AUTO_INCREMENT PRIMARY KEY,
    full_name varchar(100) NOT NULL,
    student_id varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    phone_number varchar(50),
    payment_number varchar(50) NOT NULL,
    amount varchar(50) NOT NULL,
    room_id int(5) NOT NULL
);


CREATE TABLE IF NOT EXISTS IP (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(255) NOT NULL
);