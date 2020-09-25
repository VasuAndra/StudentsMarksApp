$(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("[name='courses_select']").change(function(){
        jQuery.ajax({
            url: $(this).data('route'),
            method: 'get',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
               id: $(this).val(),
            },
            success: function(result) {
                // $('table#marks tbody tr:first-child td:nth-child(2)').html(result.marks.exam);
                $('#course_exam').html(result.marks.exam);
                $('#seminar_exam').html(result.marks.test);
                $('#lab_exam').html(result.marks.colloquy);
                $('#course_homework').html(result.marks.course_homework);
                $('#seminar_homework').html(result.marks.seminar_homework);
                $('#lab_homework').html(result.marks.lab_homework);
                $('#course_activity').html(result.marks.course_activity);
                $('#seminar_activity').html(result.marks.seminar_activity);
                $('#lab_activity').html(result.marks.lab_activity);
                $('#course_presence').html(result.marks.course_presence);
                $('#seminar_presence').html(result.marks.seminar_presence);
                $('#lab_presence').html(result.marks.lab_presence);

                $('#course_exam_notation').html(result.notationMethod.exam);
                $('#seminar_exam_notation').html(result.notationMethod.test);
                $('#lab_exam_notation').html(result.notationMethod.colloquy);
                $('#course_homework_notation').html(result.notationMethod.course_homework);
                $('#seminar_homework_notation').html(result.notationMethod.seminar_homework);
                $('#lab_homework_notation').html(result.notationMethod.lab_homework);
                $('#course_activity_notation').html(result.notationMethod.course_activity);
                $('#seminar_activity_notation').html(result.notationMethod.seminar_activity);
                $('#lab_activity_notation').html(result.notationMethod.lab_activity);
                $('#course_presence_notation').html(result.notationMethod.course_presence);
                $('#seminar_presence_notation').html(result.notationMethod.seminar_presence);
                $('#lab_presence_notation').html(result.notationMethod.lab_presence);
                
            }
          });      
    });
  });