<div class="main_main_main">
	<div class="">
		<h1><?php echo $data['title'];?>建议汇总</h1>
	</div><br><br>
	<div class="countview">
		<?php foreach($data['qns'] as $qn){ ?>
		<div class="countview_item">
			<div class="countview_item_left left">
				<div class="countview_item_left_num">
					<?php echo $qn['id'];?>
				</div>
			</div>
			<div class="left">
				<?php
					if($data['type'] == 1)
						echo declean($qn['sifeng']);
					else if ($data['type'] == 2)
						echo declean($qn['liyi']);
					else if ($data['type'] == 3)
						echo declean($qn['fazhan']);
				?>
			</div>
			<div class="cb"></div>
		</div>
		<?php } ?>
	</div><br />
	<?php echo $data['showpage'];?>
</div>