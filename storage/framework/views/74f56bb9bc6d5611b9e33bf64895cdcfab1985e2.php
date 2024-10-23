<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.feedback.upload_feedback')); ?>">
    <?php echo csrf_field(); ?> 
    <div class="fpb-7">
        <label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
        <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSection(this.value)">
            <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="fpb-7">
        <label for="section_id" class="eForm-label"><?php echo e(get_phrase('Section')); ?></label>
        <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="sectionWiseStudent(this.value)" >
            <option value=""><?php echo e(get_phrase('Select section')); ?></option>
        </select>
    </div>

    <div class="fpb-7">
        <label for="student_id[]" class="eForm-label"><?php echo e(get_phrase('Students')); ?></label>
        <select name="student_id[]" id="student_id_1" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="studentWiseParent(this.value)">
            <option value=""><?php echo e(get_phrase('Select Students')); ?></option>
        </select>
    </div>

    <div class="fpb-7">
        <label for="parent_id[]" class="eForm-label"><?php echo e(get_phrase('Parent')); ?></label>
        <select name="parent_id[]" id="parent_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
            <option value=""><?php echo e(get_phrase('Select Parent')); ?></option>
        </select>
    </div>

    <div class="fpb-7">
        <label for="title" class="eForm-label"><?php echo e(get_phrase('Title')); ?></label>
        <input type="text" class="form-control eForm-control" id="title" name = "title" required>
    </div>

    <div class="fpb-7">
        <label for="feedback_text" class="eForm-label"><?php echo e(get_phrase('Write Feedback')); ?></label>
        <textarea class="form-control eForm-control" id="feedback_text" name = "feedback_text" required></textarea>
    </div>

    <div class="fpb-7 pt-2">
        <button type="submit" class="btn-form"><?php echo e(get_phrase('Send Feedback')); ?></button>
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
<?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/admin/feedback/create_feedback.blade.php ENDPATH**/ ?>