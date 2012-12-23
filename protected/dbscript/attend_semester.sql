select attend_all.studentId,
s.studentCode, s.studentName, s.studentLastname,
(attend_all.attend - coalesce(attend_late.late, 0)) as attend,
coalesce(attend_late.late, 0) as late,
attend_all.attend as total,
(course.total - attend_all.attend) as absent,
course.total as course_total,
attend_all.attend >= rule.condition/100*course.total as cond
from (select a.studentId , count(a.id) as attend, cs.courseId, cs.courseStatus
from tbl_coursestudy cs
join tbl_attend a on a.courseStudyId = cs.id
where cs.courseId = 2
and cs.courseStatus = 'Lecture'
and cs.sectionGroup = '500001'
group by a.studentId) attend_all
left outer join 
(select a.studentId , count(a.id) as late
from tbl_coursestudy cs
join tbl_attend a on a.courseStudyId = cs.id
where cs.courseId = 2
and cs.courseStatus = 'Lecture'
and cs.sectionGroup = '500001'
and a.attendStatus = 'Late'
group by a.studentId) attend_late
on attend_all.studentId = attend_late.studentId
join
(select count(distinct a.day) as total
from tbl_attend a 
where a.courseId = 2
and a.courseStatus = 'Lecture'
and a.sectionGroup = '500001') course
join tbl_courserule rule 
on attend_all.courseId = rule.courseId and attend_all.courseStatus = rule.courseStatus
join tbl_student s on attend_all.studentId = s.id;