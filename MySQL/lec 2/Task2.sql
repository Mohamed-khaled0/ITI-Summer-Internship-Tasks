
-- Insert data into the subjects table
INSERT INTO subjects (sj_id, sj_name, max_score)
VALUES 
    (1, 'Physics', 80),
    (2, 'Math', 62),
    (3, 'Arabic', 75);

-- 1. Display the subject with the highest max score
SELECT sj_name, max_score
FROM subjects
ORDER BY max_score DESC
LIMIT 1;

-- 2. Write a query to display students’ names with their subject names which they will study
SELECT sname, sj_name
FROM students s
INNER JOIN stu_subjects ON s.sid = stu_subjects.stu_id
INNER JOIN subjects ON stu_subjects.sub_id = subjects.sj_id;

-- 3. Write a query to display students’ names, their score and subject name
SELECT sname, sj_name, max_score AS score
FROM students
INNER JOIN stu_subjects ON students.sid = stu_subjects.stu_id
INNER JOIN subjects ON stu_subjects.sub_id = subjects.sj_id;

-- 4. Display the IDs of students who did not take any exam (using a left join)
SELECT sid
FROM students
LEFT JOIN stu_grades ON students.sid = stu_grades.stu_id
WHERE stu_id IS NULL;

-- 4. Display the IDs of students who did not take any exam (using a subquery)
SELECT sid
FROM students
WHERE sid NOT IN (SELECT stu_id FROM stu_grades);

-- 5. Delete students whose score is lower than 50 in any subject
SET SQL_SAFE_UPDATES = 0;

DELETE FROM students
WHERE sid IN (
    SELECT stu_id
    FROM stu_grades
    WHERE grade < 50
);
