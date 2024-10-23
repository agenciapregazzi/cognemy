
   
<?php $__env->startSection('content'); ?>
<?php
    $menu_permission = json_decode($user->menu_permission);

    $info = json_decode($user->user_information);
    $user_image = $info->photo;
    if(!empty($info->photo)){
        $user_image = 'uploads/user-images/'.$info->photo;
    }else{
        $user_image = 'uploads/user-images/thumbnail.png';
    }

                    
?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4><?php echo e(get_phrase('Navigation Menu Settings')); ?></h4>
                <div class="export-btn-area">
                    <a href="<?php echo e(route('admin.admin')); ?>" class="export_btn"><?php echo e(get_phrase('Back')); ?></a>
                  </div>
            </div>
            
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-7">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">
                    <div class="col-6">
                        <div class="userImG d-flex justify-content-center mt-4">
                            <img width="40%" height="100px" src="<?php echo e(asset('assets')); ?>/<?php echo e($user_image); ?>" alt="" />
                        </div>
                        
                        <h4 class="mt-3 text-center"><?php echo e($user->name); ?></h4>
                        <p  class="text-center"><?php echo e($user->email); ?></p>
                        
                    </div>
                    <div class="col-6">
                        <div class="eForm-layouts">
                        
                            
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.admin.menu_permission_update', ['id' => $user->id])); ?>">
                                <?php echo csrf_field(); ?> 
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="user" name="user" value="user" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->user == 'user'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                     />
                                    <label class="form-check-label" for="user"><?php echo e(get_phrase('User')); ?></label>
                                </div>
                                
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="admission" name="admission" value="admission" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->admission == 'admission'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="admission"><?php echo e(get_phrase('Admission')); ?></label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="examination" name="examination" value="examination" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->examination == 'examination'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="examination"><?php echo e(get_phrase('Examination')); ?></label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="academic" name="academic" value="academic" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->academic == 'academic'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="academic"><?php echo e(get_phrase('Academic')); ?></label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="accounting" name="accounting" value="accounting" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->accounting == 'accounting'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="accounting"><?php echo e(get_phrase('Accounting')); ?></label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="backOffice" type="checkbox" role="switch" id="backOffice" value="backOffice" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->backOffice == 'backOffice'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="backOffice"><?php echo e(get_phrase('Back Office')); ?></label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="settings" name="settings" value="settings" 
                                    <?php if(!empty($menu_permission)): ?> 
                                        <?php if($menu_permission->settings == 'settings'): ?>
                                        checked 
                                        <?php endif; ?>
                                    <?php else: ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="settings"><?php echo e(get_phrase('Settings')); ?></label>
                                </div>
                                <div class="fpb-7 pt-2">
                                    <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/admin/admin/menu_permission.blade.php ENDPATH**/ ?>