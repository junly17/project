select distinct a.day, sattend.studentCode,
coalesce(sattend.timeIn,0) as 'timeIn',
coalesce(sattend.timeOut,0) as 'timeOut',
coalesce(sattend.attendStatus, 'Absent') as 'attendStatus'
from tbl_attend a
left outer join (
	select a.day, s.studentCode, a.timeIn, a.timeOut,a.attendStatus
	from tbl_attend a
	join tbl_student s on a.studentId = s.id
	where s.id = 8
) sattend on sattend.day = a.day
where a.courseId = 2
and a.courseStatus = 'Lecture'
and a.sectionGroup = '500001';
