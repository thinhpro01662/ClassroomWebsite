CREATE DATABASE classroom;
CREATE TABLE IF NOT EXISTS `users` (
 `Id` int(11) NOT NULL AUTO_INCREMENT,
 `Username` varchar(50) NOT NULL,
 `Email` varchar(50) NOT NULL,
 `Password` varchar(50) NOT NULL,
 `Name` varchar(50) NOT NULL,
 `Bdate` date NOT NULL,
 `Phone` int(20) NOT NULL,
 `Role` varchar(50) DEFAULT 'student',
 PRIMARY KEY (`id`)
 );
 
 insert into users (Username, Password, Role) values('admin', MD5('admin'), 'admin');

CREATE TABLE IF NOT EXISTS `class` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
`id_giaovien` varchar(50) NOT NULL,
 `ten_lop` varchar(50) NOT NULL,
 `ten_mon` varchar(50) NOT NULL,
 `phong_hoc` varchar(50) NOT NULL,
 `hinh_anh` varchar(50) NOT NULL,
 `ma_lop` varchar(10) NOT NULL,
 PRIMARY KEY (`id`)
 );
 
CREATE TABLE IF NOT EXISTS `comments` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`page_id` int(11) NOT NULL,
	`parent_id` int(11) NOT NULL DEFAULT '-1',
	`name` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`submit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

  
  CREATE TABLE join_class(
 `id` varchar(50) NOT NULL AUTO_INCREMENT, 
 `username` varchar(50) NOT NULL, 
 `id_lop` varchar(50) NOT NULL, 
 `ma_lop` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
};

CREATE TABLE IF NOT EXISTS class_detail (
 id int(11) NOT NULL AUTO_INCREMENT,
 id_giaovien varchar(50) NOT NULL,
 id_lop varchar(50) NOT NULL,
 title varchar(50) NOT NULL,
 url varchar(50) NOT NULL,
 content mediumtext NOT NULL,
 image varchar(50) NOT NULL,
 PRIMARY KEY (id)
 );

  CREATE TABLE join_class(
 `id` varchar(50) NOT NULL AUTO_INCREMENT, 
 `username` varchar(50) NOT NULL, 
 `id_lop` varchar(50) NOT NULL, 
 `ma_lop` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
};

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;
 