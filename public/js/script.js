$(document).ready(function(){
	modal_.init('bgModal', {autoClose:true});
	// inicializando los tooltips existentes
	tooltip.init();
});

var modal_ = {
	init: function(id, cfg){
		cfg = typeof cfg === 'object' ? cfg : {};
		id || (id = 'bgModal');
		var that = this;
		var selector = '#'+id;
		var height_ = $(window).height();
		var style='background: rgba(0,0,0, 0.8); '+
			'display:none; height: '+height_+'px; '+
			'position:fixed; top:0; width:100%; '+
			'z-index:99';
		$('body').append('<div id="'+id+'" style="'+style+'"></div>');
		cfg.autoOpen && this.open();
		cfg.autoClose && $(selector).on('click', function(){
			that.close();
		});
	},
	open: function(selector, cfg){
		cfg = typeof cfg === 'object' ? cfg : {};
		selector || (selector = '#bgModal')
		$(selector).fadeIn();
	},
	close: function(selector, cfg){
		cfg = typeof cfg === 'object' ? cfg : {};
		selector || (selector = '#bgModal')
		$(selector).fadeOut();
	},
};

/**
 * Nombre de espacio (namespace) para los tooltips 
 *
 */
var tooltip = {};
/**
 * Se configura he inicia el tooltip
 */
tooltip.init = function(){
	$('[data-toggle="tooltip"]').tooltip();
};
/**
 * Se muestra el/los tooltip/s
 */
tooltip.show = function(selector){
	if(!selector) return;
	if(typeof selector == 'object'){
		for(var idx in selector)
			$(selector[idx]).tooltip('show');
	}else
		$(selector).tooltip('show');
};