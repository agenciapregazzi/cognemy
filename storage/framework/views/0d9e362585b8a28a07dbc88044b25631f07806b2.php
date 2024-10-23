<div class="row">
  <div class="col-12">
      <div class="school_name">
          <h2 class="text-center"><?php echo e(DB::table('schools')->where('id', $data_id)->value('title')); ?></h2>
      </div>
  </div>
</div>
<div class="mainSection-title">
  <div class="row">
    <div class="col-12">
      <div class="eSection-wrap pb-2">
        <div class="table-responsive">
          <table class="table eTable eTable-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"><?php echo e(get_phrase('Name')); ?></th>
                <th scope="col"><?php echo e(get_phrase('Email')); ?></th>
                <th scope="col"><?php echo e(get_phrase('User Info')); ?></th>
                <th scope="col"><?php echo e(get_phrase('Password')); ?></th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $info = json_decode($admin->user_information);
                    $user_image = $info->photo;
                    if(!empty($info->photo)){
                        $user_image = 'uploads/user-images/'.$info->photo;
                    }else{
                        $user_image = 'uploads/user-images/thumbnail.png';
                    }
      
                ?>
                  <tr>
                    <th scope="row">
                      <p class="row-number"><?php echo e($key+1); ?></p>
                    </th>
                    <td>
                      <div
                        class="dAdmin_profile d-flex align-items-center min-w-200px"
                      >
                        <div class="dAdmin_profile_img">
                          <img
                            class="img-fluid"
                            width="50"
                            height="50"
                            src="<?php echo e(asset('assets')); ?>/<?php echo e($user_image); ?>"
                          />
                        </div>
                        <div class="dAdmin_profile_name">
                          <h4><?php echo e($admin->name); ?></h4>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="dAdmin_info_name min-w-100px">
                        <p><?php echo e($admin->email); ?></p>
                      </div>
                    </td>
                    <td>
                      <div class="dAdmin_info_name min-w-200px">
                        <p><span><?php echo e(get_phrase('Phone')); ?>:</span> <?php echo e($info->phone); ?></p>
                        <p>
                          <span><?php echo e(get_phrase('Address')); ?>:</span> <?php echo e($info->address); ?>

                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="dAdmin_info_name min-w-250px">
                        <form action="<?php echo e(route('superadmin.admin_list')); ?>" method="post">
                          <?php echo csrf_field(); ?>
                          <div class="fpb-7">
                              <input type="text" class="form-control eForm-control" name="password" id="password<?php echo e($admin->id); ?>">
                              <input type="hidden" name="user_id" value="<?php echo e($admin->id); ?>">
                            </div>
    
                            <div class="generatePass d-flex">
                              <div class="pt-2">
                                  <button type="button"
                                class="btn-form" style="width: 127px;"
                                aria-expanded="false" onclick="generatePassword('<?php echo e($admin->id); ?>')">Generate Password</button>
                              </div>
                              <div class="ms-3 pt-2">
                                <button type="submit" class="btn-form float-end"><?php echo e(get_phrase('Submit')); ?></button>
                              </div>
                            </div> 
                        </form>                   
                      </div>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          </div>
        </div> 
      </div>
    </div>
  </div>
  
</div>
<script>
  function generatePassword(id) {
    var length = 12;
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
    var password = "";
    for (var i = 0; i < length; ++i) {
      var randomNumber = Math.floor(Math.random() * charset.length);
      password += charset[randomNumber];
    }
    document.getElementById("password"+id).value = password;
  }
</script>

<?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/superadmin/school/admin_list.blade.php ENDPATH**/ ?>