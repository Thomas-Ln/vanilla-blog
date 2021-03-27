CREATE TABLE user (
  id smallint UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  pseudo varchar(30) NOT NULL UNIQUE,
  email varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL
);

CREATE TABLE article (
  id smallint UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  author varchar(30) NOT NULL,
  title varchar(255) NOT NULL,
  content text NOT NULL,
  createdAt datetime NOT NULL
);

CREATE TABLE comment (
  id smallint UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  author varchar(30) NOT NULL,
  content text NOT NULL,
  createdAt datetime NOT NULL,
  article_id smallint(6) UNSIGNED NOT NULL
);


