(function($){
	$(function(){
		$('main a,main input[type="submit"],button').on('click',function(e){ // we are going to globally trun on travel to other links
			e.preventDefault();
		});
		$('#instructions_tab').on('click',function(e){
			e.preventDefault();
			if($('#instructions').is('.open')){
				$('#instructions').animate({
					right:"-267px"
				},500,function(){
					$(this).removeClass('open');
				});	
			}else{
				$('#instructions').animate({
					right:"0px"
				},500,function(){
					$(this).addClass('open');
				});	
			}
		});
		
		$('#automation_tab').on('click',function(e){
			e.preventDefault();
			if($('#automation').is('.open')){
				$('#automation').animate({
					right:"-267px"
				},500,function(){
					$(this).removeClass('open');
				});	
			}else{
				$('#automation').animate({
					right:"0px"
				},500,function(){
					$(this).addClass('open');
				});	
			}
		});	
	});
})(jQuery);