
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4><?php echo e(get_phrase('School Settings')); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">

                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.school.update')); ?>">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="school_name" class="eForm-label"><?php echo e(get_phrase('School Name')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($school_details->title); ?>" id="school_name" name = "school_name" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="phone" class="eForm-label"><?php echo e(get_phrase('School Phone')); ?></label>
                                    <input type="number" class="form-control eForm-control" value="<?php echo e($school_details->phone); ?>" id="phone" name = "phone" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="address" class="eForm-label"><?php echo e(get_phrase('Address')); ?></label>
                                    <textarea class="form-control eForm-control" id="address" name="address" rows="4" required="" spellcheck="false"><?php echo e($school_details->address); ?></textarea>
                                </div>

                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('School information')); ?></label>
                                    <textarea class="form-control eForm-control" id="school_info" name="school_info" rows="4" required="" spellcheck="false"><?php echo e($school_details->school_info); ?></textarea>
                                </div>

                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('Email receipt title')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($school_details->email_title); ?>" id="email_title" name = "email_title" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('Email Details')); ?></label>
                                    <textarea class="form-control eForm-control" id="email_details" name="email_details" rows="4"  maxlength="100" ><?php echo e($school_details->email_details); ?></textarea>

                                    <small><?php echo get_phrase('Remaining characters is'); ?> <strong id="remaining_character">100</strong> </small>
                                  </div>

                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('Warning Text')); ?></label>
                                    <textarea class="form-control eForm-control" id="warning_text" name="warning_text" rows="3"  maxlength="60" ><?php echo e($school_details->warning_text); ?></textarea>

                                    <small><?php echo get_phrase('Remaining characters is'); ?> <strong id="remaining_character_warning">60</strong> </small>
                                </div>
                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('Social Link 1')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($school_details->socialLink1); ?>" id="socialLink1" name = "socialLink1" placeholder="https://">
                                </div>
                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('Social Link 2')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($school_details->socialLink2); ?>" id="socialLink2" name = "socialLink2" placeholder="https://">
                                </div>
                                <div class="fpb-7">
                                    <label for="school_info" class="eForm-label"><?php echo e(get_phrase('Social Link 3')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($school_details->socialLink3); ?>" placeholder="https://" id="socialLink3" name = "socialLink3">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4 text-center ">
                                        <label class="eForm-label" for="school_logo"><?php echo e(get_phrase('school Logo')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(asset('assets/uploads/school_logo/'.DB::table('schools')->where('id', auth()->user()->school_id)->value('school_logo') )); ?>" class="mx-4 my-5" width="80px" height="80px"
                                                alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" type="file" id="school_logo" name="school_logoo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <label class="eForm-label" for="socialLogo2"><?php echo e(get_phrase('Social Logo-1')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(asset('assets/uploads/school_logo/'.DB::table('schools')->where('id', auth()->user()->school_id)->value('socialLogo1') )); ?>" class="mx-4 my-5" width="80px" height="80px"
                                                alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" type="file" id="socialLogo1" name="socialLogo1" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <label class="eForm-label" for="socialLogo2"><?php echo e(get_phrase('Social Logo-2')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(asset('assets/uploads/school_logo/'.DB::table('schools')->where('id', auth()->user()->school_id)->value('socialLogo2') )); ?>" class="mx-4 my-5" width="80px" height="80px"
                                                alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" type="file" id="socialLogo2" name="socialLogo2" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <label class="eForm-label" for="socialLogo3"><?php echo e(get_phrase('Social Logo-3')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(asset('assets/uploads/school_logo/'.DB::table('schools')->where('id', auth()->user()->school_id)->value('socialLogo3') )); ?>" class="mx-4 my-5" width="80px" height="80px"
                                                alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" type="file" id="socialLogo3" name="socialLogo3" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4 text-center">
                                        <label class="eForm-label" for="email_logo"><?php echo e(get_phrase('Email template Logo')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(asset('assets/uploads/school_logo/'.DB::table('schools')->where('id', auth()->user()->school_id)->value('email_logo') )); ?>" class="mx-4 my-5" width="80px" height="80px"
                                                alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" type="file" id="email_logo" name="email_logo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form"><?php echo e(get_phrase('Update settings')); ?></button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3"><?php echo get_phrase('instruction'); ?></h4>
              <div class="row mt-2">
                <div class="col-md-12">
                  <div class="alert alert-success" role="alert">
                    <small><?php echo e(get_phrase("Images for email templates will only support if the application is hosted on a live server. Localhost will not support this.")); ?></small>
                  </div>
                </div>
              </div>
            </div>
        </div>   
    </div>
</div>

<script>
  $('#email_details').bind('input propertychange', function() {
            var currentLength = $('#email_details').val().length;
            var remaining_character = 100 - currentLength;
            $('#remaining_character').text(remaining_character);
            copyTheMessageToForm();
          });  
  $('#warning_text').bind('input propertychange', function() {
            var currentLength = $('#warning_text').val().length;
            var remaining_character = 60 - currentLength;
            $('#remaining_character_warning').text(remaining_character);
            copyTheMessageToForm();
          });  
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/admin/settings/school_settings.blade.php ENDPATH**/ ?>