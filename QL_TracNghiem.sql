-- CREATE DATABASE QL_TracNghiem
-- 
-- USE QL_TRACNGHIEM
-- USE QL_TRACNGHIEM


CREATE TABLE Users(
	id varchar(50) NOT NULL PRIMARY KEY,
	display_name text,
	birthday DATE ,
	sex VARCHAR(10),
	password  varchar(255) NOT NULL,
	email varchar(255),
	phone int,
	avata varchar(50),
	role varchar(50) DEFAULT 'user'
);


CREATE TABLE News(
	id varchar(50) NOT NULL,
	title varchar(200),
	content TEXT,
	image TEXT,
	user_id varchar(50),
	PRIMARY KEY (id, user_id),
	CONSTRAINT uc_News_id_used_id UNIQUE (id, user_id)
);

CREATE TABLE Exercises(
	id varchar(50) NOT NULL ,
	topic_id varchar(50) NOT NULL,
	level_id varchar(50) NOT NULL,
	time_limit_minutes INT,
  has_time_limit INT,
	user_id varchar(50) NOT NULL,
	isDel BIT DEFAULT 0,
	PRIMARY KEY (id, user_id),
	CONSTRAINT uc_Exercises_id_question_ids UNIQUE (id, user_id)
);

    
CREATE TABLE Level(
	id varchar(50) NOT NULL PRIMARY KEY,
	name varchar(50) NOT NULL
);

CREATE TABLE Topic(
	id varchar(50) NOT NULL PRIMARY KEY,
	name varchar(50),
	parent_id varchar(50)
);


CREATE TABLE Questions(
	id varchar(50),
	question text NOT NULL,
	answers TEXT,
	exercise_id varchar(50),
	isDel BIT,
	PRIMARY KEY (id, exercise_id),
	CONSTRAINT uc_Question_id_exercise_ids UNIQUE (id, exercise_id)
);



CREATE TABLE User_Exercise_History
(
	id varchar(50) NOT NULL,
	user_ids varchar(50) NOT NULL,
	date_completed DATETIME,
	score varchar(50),
	question_answers TEXT,
	exercise_id varchar(50) NOT NULL,
	PRIMARY KEY (id, user_ids),
	CONSTRAINT uc_Exercises_id_user_ids UNIQUE (id, user_ids)
);

ALTER TABLE User_Exercise_History
ADD CONSTRAINT fk_user_exercise_history_exercise_id
FOREIGN KEY (exercise_id) REFERENCES exercises(id);


-- Fogein Key Exercises
ALTER TABLE Exercises
ADD CONSTRAINT fk_Exercises_Topic_id
FOREIGN KEY (topic_id) REFERENCES Topic(id);

ALTER TABLE Exercises
ADD CONSTRAINT fk_Exercises_Level_id
FOREIGN KEY (level_id) REFERENCES Level(id);

ALTER TABLE Exercises
ADD CONSTRAINT fk_Exercises_User_id
FOREIGN KEY (user_id) REFERENCES Users(id);

-- Fogein Key User Exercise History
ALTER TABLE User_Exercise_History
ADD CONSTRAINT fk_User_Exercise_History_Users_id
FOREIGN KEY (user_ids) REFERENCES Users(id);


-- Fogein Key News
ALTER TABLE News
ADD CONSTRAINT fk_News_Users_id
FOREIGN KEY (user_id) REFERENCES Users(id);

ALTER TABLE Questions
ADD CONSTRAINT fk_Questions_Exercises_id
FOREIGN KEY (question_ids) REFERENCES Exercises(id);

-- Fogein Key Events
-- ALTER TABLE Events
-- ADD CONSTRAINT fk_Events_Users_id
-- FOREIGN KEY (user_id) REFERENCES Users(id);

-- Chèn dữ liệu vào bảng Users


-- Chèn dữ liệu vào bảng Level
INSERT INTO Level (id, name) VALUES
('1', 'Easy'),
('2', 'Medium'),
('3', 'Hard'),
('4', 'Very Easy'),
('5', 'Very Hard'),
('6', 'Intermediate'),
('7', 'Advanced'),
('8', 'Beginner'),
('9', 'Expert'),
('10', 'Master');

-- Chèn dữ liệu vào bảng Topic
INSERT INTO Topic (id, name, parent_id) VALUES
('1', 'Grammar', NULL),
('2', 'Vocabulary', NULL),
('3', 'Reading', NULL),
('4', 'Listening', NULL),
('5', 'Writing', NULL),
('6', 'Speaking', NULL),
('7', 'Idioms', NULL),
('8', 'Phrasal Verbs', NULL),
('9', 'Collocations', NULL),
('10', 'Pronunciation', NULL);

-- Chèn dữ liệu vào bảng News
INSERT INTO News (id, title, content, image, user_id) VALUES
('1', 'News Title 1', 'Content 1', 'image1.jpg', '1'),
('2', 'News Title 2', 'Content 2', 'image2.jpg', '2'),
('3', 'News Title 3', 'Content 3', 'image3.jpg', '3'),
('4', 'News Title 4', 'Content 4', 'image4.jpg', '4'),
('5', 'News Title 5', 'Content 5', 'image5.jpg', '5'),
('6', 'News Title 6', 'Content 6', 'image6.jpg', '6'),
('7', 'News Title 7', 'Content 7', 'image7.jpg', '7'),
('8', 'News Title 8', 'Content 8', 'image8.jpg', '8'),
('9', 'News Title 9', 'Content 9', 'image9.jpg', '9'),
('10', 'News Title 10', 'Content 10', 'image10.jpg', '10');

-- Chèn dữ liệu vào bảng Exercises
