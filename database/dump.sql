DROP DATABASE IF EXISTS MyData;
CREATE DATABASE IF NOT EXISTS MyData CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS MyData.author (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    isAdmin BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(40) NOT NULL,
    cookie VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
    );

INSERT INTO MyData.author (username, isAdmin, password, email, cookie)
VALUES ('domino', 1, '$2y$10$UUyENQL7hUlv7qTOTJQcK.uaBbsBB7h0kw1QxFTohUqsj4IJSoPVO', 'martin@sionfamily.com', '9c2001f94a5016d8532d5dce01e842c9');
-- mdp domino

INSERT INTO MyData.author (username, isAdmin, password, email, cookie)
VALUES ('zeubimaru', 0, '$2y$10$fIoR0fgbCT3z4PWz48IIu.ksGYkPNycSv6O/L3njBJmHmDdVAtaoS', 'zeubimaru@zeubimaru.com', '33bd7326ee60c13e97f51b7287bbf079');
-- mdp zeubimaru