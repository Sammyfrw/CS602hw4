CREATE TABLE students (
  ID        INT(11)        NOT NULL   AUTO_INCREMENT,
  firstName VARCHAR(255)   NOT NULL,
  lastName  VARCHAR(255)   NOT NULL,
  email     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (ID)
);


INSERT INTO students VALUES
(1, 'Sammy', 'Rachman', 'abc@youtube.com'),
(2, 'Joel', 'Wylde', 'def@youtube.com'),
(3, 'James', 'Rachman', 'ghi@youtube.com')
