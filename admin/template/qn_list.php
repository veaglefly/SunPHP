<div class="main_main_main">
	<div class="">
		<h1>问卷列表</h1>
	</div>
	<div id="" class="">
	<table>
		<tr>
			<td width="20">ID</td>
			<td width="50">评价</td>
			<td width="150">领导四风表现及建议</td>
			<td width="150">师生利益的问题或困难</td>
			<td width="150">学院发展的建议</td>
			<td width="120">IP</td>
			<td width="150">提交时间</td>
			<td width="120">操作</td>
		</tr>
		<?php foreach($data['qns'] as $qn){ ?>
		<tr>
			<td><?php echo $qn['id'];?></td>
			<td>
				<?php
					switch ($qn['zongping']) {
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
				?>
			</td>
			<td><?php if(!is_empty($qn['sifeng'])) echo "有"; else echo "无";?></td>
			<td><?php if(!is_empty($qn['liyi'])) echo "有"; else echo "无";?></td>
			<td><?php if(!is_empty($qn['fazhan'])) echo "有"; else echo "无";?></td>
			<td><?php echo $qn['ip'];?></td>
			<td><?php echo $qn['datetime'];?></td>
			<td><a href="<?php echo SITE_PATH.ENTER;?>/questionnaire/viewqn/<?php echo $qn['id'];?>">查看</a></td>
		</tr>
		<?php } ?>
	</table>
	<div id="" class=""><br>
		<?php echo $data['showpage']?>
	</div>
	</div>
</div>