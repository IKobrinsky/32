CREATE TABLE `users` (
 `usrID` int(11) NOT NULL AUTO_INCREMENT,
 `usrLogin` varchar(64) NOT NULL,
 `usrPassword` varchar(64) DEFAULT NULL,
 `usrHash` varchar(32) DEFAULT NULL,
 PRIMARY KEY (`usrID`),
 UNIQUE KEY `users_login` (`usrLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8
