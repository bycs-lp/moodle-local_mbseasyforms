define(['jquery'], function($) {

    var mbseasyform = function(params) {
    	
		//check if there is a form on the page
 		if ( $('form.mform').length) {

 			//variables
	    	var config 	= JSON.parse(params);
	    	var body_id = $('body').attr('id');
	    	var has_config = false;
	    	var default_disabled = false;
	    	var id_arr = [];
	    	if ( config[body_id]) {
	    		default_disabled = config[body_id].default_disabled;
	    		if (config[body_id].elements) {
		    		id_arr = config[body_id].elements;
		    		has_config = true;
	    		}
	    	}
			var css_hide = "easyhide";      


			//fordev
			var custom_css = "" ;
			//or place for custom css
			$("head").append(
				`'<style> 

				.easyform {
					padding-left: 20px;
					padding-right: 10px;

					background: no-repeat;
					background-position: left;
					background-image: url(/mbsmoodle/theme/image.php/mebis/core/1509008026/t/collapsed);
				}

				.easyform.collapsed {
					background-image: url(/mbsmoodle/theme/image.php/mebis/core/1509008026/t/expanded);
				}

				.easyhide {
					display: none;
				}

				fieldset.easyAdapt {
					margin: 0px !important;
				}
				fieldset.easyAdapt .fcontainer {
					padding: 0px !important;
				}
				</style>)'`);				
			//end_fordev

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

            //create toggle link
            //Is there a collapse all option - then create link inside its div
            if ( $('.collapsible-actions').length )
            {
            	$('.collapsible-actions').prepend("<a id='easyform_click' href='#' role='button' class='easyform'>EasyForm</a>");

            }
            else
            {
            	//always collapsible actions ?
            }
            //if collapse on per default add class
            if (default_disabled)
            {
            	$('#easyform_click').addClass('collapsed');
            }

        	//Easyform switch
			Y.on('domready', function(){
	            $( "#easyform_click").click(function(){
	            	//hide elements
	                $( '.newtoggle' ).each(function() {
	                    $(this).toggleClass( css_hide );
	                })            
	                //adapt css
	                $( '.toggleAdapt' ).each(function() {
	                    $(this).toggleClass( "easyAdapt" );
	                })        
	         		$('#easyform_click').toggleClass('collapsed');

	         		//if uncollapse all was clicked before
	                $( '.easyShow' ).each(function() {
	                    $(this).parents('.collapsible').removeClass( "collapsed" );
	                })      
	            });    		

				//Collapse all compatibility
				$('.collapseexpand').click(function(){
	                $( '.newtoggle' ).each(function() {
	                    $(this).removeClass( css_hide );
	                })            
	                $( '.toggleAdapt' ).each(function() {
	                    $(this).removeClass( "easyAdapt" );
	                })   
	                $('#easyform_click').removeClass('collapsed');     										
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

//evtl settings für custom css was per js nachgeladen wird
//css in scss file background
// .collapsible-actions .collapseexpand {
//     padding-left: 20px;
//     background: url([[pix:t/collapsed]]) 2px center no-repeat;
// }
// .collapsible-actions .collapse-all {
//     background-image: url([[pix:t/expanded]]);
// }	


//example json
// {
//     "page-course-edit": 
//      {
//         "_comment": "Kurs erstellen - body_id als selektor welche elemente",
//         "default_disabled": false,
//         "elements": ["fitem_id_category", "fitem_id_format"]
//      }
// }
