<?php
/*
Template Name: Count down
*/
?>
<?php get_header(); ?>

<div class="countdown">
<?php 
	$enddatetime = '2015-11-28 23:59:59';
?>
	<?php if($enddatetime){ ?>
	<?php 
		$timestemp_left = strtotime($enddatetime) - strtotime(date('Y-m-d H:i:s'));
		$day_left = floor($timestemp_left / (24 * 60 * 60));
		$hours_left = floor(($timestemp_left - ($day_left * 60 * 60 * 24)) / (60 * 60));
		$mins_left = floor(($timestemp_left - ($day_left * 60 * 60 * 24) - ($hours_left * 60 * 60)) / 60);
		$secs_left = floor($timestemp_left - ($day_left * 60 * 60 * 24) - ($hours_left * 60 * 60) - ($mins_left * 60));
	?>
		<div class="datetime_wrapper">
			<div class="day_left">
				<span class="day_number"><?php echo $day_left; ?></span>
				<span class="unit">Day<span>s</span></span>
				<span class="text_dd">:</span>
			</div>
			<div class="hours_left">
				<span class="hours_number"><?php echo $hours_left; ?></span>
				<span class="unit">Hour<span>s</span></span>
				<span class="text_hh">:</span>
			</div>
			<div class="minutes_left">
				<span class="minutes_number"><?php echo $mins_left; ?></span>
				<span class="unit">Minute<span>s</span></span>
				<span class="text_mm">:</span>
			</div>
			<div class="second_left">
				<span class="second_number"><?php echo $secs_left; ?></span>
				<span class="unit">Second<span>s</span></span>
			</div>
		</div>
	<?php } ?>

</div>
<script type="text/javascript">
	<?php if($enddatetime){ ?>
		jQuery(function($){
			alert("33333");
			window.setInterval(function(){
				var days = parseInt($('span.day_number').html());
				var hours = parseInt($('span.hours_number').html());
				var mins = parseInt($('span.minutes_number').html());
				var secs = parseInt($('span.second_number').html());
				if(days > 0 && hours >= 0 && mins >= 0 && secs >= 0){
					if(secs == 0){
						secs = 59;
						if(mins == 0){
							mins = 59;
							if(hours == 0){
								hours = 23;
								if(days = 0){
									hours = 0;
									mins = 0;
									secs = 0;
								}else{
									days = days - 1;
								}
							}else{
								hours = hours - 1;
							}
						}else{
							mins = mins - 1;
						}
					}else{
						secs = secs - 1;
					}
					if(days <= 1){$('.day_left .unit span').hide();}else{$('.day_left .unit span').show();}
					if(hours <= 1){$('.hours_left .unit span').hide();}else{$('.hours_left .unit span').show();}
					if(mins <= 1){$('.minutes_left .unit span').hide();}else{$('.minutes_left .unit span').show();}
					if(secs <= 1){$('.second_left .unit span').hide();}else{$('.second_left .unit span').show();}
					$('span.day_number').html(days);
					$('span.hours_number').html(hours);
					$('span.minutes_number').html(mins);
					$('span.second_number').html(secs);
				}
			}, 1000);
		});
	<?php } ?>
</script>
<?php get_footer(); ?>