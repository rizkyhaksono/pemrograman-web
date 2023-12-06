CREATE TABLE `authors` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `genres` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `books` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
);

CREATE TABLE `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `is_main_author` BOOLEAN NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`, `author_id`),
  FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
);
