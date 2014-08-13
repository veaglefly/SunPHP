<!DOCTYPE HTML>
<html>
<head>
<title>学院领导“四风”情况调查问卷</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH;?>index/template/css/common.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH;?>index/template/css/index.css">
<script type=text/javascript src="<?php echo SITE_PATH;?>sun/extend/ueditor/ueditor.config.js"></script>
<script type=text/javascript src="<?php echo SITE_PATH;?>sun/extend/ueditor/ueditor.all.js"></script>
</head>
<body>
<div class="index_main center">
<form method="post" action="<?php echo SITE_PATH;?>index.php/index/upquestionnaire">
	<div class="index_main_title tac">
		<h2>对学院领导班子和班子成员“四风”情况调查问卷</h2>
	</div>
	<div class="index_main_descript center">
		<p>为了全面了解和掌握学院师生对我院领导班子和班子成员在形式主义、官僚主义、享乐主义和奢靡之风“四风”问题以及对学院工作的意见建议，请您根据下面栏目内容提出宝贵意见和建议。</p>
		<p>真诚感谢您的参与和支持!</p>
	</div>
	<div class="index_main_item">
		<div class="index_main_item_title">
			1.&nbsp;&nbsp;&nbsp;&nbsp;对学院领导班子作风情况总体评价&nbsp;&nbsp;&nbsp;<span>*</span>
		</div>
		<div class="index_main_item_main">
			<input type="radio" name="zongping" value="1" checked="checked"> 好&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="zongping" value="2"> 较好&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="zongping" value="3"> 一般&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="zongping" value="4"> 差
		</div>
	</div>
	<div class="index_main_item">
		<div class="index_main_item_title">
			2.&nbsp;&nbsp;&nbsp;&nbsp;学院领导班子和班子成员“四风”问题表现及意见建议
		</div>
		<div class="index_main_item_main">
			<textarea id="ueditor" name="sifeng"></textarea>
			
		</div>
	</div>
	<div class="index_main_item">
		<div class="index_main_item_title">
			3.&nbsp;&nbsp;&nbsp;&nbsp;当前您关心的涉及师生利益的实际问题或困难
		</div>
		<div class="index_main_item_main">
			<textarea id="ueditor2" name="liyi"></textarea>
		</div>
	</div>
	<div class="index_main_item">
		<div class="index_main_item_title">
			4.&nbsp;&nbsp;&nbsp;&nbsp;对学院发展的意见建议
		</div>
		<div class="index_main_item_main">
			<textarea id="ueditor3" name="fazhan"></textarea>
		</div>
	</div>
	<div class="index_main_bottom">
		<input type="submit" name="submit" class="submitbutton" value="提交问卷">
	</div>
</form>
</div>
<script type="text/javascript">
	var editor = new UE.ui.Editor({
		toolbars:[["bold","italic",'underline',"undo","redo",'inserttable','removeformat','justifyleft','justifycenter','lineheight','forecolor','fontfamily', 'fontsize']],
		elementPathEnabled : false,
		wordCount:false,
		autoFloatEnabled:false,
		initialFrameHeight:150
	});
    editor.render("ueditor");
    var editor = new UE.ui.Editor({
		toolbars:[["bold","italic",'underline',"undo","redo",'inserttable','removeformat','justifyleft','justifycenter','lineheight','forecolor','fontfamily', 'fontsize']],
		elementPathEnabled : false,
		wordCount:false,
		autoFloatEnabled:false,
		initialFrameHeight:150
	});
    editor.render("ueditor2");
    var editor = new UE.ui.Editor({
		toolbars:[["bold","italic",'underline',"undo","redo",'inserttable','removeformat','justifyleft','justifycenter','lineheight','forecolor','fontfamily', 'fontsize']],
		elementPathEnabled : false,
		wordCount:false,
		autoFloatEnabled:false,
		initialFrameHeight:150
	});
    editor.render("ueditor3");
</script>
</body>
</html>