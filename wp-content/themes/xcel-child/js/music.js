(function($){
	$(document).ready(function(){
		
		$(".song").click(function(){
			changeSong($(this));
		});
		function changeSong(elem){  
			var url = elem.attr('audiourl');
			var name = elem.text();
			var audio = document.getElementById('mp');
			$('#mps').attr("src", url);
			$('#mpt').text(name);
			audio.load();
			audio.play();
		}
		/*$(window).scroll(function(e){ 
			if($(window).scrollTop() > 203){
				$('#mediaplayer').css({'position': 'fixed', 'top': '0px'}); 
			}
			else{
				$('#mediaplayer').css({'position': 'absolute', 'top': '203px'}); 
			}
		});*/

	});
	
})(jQuery);