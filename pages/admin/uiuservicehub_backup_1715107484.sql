

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `passwords` varchar(20) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `failed_attempts` int(15) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO admin VALUES("1","Emon","Khan","emon123@gmail.com","0178909890","184e540000000","Male","0");



CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO categories VALUES("1","Events","1");
INSERT INTO categories VALUES("2","Job Post","2");



CREATE TABLE `chats` (
  `room_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `forumRep_id` int(11) DEFAULT NULL,
  `texts` varchar(200) DEFAULT NULL,
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date DEFAULT NULL,
  `mtime` time DEFAULT NULL,
  PRIMARY KEY (`sl_no`),
  KEY `room_id` (`room_id`),
  KEY `users_id` (`users_id`),
  KEY `forumRep_id` (`forumRep_id`),
  CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `general_user` (`id`),
  CONSTRAINT `chats_ibfk_3` FOREIGN KEY (`forumRep_id`) REFERENCES `forumrep` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO chats VALUES("1","5","","hlw","5","2023-08-27","04:58:53");
INSERT INTO chats VALUES("1","1","","hi","7","2023-08-27","05:28:48");
INSERT INTO chats VALUES("1","1","","hi","8","2023-08-27","05:29:33");
INSERT INTO chats VALUES("1","7","","hi emon","10","2023-08-27","05:55:45");



CREATE TABLE `forumrep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `passwords` varchar(20) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `failed_attempts` int(15) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO forumrep VALUES("1","UIU","App Forum","a@gmail.com","12346","c273000000000","Male","0");
INSERT INTO forumrep VALUES("2","UIU Computer ","Club","c@gmail.com","01797144206","c273000000000","Male","0");
INSERT INTO forumrep VALUES("3","UIU Robitics","Club","r@gmail.com","01405081736","c273000000000","Male","0");
INSERT INTO forumrep VALUES("4","UIU Accounting","Forum","account@gmail.com","123","c273000000000","Male","0");
INSERT INTO forumrep VALUES("5","UIU Sports ","Club","sport@gmail.com","123","c273000000000","Male","0");



CREATE TABLE `general_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `passwords` varchar(20) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `failed_attempts` int(15) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO general_user VALUES("5","Emon","Khan","app@gmail.com","01797144206","123","Male","0");
INSERT INTO general_user VALUES("7","sayem","Ahmed","s@gmail.com","0967543","123","Male","0");
INSERT INTO general_user VALUES("8","Kibria","Golam","b@gmail.com","0179709876","123","Male","0");
INSERT INTO general_user VALUES("9","Emon ","Khan","emon122734@gmail.com","01597144206","123","Male","0");
INSERT INTO general_user VALUES("10","6867","5665","d@hkhkh.com","55575","000","Male","0");
INSERT INTO general_user VALUES("11","new","haha","new@gmail.com","01797144206","184e540000","Male","0");
INSERT INTO general_user VALUES("14","Khan","Emon","uiu1@gmail.com","01571337468","184e540000000","Male","0");
INSERT INTO general_user VALUES("15","kibria","uiu","gk599625@gmail.com","01571337468","c273000000000","Male","0");



CREATE TABLE `hostel_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `payment_number` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `room_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO hostel_payment VALUES("1","Emon Khan","2024-02-27","app@gmail.com","01797144206","01123589","4000","1");



CREATE TABLE `hostel_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `available_room` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO hostel_rooms VALUES("1","Double","1252728597230216532.jpg","4000","12");
INSERT INTO hostel_rooms VALUES("2","Single","84575154533063458_2144699618924030_8432174653602004992_n.jpg","200","12");
INSERT INTO hostel_rooms VALUES("3","Double","54372331230216532.jpg","0","0");
INSERT INTO hostel_rooms VALUES("4","Single","504796479366680301_613541400894192_1972056558268984568_n.jpg","8888890","0");



CREATE TABLE `ip` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO ip VALUES("2","127.0.0.1");
INSERT INTO ip VALUES("6","::1");



CREATE TABLE `loan_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `documents` varchar(255) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `user_type` enum('admin','general_user','forumRep') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_application VALUES("1","Emon","011201394","kemon201394@bscse.uiu.ac.bd","01797144206","12000","Mid_Term_Question_223_CSE3411_A_AzAk_2.pdf","2023-08-06 14:21:51","approved","general_user","5");
INSERT INTO loan_application VALUES("2","Emon Khan","011201394","kemon201394@bscse.uiu.ac.bd","01797144206","12000","Mid_Term_Question_223_CSE3411_A_AzAk_2_1.pdf","2023-08-06 14:25:45","pending","general_user","5");
INSERT INTO loan_application VALUES("3","Emon","011201394","sdfj@gamil.com","123","123","Contrast Limited Adaptive Histogram Equalization_2.pdf","2023-08-06 14:41:47","pending","general_user","5");
INSERT INTO loan_application VALUES("4","hfg","011","app@gmail.com","01797144206","0","Profile.pdf","2023-08-13 14:39:08","approved","general_user","5");
INSERT INTO loan_application VALUES("5","Emon Khan","011201394","kemon201394@bscse.uiu.ac.bd","01797144206","1200","Finals Week 1 + 2 - An Introduction to the ML Pipeline and ANN for Image Processing.pdf","2023-08-26 15:03:06","approved","general_user","5");
INSERT INTO loan_application VALUES("6","Emon Khan ","011201394","","011201394","1200","CN Note After Final Lec 5.pdf","2023-08-26 19:28:16","rejected","general_user","5");
INSERT INTO loan_application VALUES("7","Emon Khan ","011201394","app@gmail.com","027","1200","Offline04-Binary_Logistic_Regression.pdf","2023-08-26 19:29:56","approved","general_user","5");
INSERT INTO loan_application VALUES("8","Emon Khan ","011201394","app@gmail.com","0112013223","1200","Offline04-Binary_Logistic_Regression_1.pdf","2023-08-26 19:34:47","pending","general_user","5");
INSERT INTO loan_application VALUES("9","Emon","011","app@gmail.com","01797144206","1200","Offline04-Binary_Logistic_Regression_2.pdf","2023-08-27 15:03:47","pending","general_user","5");



CREATE TABLE `loan_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `payment_number` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(50) NOT NULL,
  `loan_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_payment VALUES("1","hfg","011","app@gmail.com","01797144206","01123589","2023-08-28","1200","4");



CREATE TABLE `post_comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cDates` date DEFAULT NULL,
  `cTime` time DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `cLike` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO post_comment VALUES("1","2023-08-14","11:40:01","nice
                                ","0","37","Emon Khan");
INSERT INTO post_comment VALUES("2","2023-08-14","11:41:51","nice
                                ","0","37","Emon Khan");
INSERT INTO post_comment VALUES("3","2023-08-25","10:55:10","good event
                                ","0","39","UIU App Forum");



CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `old_img` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `f_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

INSERT INTO posts VALUES("7","Job From My Office","it is GM Post","836033963Typography Charity volunteer foundation kids logo (1).png","","2","15 Sep, 2022","13","kemon201394@bscse.uiu.ac.bd");
INSERT INTO posts VALUES("40","Project Show","Host By UIU ","1494190223WhatsApp Image 2023-08-28 at 08.58.29.jpg","","1","28 Aug, 2023","1","a@gmail.com");
INSERT INTO posts VALUES("41","instructor","?Are you a Student of UIU? then be an instructor!!
Apply now and be part of shaping the learning journey:
https://shorturl.at/bNTUX

?Benefits
- Crest after workshop
- Gift
- Your thesis, projects, and achievements will be featured in the UIU APP Forum Journal.

?N.B. A skilled individual will have the chance to engage in paid work with the UIU APP Forum Alumni.
?N.B. Only shortlisted and talented applicants will get an interview call.

?Deadline: 16.08.2022","1426724951366680301_613541400894192_1972056558268984568_n.jpg","","2","28 Aug, 2023","1","a@gmail.com");
INSERT INTO posts VALUES("42","Therap Office tour","host by computer club","603358963WhatsApp Image 2023-08-28 at 09.22.19.jpg","","1","28 Aug, 2023","8","c@gmail.com");



CREATE TABLE `request_shuttle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO request_shuttle VALUES("1","Emon","Khan","878","app@gmail.com","01797144206","uiu","mirpur-10","4:30 Pm","approved");
INSERT INTO request_shuttle VALUES("2","Emon","Khan","878","app@gmail.com","01797144206","uiu","Dhanmondi","4:30 Pm","rejected");
INSERT INTO request_shuttle VALUES("3","Emon","Khan","878","app@gmail.com","01797144206","uiu","ret","4:30 Pm","pending");
INSERT INTO request_shuttle VALUES("5","Emon","Khan","878","app@gmail.com","01797144206","uiu","mirpur-10","4:30 Pm","pending");
INSERT INTO request_shuttle VALUES("6","Emon","Khan","878","app@gmail.com","01797144206","34t334","mirpur-10","4:30 Pm","rejected");
INSERT INTO request_shuttle VALUES("7","Emon","Khan","011201394","app@gmail.com","01797144206","UIU","Jatrabari","2:00pm","pending");



CREATE TABLE `room1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(100) DEFAULT NULL,
  `active` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO room1 VALUES("1","UIU App Forum","1");
INSERT INTO room1 VALUES("2","UIU Computer  Club","1");
INSERT INTO room1 VALUES("3","UIU Robitics Club","0");
INSERT INTO room1 VALUES("4","UIU Accounting Forum","0");
INSERT INTO room1 VALUES("5","UIU Sports  Club","1");



CREATE TABLE `shuttle_add` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `busname` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `capacity` int(5) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO shuttle_add VALUES("17","route-1","uiu","mirpur-10","4:30 Pm","0","emon123@gmail.com");
INSERT INTO shuttle_add VALUES("18","route-2","uiu","Dhanmondi","4:30 Pm","27","emon123@gmail.com");
INSERT INTO shuttle_add VALUES("19","route-1","uiu","mirpur-10","4:30 Pm","7","emon123@gmail.com");
INSERT INTO shuttle_add VALUES("20","route-3","uiu","ret","4:30 Pm","0","emon123@gmail.com");
INSERT INTO shuttle_add VALUES("21","route-2","uiu","mirpur-10","4:30 Pm","32","emon123@gmail.com");



CREATE TABLE `shuttle_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `payment_number` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(50) NOT NULL,
  `route_name` varchar(50) NOT NULL,
  `route_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO shuttle_payment VALUES("4","Emon","Khan","5666","app@gmail.com","01797144206","01123589","2023-08-28","1500","route-2","18");
INSERT INTO shuttle_payment VALUES("5","Emon","Khan","5666","app@gmail.com","01797144206","098765","2023-08-28","1500","route-1","19");
INSERT INTO shuttle_payment VALUES("6","Emon","Khan","5666","app@gmail.com","01797144206","876","2023-08-28","1500","route-2","18");
INSERT INTO shuttle_payment VALUES("7","Emon","Khan","5666","app@gmail.com","01797144206","10976543","2024-02-25","1500","route-2","18");
INSERT INTO shuttle_payment VALUES("8","Emon","Khan","5666","app@gmail.com","01797144206","01123589","2024-02-27","1500","route-1","19");
INSERT INTO shuttle_payment VALUES("10","Khan","Emon","pZqmY3CYoJqd","uiu1@gmail.com","pZqqaHGaoJidomY=","pZqsaneYoZWbnGQ=","2024-05-01","1500","route-1","19");
INSERT INTO shuttle_payment VALUES("11","Khan","Emon","pZqmY3CYoJqd","6tLqYoDO2sLS2FzG3to=","pZqqaHGaoJidomY=","pZqsaneYoZWbnGQ=","2024-05-01","1500","route-1","19");



CREATE TABLE `users` (
  `room_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  KEY `room_id` (`room_id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room1` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `general_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","5","1");
INSERT INTO users VALUES("1","7","0");

