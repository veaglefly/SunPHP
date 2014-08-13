<div class="main_main_main">
	<div class="">
		<h1>问卷查看</h1>
	</div>
	<div class=""><br><br>
		<b style="color:#006699">编&nbsp;&nbsp;&nbsp;&nbsp;号：</b><?php echo $data['qn']['id']?><br><br>
		<b>IP地址：</b><?php echo $data['qn']['ip']?><br><br>
		<b>时&nbsp;&nbsp;&nbsp;&nbsp;间：</b><?php echo $data['qn']['datetime']?><br><br>
		<b>总评价：</b>
		<?php
			switch ($data['qn']['zongping']) {
				case 1:
					echo "好";
					break;
				case 2:
					echo "较好";
					break;
				case 3:
					echo "一般";
					break;
				case 4:
					echo "差";
					break;
			}
		?><br><br>
		<b>领导四风表现及建议：</b><br><br>
		<?php echo declean($data['qn']['sifeng'])?>
		<br>
		<b>师生利益的问题或困难：</b><br><br>
		<?php echo declean($data['qn']['liyi'])?>
		<br>
		<b>学院发展的建议：</b><br><br>
		<?php echo declean($data['qn']['fazhan'])?>
		<br>
	</div>
</div>