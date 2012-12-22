-- active semester
select * from tbl_semester where active = 1;
-- all courses in active semester
select * from tbl_course c
join tbl_semester s on c.semesterId = s.id
where s.active = 1;
-- course info of all courses in active semester
select cinfo.* from tbl_courseinfo cinfo
join tbl_course c on cinfo.courseId = c.id
join tbl_semester s on c.semesterId = s.id
where s.active = 1;
-- course info of all courses in active semester of selected teacher
select cinfo.* from tbl_teacher t
join tbl_courseinfo cinfo on cinfo.teacherId = t.id
join tbl_course c on cinfo.courseId = c.id
join tbl_semester s on c.semesterId = s.id
where s.active = 1
and t.id = 2;

-- course info of all courses in active semester of selected teacher user
select cinfo.* from tbl_user u
join tbl_teacher t on u.id = t.userId
join tbl_courseinfo cinfo on cinfo.teacherId = t.id
join tbl_course c on cinfo.courseId = c.id
join tbl_semester s on c.semesterId = s.id
where s.active = 1
and u.id = 9;
-- course info of all courses in selected semester of selected teacher user
select cinfo.* from tbl_user u
join tbl_teacher t on u.id = t.userId
join tbl_courseinfo cinfo on cinfo.teacherId = t.id
join tbl_course c on cinfo.courseId = c.id
join tbl_semester s on c.semesterId = s.id
where s.id = 1
and u.id = 9;
