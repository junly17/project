select (attend_all.attend - coalesce(attend_absent.absent, 0)) >= rule.condition/100*course.total as qualified
from 
	(select a.studentId , count(a.id) as attend, cs.courseId, cs.courseStatus
	from tbl_coursestudy cs
	join tbl_attend a on a.courseStudyId = cs.id
	where cs.courseId = 2
	and cs.courseStatus = 'Lecture'
	and cs.sectionGroup = '500001'
	and a.studentId = 5) attend_all
join
	(select count(distinct a.day) as total
	from tbl_attend a 
	where a.courseId = 2
	and a.courseStatus = 'Lecture'
	and a.sectionGroup = '500001') course
join 
	(select a.studentId , count(a.id) as absent
	from tbl_coursestudy cs
	join tbl_attend a on a.courseStudyId = cs.id
	where cs.courseId = 2
	and cs.courseStatus = 'Lecture'
	and cs.sectionGroup = '500001'
	and a.attendStatus = 'Absent'
	and a.studentId = 5) attend_absent
join tbl_courserule rule 
	on attend_all.courseId = rule.courseId and attend_all.courseStatus = rule.courseStatus