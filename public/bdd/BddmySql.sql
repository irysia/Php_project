CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fullName` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `theme` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `authorId` int,
  `theme` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `post` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `authorId` int,
  `themeId` int,
  `typeId` varchar(255),
  `content` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `postType` (
  `postTypeId` int PRIMARY KEY AUTO_INCREMENT,
  `postTypeName` varchar(255),
  `postTypeUrl` varchar(255)
);

ALTER TABLE `theme` ADD FOREIGN KEY (`authorId`) REFERENCES `user` (`id`);

ALTER TABLE `post` ADD FOREIGN KEY (`themeId`) REFERENCES `theme` (`id`);

ALTER TABLE `post` ADD FOREIGN KEY (`authorId`) REFERENCES `user` (`id`);

ALTER TABLE `post` ADD FOREIGN KEY (`typeId`) REFERENCES `postType` (`postTypeId`);
