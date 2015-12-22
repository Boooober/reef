<h3>Reserve</h3>
<form id="reserve-form" action="">
	<div class="input-row">
		<input class="form-input" name="fcount" type="text" placeholder="<?php echo mb_strtoupper(pll__('Number of persons')); ?>"/>
		<lable for="count" class="lable"><?php echo pll__('Number of persons'); ?></lable>
	</div>
	<div class="input-row">
		<input class="form-input" name="fname" type="text" placeholder="<?php echo mb_strtoupper(pll__('Full name')); ?>"/>
		<lable for="name" class="lable"><?php echo pll__('Full name'); ?></lable>
	</div>
	<div class="input-row">
		<input class="form-input" name="fphone" type="text" placeholder="<?php echo mb_strtoupper(pll__('Phone')); ?>"/>
		<lable for="phone" class="lable"><?php echo pll__('Phone'); ?></lable>
	</div>
	<div class="input-row">
		<input class="form-input" name="femail" type="text" placeholder="<?php echo mb_strtoupper(pll__('Email')); ?>"/>
		<lable for="email" class="lable"><?php echo pll__('Email'); ?></lable>
	</div>

	<button class="form-submit"><?php pll_e('Send'); ?></button>

</form>