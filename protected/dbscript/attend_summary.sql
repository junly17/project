select s.studentCode, s.studentName, s.studentLastname, c.courseCode, c.courseName, cstudy.sectionGroup, cstudy.courseStatus, a.studentId, a.attendStatus, a.timeIn, a.timeOut, a.day
from tbl_coursestudy cstudy
join tbl_course c on cstudy.courseId = c.id
join tbl_attend a on c.id = a.courseId
join tbl_student s on a.studentId = s.id
where c.id = 2
and cstudy.sectionGroup = '500001'
and cstudy.courseStatus = 'Lecture'
and a.day = '2012-12-19'
and a.sectionGroup = cstudy.sectionGroup
and cstudy.studentId = a.studentId;