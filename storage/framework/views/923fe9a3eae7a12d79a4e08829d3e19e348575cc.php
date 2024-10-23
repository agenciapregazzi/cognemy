

<?php 

use App\Http\Controllers\CommonController;
use App\Models\School;
use App\Models\User;

?>

<div class="row">
    <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(auth()->user()->id == $feedback->parent_id): ?>
    <?php
        $student_details = (new CommonController)->get_student_academic_info($feedback->student_id);
        $parent_details = User::find($student_details->parent_id);

        $admin = User::find($feedback->admin_id);

        if(!empty($admin)){
        $info = json_decode($admin->user_information);
            $user_image = $info->photo;
            if(!empty($info->photo)){
                $user_image = 'uploads/user-images/'.$info->photo;
            }else{
                $user_image = 'uploads/user-images/thumbnail.png';
            }
        }
    ?>
    <div class="col-md-4">
    <div class="eCard eCard-2">
      <div class="eCard-body">
        <div class="d-flex justify-content-between">
          <h5 class="eCard-subtitle"><span><?php echo e(get_phrase('Student')); ?>: </span><?php echo e($student_details->name); ?></h5>
          <h5 class="eCard-subtitle"><span><?php echo e(get_phrase('Parent')); ?>: </span><?php echo e($parent_details->name); ?></h5>
        </div>
        
        <div class="card_subtitle d-flex justify-content-between">
            <?php if(empty($student_details->class_name)): ?>
            <h5 class="eCard-subtitle"><span><?php echo e(get_phrase('Class')); ?>: </span><?php echo e(get_phrase('removed')); ?></h5>
            <h5 class="eCard-subtitle"><span><?php echo e(get_phrase('Section')); ?>: </span><?php echo e(get_phrase('removed')); ?></h5>
        <?php else: ?>
            <h5 class="eCard-subtitle"><span><?php echo e(get_phrase('Class')); ?>: </span><?php echo e($student_details->class_name); ?></h5>
            <h5 class="eCard-subtitle"><span><?php echo e(get_phrase('Section')); ?>: </span><?php echo e($student_details->section_name); ?></h5>
            <?php endif; ?>
        </div>
      </div>
      <div class="eCard-body">
        <h5 class="eCard-title"><?php echo e($feedback->title); ?></h5>
        <p class="eCard-text">
            <?php echo e($feedback->feedback_text); ?>

        </p>
        <div class="eCard-AdminBtn d-flex flex-wrap justify-content-between align-items-center">
          <div class="eCard-Admin d-flex align-items-center">
            <?php if(!empty($admin->name)): ?>
            <img src="<?php echo e(asset('assets')); ?>/<?php echo e($user_image); ?>" alt="" class="eCard-userImg">
            
            <span><?php echo e($admin->name); ?></span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/parent/feedback/feedback_list.blade.php ENDPATH**/ ?>