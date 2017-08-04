var APP = {};
;(function ( $, APP, window, document, undefined ) {

	$(document).ready(function(){

		// this is a global component used to determine which breakpoint we're at
		// to listen for the event do $(document).on('breakpoint', eventHandlerCallback);
		// callback accepts normal amount of params that a js event listener callback would have
		// but there's a custom property added to the event object called "name"
		// assuming in the callback the event object variable passed in is e: console.log(e.device);
		APP.Breakpoint = {
			name : '',
			_init : function(){
				$(window).on('resize load', APP.Breakpoint._resizeLoadHander);
			},
			_resizeLoadHander : function(){
				if( $(window).width() > 1024 && APP.Breakpoint.name != 'desktop' ){
					APP.Breakpoint.name = 'desktop';
					APP.Breakpoint._dispatchEvent();
				}
				else if( $(window).width() <= 1024 && $(window).width() > 640 && APP.Breakpoint.name != 'tablet' ){
					APP.Breakpoint.name = 'tablet';	
					APP.Breakpoint._dispatchEvent();
				}
				else if( $(window).width() < 641 && APP.Breakpoint.name != 'mobile' ){		
					APP.Breakpoint.name = 'mobile';		
					APP.Breakpoint._dispatchEvent();
				}
			},
			_dispatchEvent : function(){
				$(document).trigger($.Event('breakpoint', {device: APP.Breakpoint.name}));
			}
		}
		APP.Breakpoint._init();		

	});

})( jQuery, APP, window, document );

