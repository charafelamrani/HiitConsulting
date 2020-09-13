CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `idRecipient` int(11) DEFAULT NULL,
  `idSender` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (1,'salut',20,5,'2020-09-10 13:05:25');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (2,'hello',5,20,'2020-09-10 14:00:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (3,'est ce que tout va bien?',20,5,'2020-09-10 14:06:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (4,'oui tout va bien hamdoulah',5,20,'2020-09-10 15:00:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (5,'cc',21,5,'2020-09-12 02:00:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (6,'salut toi ',5,21,'2020-09-12 03:00:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (7,'Salut Aziz',22,5,'2020-09-11 03:00:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (8,'Salut Charaf',5,23,'2020-09-10 05:00:00');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (9,'coucou',20,5,'2020-09-13 10:03:22');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (10,'coucou',20,5,'2020-09-13 10:04:40');
insert into `message`(`idMessage`,`message`,`idRecipient`,`idSender`,`date`) values (11,'cc',20,5,'2020-09-13 10:06:39');



CREATE TABLE `tchat` (
  `idTchat` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `texte` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dateTchat` datetime NOT NULL,
  PRIMARY KEY (`idTchat`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (1,5,'test','2020-09-13 01:56:13');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (2,5,'test2','2020-09-13 01:57:59');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (3,21,'rÃ©ponse
','2020-09-13 02:04:13');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (4,5,'test','2020-09-13 02:15:25');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (5,5,'fqffvsdgv','2020-09-13 08:39:37');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (6,5,'fqffvsdgv','2020-09-13 08:40:32');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (7,5,'dfgvdfb','2020-09-13 08:40:43');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (8,5,'coucou','2020-09-13 09:56:53');
insert into `tchat`(`idTchat`,`idUser`,`texte`,`dateTchat`) values (9,5,'testfinal','2020-09-13 10:16:58');



CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `lastTime` datetime NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

insert into `users`(`idUser`,`userName`,`password`,`firstName`,`lastName`,`lastTime`) values (5,'charaf','$2y$10$8JuWAtSrrYlQ1opAovomK.nd.Ex3vZ0BRzekLFmM3uYMAmT.icrpq','charaf','charaf','2020-09-13 10:18:04');
insert into `users`(`idUser`,`userName`,`password`,`firstName`,`lastName`,`lastTime`) values (22,'aziz','$2y$10$TPqJwqg.wylCtiyI4XQ73OFUdVh25ASWaHGwxdCYzsXPq4.feo7zS','aziz','aziz',null);
insert into `users`(`idUser`,`userName`,`password`,`firstName`,`lastName`,`lastTime`) values (21,'moh','$2y$10$p8EVmAYvQTJZppOsUgmkL.ESR11ZRd58fdNcJ25U06MsbZRO69GgO','moh','moh','2020-09-13 10:17:43');
insert into `users`(`idUser`,`userName`,`password`,`firstName`,`lastName`,`lastTime`) values (20,'kamal','$2y$10$ciNN00nl8toC1O0kIqefIe8SqDOh4WVECbjUCraHHrGW4ajrmBTb.','kamal','kamal','2020-09-13 00:14:12');
insert into `users`(`idUser`,`userName`,`password`,`firstName`,`lastName`,`lastTime`) values (23,'souad','$2y$10$4.cJi57iSh4nNuNVRJCJZOXkdFPtyTwyCGux611YZq9WNug6itQwa','souad','souad',null);