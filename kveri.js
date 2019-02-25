



	/*slider*/	$(document).ready(function()
		{
			slideShow();
			
		});
		function slideShow()
		{
			var current = $('#slajder .show');
			var next=current.next().lenght ? current.next() : current.parent().children(':first');
			
			current.hide().removeClass('show');
			next.fadeIn().addClass('show');
			
			setTimeout(slideShow, 2000);
		}




/*hover*/
/*
$(document).ready(function(){
 $(".slike a").hover(function(){
 $(this).fadeTo( "slow", 0.6 );}, function(){
 $(this).fadeTo( "slow", 1 );
 });
});

$(document).ready(function(){
  $('#podaciUser tr:odd').css('background-color','white');
});
$(document).ready(function(){
  $('#podaciUser #zebrica tr:even').css('background-color','blue');
});

*/