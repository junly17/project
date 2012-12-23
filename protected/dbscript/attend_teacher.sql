select cs.studentId, s.* from tbl_coursestudy cs
join tbl_student s on cs.studentId = s.id
where cs.courseId = 2
and cs.sectionGroup = '500001'
and cs.courseStatus = 'Lecture';

select cs.studentId, a.* from tbl_coursestudy cs
join tbl_attend a on a.coursestudyId = cs.id
where cs.courseId = 2
and cs.sectionGroup = '500001'
and cs.courseStatus = 'Lecture'
and a.day = '2012-12-20';

select sall.studentId, s.*, sattend.timeIn, sattend.timeOut, sattend.week, coalesce(sattend.attendStatus, 'Absent') as attendStatus
from (select cs.studentId from tbl_coursestudy cs
join tbl_student s on cs.studentId = s.id
where cs.courseId = 2
and cs.sectionGroup = '500001'
and cs.courseStatus = 'Lecture') sall
left outer join (select cs.studentId, a.timeIn, a.timeOut, a.week, a.attendStatus
from tbl_coursestudy cs
join tbl_attend a on a.coursestudyId = cs.id
where cs.courseId = 2
and cs.sectionGroup = '500001'
and cs.courseStatus = 'Lecture'
and a.day = '2012-12-20') sattend on sall.studentId = sattend.studentId
join tbl_student s on sall.studentId = s.id