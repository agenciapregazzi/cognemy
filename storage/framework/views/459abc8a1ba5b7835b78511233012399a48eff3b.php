<?php
use App\Http\Controllers\CommonController;
use App\Models\User;
use App\Models\Section;
    $student_details = (new CommonController)->get_student_academic_info($feedback->student_id);
    $parent_details = User::find($student_details->parent_id);
?>
<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('teacher.feedback.update_feedback', ['id' => $feedback->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="fpb-7">
        <label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
        <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSection(this.value)">
            <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($class->id); ?>" <?php echo e($student_details['class_id'] == $class->id ?  'selected':''); ?>><?php echo e($class->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="fpb-7">
        <label for="section_id" class="eForm-label"><?php echo e(get_phrase('Section')); ?></label>
        <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="sectionWiseStudent(this.value)">
            <?php if($student_details['section_id'] != "") {
                $sections = Section::get()->where('class_id', $student_details['class_id']); ?>
                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($section->id); ?>" <?php echo e($student_details['section_id'] == $section->id ?  'selected':''); ?>><?php echo e($section->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php } else { ?>
                <option value=""><?php echo e(get_phrase('First select a class')); ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="fpb-7">
        <label for="student_id" class="eForm-label"><?php echo e(get_phrase('Students')); ?></label>
        <select name="student_id" id="student_id_1" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="studentWiseParent(this.value)">
            <option value="<?php echo e($feedback->student_id); ?>" <?php echo e($feedback->student_id == $student_details->id ?  'selected':''); ?>><?php echo e($student_details->name); ?></option>
        </select>
    </div>

    <div class="fpb-7">
        <label for="parent_id" class="eForm-label"><?php echo e(get_phrase('Parent')); ?></label>
        <select name="parent_id" id="parent_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
            <option value="<?php echo e($feedback->parent_id); ?>" <?php echo e($feedback->parent_id == $parent_details->id ?  'selected':''); ?>><?php echo e($parent_details->name); ?></option>
        </select>
    </div>

    <div class="fpb-7">
        <label for="title" class="eForm-label"><?php echo e(get_phrase('Title')); ?></label>
        <input type="text" class="form-control eForm-control" id="title" value="<?php echo e($feedback->title); ?>" name = "title" required>
    </div>

    <div class="fpb-7">
        <label for="feedback_text" class="eForm-label"><?php echo e(get_phrase('Write Feedback')); ?></label>
        <textarea class="form-control eForm-control" id="feedback_text" name="feedback_text" required><?php echo e($feedback->feedback_text); ?></textarea>
    </div>

    <div class="fpb-7 pt-2">
        <button type="submit" class="btn-form"><?php echo e(get_phrase('Update Feedback')); ?></button>
    </div>
</form>

<script type="text/javascript">
    "use strict";


    function classWiseSection(classId) {
        let url = "<?php echo e(route('class_wise_sections', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id').html(response);
            }
        });
    }

    function sectionWiseStudent(sectionId) {
        let url = "<?php echo e(route('section_wise_students', ['id' => ":sectionId"])); ?>";
        url = url.replace(":sectionId", sectionId);
        $.ajax({
            url: url,
            success: function(response){
                $('#student_id_1').html(response);
            }
        });
    }

    function studentWiseParent(studentId) {
        let url = "<?php echo e(route('student_wise_parent', ['id' => ":studentId"])); ?>";
        url = url.replace(":studentId", studentId);
        $.ajax({
            url: url,
            success: function(response){
                $('#parent_id').html(response);
            }
        });
    }


</script>
<?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/teacher/feedback/edit_feedback.blade.php ENDPATH**/ ?>