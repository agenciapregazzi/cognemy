<div class="notice-edit-portion">
	<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="">
	    <?php echo csrf_field(); ?> 
	    <div class="form-row">

	    	<div class="fpb-7">
	            <label for="notice_title" class="eForm-label"><?php echo e(get_phrase('Notice title')); ?></label>
	            <input type="text" class="form-control eForm-control" id="notice_title" name = "notice_title" placeholder="Provide title name" value="<?php echo e($notice['notice_title']); ?>" disabled required>
	        </div>

            <div class="fpb-7">
	            <label for="start_date" class="eForm-label"><?php echo e(get_phrase('Start date')); ?></label>
	            <input type="text" class="form-control eForm-control inputDate" id="start_date" name = "start_date" value="<?php echo e(date('m/d/Y', strtotime($notice['start_date']))); ?>" disabled required>
	        </div>


			<div class="fpb-7">
		        <input type="checkbox" name="time_details" id="time_details" value="1" onclick="toggleTimeFields(this.id)" disabled>
		        <label for="time_details"><?php echo e(get_phrase('Setup additional date & time')); ?>?</label>
		    </div>

		    <div class="time-details-stuffs">

		    	<div class="fpb-7">
		            <label for="start_time" class="eForm-label"><?php echo e(get_phrase('Start time')); ?><span class="required"></span></label>
		            <input type="time" class="form-control eForm-control" id="start_time" name="start_time" value="<?php echo e($notice['start_time']); ?>" disabled>
		        </div>

		        <div class="fpb-7">
		            <label for="end_date" class="eForm-label"><?php echo e(get_phrase('End date')); ?><span class="required"></span></label>
		            <input type="text" class="form-control eForm-control inputDate" id="end_date" name="end_date" value="<?php echo e(date('m/d/Y', strtotime($notice['end_date']))); ?>" disabled>
		        </div>

		        <div class="fpb-7">
		            <label for="end_time" class="eForm-label"><?php echo e(get_phrase('End time')); ?><span class="required"></span></label>
		            <input type="time" class="form-control eForm-control" id="end_time" name="end_time" value="<?php echo e($notice['end_time']); ?>" disabled>
		        </div>
			</div>

			<div class="fpb-7">
				<label for="notice" class="eForm-label"><?php echo e(get_phrase('Notice')); ?></label>
				<textarea name="notice" class="form-control eForm-control" rows="8" cols="80" placeholder="Provide notice details" disabled required><?php echo e($notice['notice']); ?></textarea>
			</div>

		</div>
	</form>
</div>

<script type="text/javascript">

  "use strict";


	function toggleTimeFields(elem) {
		if($("#"+elem).is(':checked')){
	  		$('.time-details-stuffs').slideUp();
		} else {
			$('.time-details-stuffs').slideDown();
		}
	}

	$(function () {
      $('.inputDate').daterangepicker(
        {
          singleDatePicker: true,
          showDropdowns: true,
          minYear: 1901,
          maxYear: parseInt(moment().format("YYYY"), 10),
        },
        function (start, end, label) {
          var years = moment().diff(start, "years");
        }
      );
    });

</script><?php /**PATH D:\xampp\htdocs\ekattor8_2.1\Ekattor8\resources\views/student/noticeboard/edit.blade.php ENDPATH**/ ?>