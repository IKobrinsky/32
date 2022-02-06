CREATE DEFINER=`vionzawd_test`@`localhost` PROCEDURE `CheckUser` (IN `login` VARCHAR(30), IN `password` VARCHAR(30))  NO SQL
select usrID
		from users
		where usrLogin = login 
		  and usrPassword  = password
		limit 1