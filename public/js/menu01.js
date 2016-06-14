$(document).ready(function(){

	$(window).resize(function() {
		if(window.innerWidth > 1080 && parseFloat($('#menu-right').css('right')) != 0){
			$('#menu-right').css({'right': '0px'});
		}else if(window.innerWidth < 1080 && parseFloat($('#menu-right').css('right')) == 0){
			$('#menu-right').css({'right': '-100%'});
		}
	});

	var position_ = null,
		pxMenuNow = 0,
		menu = null,
		menuB = null,
		pxMenuPut = 0,
		pxMenuShow = 0,
		pxMenuHide = '-100%',
		classPut1 = null,
		classPut2 = null,
		menuGral = $('#menuGral div');
	//var button = $('.menuFloatLeft');

	menuGral.on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var div = $(this).data('menu');
		position_ = (div == 'menuLeft' ? 'left' : 'right');
		menu = $('#menu-'+position_);
		menuB = position_ == 'left' ? $('#menu-right') : $('#menu-left');
		pxMenuNow = parseFloat(menu.css(position_));
		pxMenuPut = pxMenuNow != pxMenuShow ? pxMenuShow : pxMenuHide;
		classPut1 = position_ == 'left' ? { left: pxMenuPut } : 
			{ right: pxMenuPut };
		classPut2 = position_ == 'left' ? { right: pxMenuHide } : 
			{ left: pxMenuHide };

		menu.animate(classPut1);
		menuB.animate(classPut2);
	});

	$(document).on('click', function(e){
		if(window.innerWidth < 1080 ){
			var data = $(e.target).data('area');
			if(data != 'in'){
				//modal_.close();
				var menuLeft = $('#menu-left');
				var menuRight = $('#menu-right');
				var menuLeftPx = parseFloat(menuLeft.css('left'));
				var menuRightPx = parseFloat(menuRight.css('right'));
				var menuLeftshow = menuLeftPx == pxMenuShow;
				var menuRightshow = menuRightPx == pxMenuShow;

				menuLeftshow && menuLeft.animate({ 'left': pxMenuHide });
				menuRightshow && menuRight.animate({ 'right': pxMenuHide });
			}
		}else{
			$('#menu-right').css({'right': '0px'});
		}
	});
});