$(document).ready(function(){
	$( ".main_side_main" ).accordion({
		heightStyle: "content"
	});
	setGoodSize();
	$(window).resize(function(){
		setGoodSize();
	});

	function setGoodSize(){
		var mainmainWidth = $(window).width() - 160;
		$(".main_main").css("width",mainmainWidth);
		var mainHeight = $(window).height() - 40;
		$(".main_side,.main_main").css("height",mainHeight);
		mainmainWidth = $(window).width() - 160;
		$(".main_main").css("width",mainmainWidth);
	}
});