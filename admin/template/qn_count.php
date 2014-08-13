<div class="main_main_main">
	<div class="">
		<h1>数据统计</h1>
	</div>
	<div id="" class=""><br><br>
		总问卷数：<?php echo $data['countnum'];?> 份<br><br>
		总评（好）：<?php echo $data['ping1'];?> 个<br><br>
		总评（较好）：<?php echo $data['ping2'];?> 个<br><br>
		总评（一般）：<?php echo $data['ping3'];?> 个<br><br>
		总评（差）：<?php echo $data['ping4'];?> 个<br><br>
		四风建议：<a href="<?php echo SITE_PATH.ENTER;?>/questionnaire/viewcount/sifeng"><?php echo $data['sifeng'];?></a> 条<br><br>
		利益建议：<a href="<?php echo SITE_PATH.ENTER;?>/questionnaire/viewcount/liyi"><?php echo $data['liyi'];?></a> 条<br><br>
		发展建议：<a href="<?php echo SITE_PATH.ENTER;?>/questionnaire/viewcount/fazhan"><?php echo $data['fazhan'];?></a> 条
	</div>
</div>