CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nickname` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `topic` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `topic` varchar(255),
  `created_at` timestamp,
  `author_id` int
);

CREATE TABLE `post` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(255),
  `created_at` timestamp,
  `topic_id` int,
  `postType_id` int,
  `author_id` int
);

CREATE TABLE `postType` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `postType` varchar(255),
  `postTypeUrl` varchar(255)
);

ALTER TABLE `topic` ADD FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

ALTER TABLE `post` ADD FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`);

ALTER TABLE `post` ADD FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

ALTER TABLE `post` ADD FOREIGN KEY (`postType_id`) REFERENCES `postType` (`id`);
