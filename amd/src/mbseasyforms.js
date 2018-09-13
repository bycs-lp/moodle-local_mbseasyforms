define(['jquery'], function($) {

	var mbseasyform = function(params) {

		//check if there is a form with collapsible-actions on the page
		if ( $('form.mform').length && $('.collapsible-actions').length ) {

			/*variables*/
			/**********/
			try {
				var config 	= JSON.parse(easyconf);
			} catch (e) {
				console.log("EasyForm-Plugin: Error in JSON-Config: " + e);
				var config = JSON.parse('{}');
			}
			var tmp = params.split('#!#');
			var theme = tmp[0];
			var showall = tmp[1];
			var showless = tmp[2];
			var user_setting = tmp[3];
			var body_id = $('body').attr('id');
			var default_disabled = false;
			var has_config = false;
			var id_arr = [];
			//read config
			if ( config[body_id]) {
				default_disabled = config[body_id].default_disabled;
				if (config[body_id].elements) {
					id_arr = config[body_id].elements;
					has_config = true;
				}
			}
			var css_hide = "easyhide";
			//disable for behat testing
			if (jQuery.isEmptyObject(config)) {
				default_disabled = true;
			}

			/*hide things*/
			/************/
			//hide Header: legend .ftoggler
			$( '.ftoggler' ).each(function() {
				$(this).addClass( css_hide + ' newtoggle' );
			});
			// hide Input rows
			$( '.fitem' ).each(function() {
				//if not required or buttons (.req for bootstrap - fa-exla... for boost)
				if ($(this).find('.req').length !== 1 && $(this).find('.fa-exclamation-circle').length !== 1 && !$(this).hasClass('fitem_actionbuttons')) {
					//if not in specified elements
					if (has_config)
					{						
						var hide = true;
						for (var i = 0, len = id_arr.length; i < len; i++) {
							if ($(this).is('#' + id_arr[i]))
							{
								hide = false;
								//make sure it is visible
								$(this).parents('fieldset').removeClass('collapsed');
								//mark element as to show
								$(this).addClass( 'easyShow' );
							}
						}
						if (hide) {
							$(this).addClass( css_hide + ' newtoggle' );
						}
					}
					else
					{
						$(this).addClass( css_hide + ' newtoggle' );
					}
					// collapse_all.addClass(css_hide);
				}
				else {
					//mark element as to show
					$(this).addClass( 'easyShow' );
				}
			});

			//add class to remove used space of hidden elements
			$( 'fieldset.collapsible' ).each(function() {
				$(this).addClass( 'easyAdapt toggleAdapt' );
			});

			//adapt action buttons
			$( '#fgroup_id_buttonar' ).addClass( "easyon" );

			/*Create toggle link*/
			/*******************/
			//create toggle link
			//Is there a collapse all option - then create link inside its div
			if ( $('.collapsible-actions').length )
			{
				$('.collapseexpand').first().addClass('hidden');
				$('.collapsible-actions').append("<a id='easyform_click' href='#' role='button' class='easyform " + theme + "'>"+ showall +"</a>");
			}

			//if easyform disabled through conf or user setting
			if (default_disabled || user_setting === "0")
			{
				$('#easyform_click').addClass('collapsed');
				$('#easyform_click').html(showless);
				//show elements
				$( '.newtoggle' ).each(function() {
					$(this).removeClass( css_hide );
				});
				//adapt css
				$( '.toggleAdapt' ).each(function() {
					$(this).removeClass( "easyAdapt" );
				});
				$( '#fgroup_id_buttonar' ).removeClass( "easyon" );
				//show collapse all
				$('.collapseexpand').first().removeClass('hidden');
			}

			//Easyform switch
				$( "#easyform_click").click(function(){
					//hide elements
					$( '.newtoggle' ).each(function() {
						$(this).toggleClass( css_hide );
					});
					//adapt css
					$( '.toggleAdapt' ).each(function() {
						$(this).toggleClass( "easyAdapt" );
					});
					if ($( '.' + css_hide ).length ) {
						$('#easyform_click').removeClass('collapsed');
						$('#easyform_click').html(showall);
						$('.collapseexpand').first().addClass('hidden');
					} else {
						$('#easyform_click').addClass('collapsed');
						$('#easyform_click').html(showless);
						$('.collapseexpand').first().removeClass('hidden');
					}

					//adapt actionbuttons
					$( '#fgroup_id_buttonar' ).toggleClass( "easyon" );

					//if collapse all was clicked before uncollapse
					$( '.easyShow' ).each(function() {
						$(this).parents('.collapsible').removeClass( "collapsed" );
					});
				});

			//Collapse all compatibility
			Y.on('domready', function(){
				$('.collapseexpand').click(function(){
					$( '.newtoggle' ).each(function() {
						$(this).removeClass( css_hide );
					});
					$( '.toggleAdapt' ).each(function() {
						$(this).removeClass( "easyAdapt" );
					});
				});
			});
		}
	};


	return {
		init: function(params) {
			mbseasyform(params);
		}
	};
});