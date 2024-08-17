-- Display all data from the tables
SELECT * FROM students;
SELECT * FROM subjects;
SELECT * FROM stu_grades;
SELECT * FROM levels;
SELECT * FROM exams;
SELECT * FROM stu_subjects;
SELECT * FROM backup_students;
SELECT * FROM deleted_students;

-- 1. Display the date of exam as the following: day 'month name' year
SELECT DATE_FORMAT(exam_date, '%d %M %Y') AS formatted_date
FROM exams;

-- 2. Display the name of students with the year of birthdate
SELECT sname, YEAR(birth_date) AS birth_year
FROM students;

-- 3. Create a hello world function which takes a username and returns a welcome message to the user using his name
DELIMITER //
CREATE FUNCTION hello_world(newname VARCHAR(30))
RETURNS VARCHAR(100)
BEGIN 
    RETURN CONCAT('Welcome ', newname);
END //
DELIMITER ;

SELECT hello_world('Mohamed');

-- 4. Create a multiply procedure which takes two numbers and returns their product
DELIMITER //
CREATE PROCEDURE multiply(a INT, b INT, OUT result INT)
BEGIN
    SET result = a * b;
END //
DELIMITER ;

CALL multiply(3, 15, @result);
SELECT @result;

-- 5. Create a function which takes student id and exam id and returns the student's score in the exam
DELIMITER //
CREATE FUNCTION get_student_score(stu_id INT, ex_id INT)
RETURNS INT
BEGIN
    DECLARE score INT;
    SELECT grade INTO score
    FROM stu_grades
    WHERE stu_id = get_student_score.stu_id AND exam_id = ex_id;
    RETURN score;
END //
DELIMITER ;

SELECT get_student_score(1, 1);

-- 6. Create a function which takes a subject name and returns the max grade for that subject
DELIMITER //
CREATE FUNCTION max_grade(subject_name VARCHAR(30))
RETURNS INT
BEGIN 
    DECLARE max_grade INT;
    SELECT MAX(grade) INTO max_grade
    FROM stu_grades
    JOIN subjects ON stu_grades.sub_id = subjects.sj_id
    WHERE subjects.sj_name = subject_name;
    RETURN max_grade;
END //
DELIMITER ;

SELECT max_grade('Math');

-- 7. Create a table called deleted_students which will hold the deleted students’ info (same columns as in students table)
CREATE TABLE deleted_students (
    sid SMALLINT PRIMARY KEY,
    sname VARCHAR(25) NOT NULL,
    email VARCHAR(35),
    phone VARCHAR(15) NOT NULL,
    levelid SMALLINT,
    birth_date DATE,
    gender ENUM('Male', 'Female')
);

-- 8. Create a trigger to save the deleted student from students table to deleted_students
DELIMITER //
CREATE TRIGGER deleted_student_tr
BEFORE DELETE ON students
FOR EACH ROW
BEGIN
    INSERT INTO deleted_students (sid, sname, email, phone, levelid, birth_date, gender)
    VALUES (OLD.sid, OLD.sname, OLD.email, OLD.phone, OLD.levelid, OLD.birth_date, OLD.gender);
END //
DELIMITER ;

-- 9. Create a table to hold backup of newly added students
CREATE TABLE backup_students AS SELECT * FROM students WHERE 1=0;

-- 10. Create a trigger to save the newly added students to students table to backup_students
DELIMITER //
CREATE TRIGGER save_emp_data_tr
AFTER INSERT ON students 
FOR EACH ROW 
BEGIN
    INSERT INTO backup_students (sid, sname, email, phone, levelid, birth_date, gender)
    VALUES (NEW.sid, NEW.sname, NEW.email, NEW.phone, NEW.levelid, NEW.birth_date, NEW.gender);
END //
DELIMITER ;
