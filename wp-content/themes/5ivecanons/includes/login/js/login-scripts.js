(function($) {
  'use strict';
  	$( document ).ready(function() {
    	$('#loginform').append('<a href="https://5ivecanons.com" class="powered-by">Powered by: <span class="fivecanons">5ivecanons</span></a>');
		setTimeout(function(){
		if($('#loginform>p:first-child input').val()){
		$('#loginform>p:first-child label').hide();
	}
	if($('#loginform .user-pass-wrap input').val()){
		$('#loginform .user-pass-wrap label').hide();
	}
		}, 1000);
  	});
  	var $item = $('#nav a').clone();
	$('.forgetmenot').append($item);
	$('#nav').remove();
	$('#loginform>p:first-child input').blur(function(){
		if($(this).val()){
			$(this).parent().find('label').hide();
		}else{
			$(this).parent().find('label').show();
		}
	});
	$('#loginform>p:first-child input').focus(function(){
		$(this).parent().find('label').hide();
	});
	$('#loginform .user-pass-wrap input').blur(function(){
		if($(this).val()){
			$(this).parent().parent().find('label').hide();
		}else{
			$(this).parent().parent().find('label').show();
		}
	});
	$('#loginform .user-pass-wrap input').focus(function(){
		$(this).parent().parent().find('label').hide();
	});
}(jQuery));