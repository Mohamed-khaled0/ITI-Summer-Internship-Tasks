-- Lab 1

-- 1. Install MySQL DBMS
-- Follow the instructions specific to your operating system to install MySQL.

-- 2. Create tables with their columns

-- Creating the `levels` table
CREATE TABLE levels (
    levelid SMALLINT PRIMARY KEY,
    levelname VARCHAR(25) NOT NULL
);

-- Creating the `subjects` table
CREATE TABLE subjects (
    sj_id SMALLINT PRIMARY KEY,
    sj_name VARCHAR(25) NOT NULL,
    sub_desc VARCHAR(35),
    max_score TINYINT
);

-- Creating the `exams` table
CREATE TABLE exams (
    ex_id SMALLINT PRIMARY KEY,
    exam_date DATE
);

-- Creating the `students` table
CREATE TABLE students (
    sid SMALLINT PRIMARY KEY,
    sname VARCHAR(25) NOT NULL,
    email VARCHAR(35),
    phone VARCHAR(15) NOT NULL,
    levelid SMALLINT,
    birth_date DATE, -- Added birth_date column
    gender ENUM('Male', 'Female'), -- Added gender column
    FOREIGN KEY (levelid) REFERENCES levels(levelid) ON DELETE CASCADE
);

-- Creating the `stu_subjects` table
CREATE TABLE stu_subjects (
    stu_id SMALLINT,
    sub_id SMALLINT,
    PRIMARY KEY (stu_id, sub_id),
    FOREIGN KEY (stu_id) REFERENCES students(sid) ON DELETE CASCADE,
    FOREIGN KEY (sub_id) REFERENCES subjects(sj_id) ON DELETE CASCADE
);

-- Creating the `stu_grades` table
CREATE TABLE stu_grades (
    stu_id SMALLINT,
    sub_id SMALLINT,
    exam_id SMALLINT,
    grade SMALLINT,
    PRIMARY KEY (stu_id, sub_id, exam_id),
    FOREIGN KEY (stu_id) REFERENCES students(sid) ON DELETE CASCADE,
    FOREIGN KEY (sub_id) REFERENCES subjects(sj_id) ON DELETE CASCADE,
    FOREIGN KEY (exam_id) REFERENCES exams(ex_id) ON DELETE CASCADE
);

-- 3. Insert data into `students` table
INSERT INTO students (sid, sname, gender, email, phone, birth_date)
VALUES
    (4, 'ABDO', 'Male', 'abdo@gmail.com', '654321', '1900-05-23'),
    (5, 'Sara', 'Female', 'sara@gmail.com', '654321', '1900-02-23');

-- 4. Display students’ names that begin with 'A'
SELECT sname
FROM students
WHERE sname LIKE 'A%';

-- 5. Display male students who are born before '1991-10-01'
SELECT sname, birth_date
FROM students
WHERE gender = 'Male' AND birth_date < '1991-10-01';
