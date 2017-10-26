define(['jquery'], function($) {
 
    var mbseasynav = function(params) {
    	var params_arr 	= params.split("&&");
		var ids 		= params_arr[0];
		var theme 		= params_arr[1];
		var moreoptions = params_arr[2];

		//select correct css class to hide elements
		var css_hide = "";
		if (theme == "boost") {
			css_hide = "hidden";
		} else {
			css_hide = "hide";
		}

    	/*hide collapsed bars*/
        //if more than 1 element to hide
        if ( $( "form.mform .collapsed" ).length > 1 )
        {        	
        	//boost css adaption
        	if (theme == "boost") {
				$("head").append("<style> fieldset.hidden.collapsible{ display:none !important; visibility: hidden !important; } </style>");;
			}

        	//first collapsed menu item
        	var first_collapsed = $( "form.mform .collapsed" ).first();

            //add class hide to collapsed items
            $( 'form.mform .collapsed' ).each(function() {
                $(this).addClass( css_hide + ' newtoggle' );
            })

            //add menu bar to show them again
            $( "<fieldset id='newtoggler' class='clearfix collapsible collapsed'><legend class='ftoggler'>"+ moreoptions +"</legend></fieldset>" ).insertBefore( first_collapsed );
            $( "#newtoggler").click(function(){
                $( '.newtoggle' ).each(function() {
                    $(this).toggleClass( css_hide );
                })            
            });

        	//make link to expand all, wait till yui loaded
			Y.on('domready', function(){
	            $( ".collapseexpand").first().click(function(){
	                $( '.newtoggle' ).each(function() {
	                    $(this).toggleClass( css_hide );
	                })            
	            });    				
			});
        }

        /*hide certain rows*/
        if (ids != null)
        {
	        var id_array = ids.split(",");
	        for (var i = 0, len = id_array.length; i < len; i++) {
				//get row 
				var ident = id_array[i].toString();
				ident = ident.trim();
				//remove comment
				if (ident.indexOf('#') > -1) {
					ident = ident.substr(0, ident.indexOf('#')); 
				}
				//look for id or class element
				if ($( '#' + ident ).length) {
					$( '#' + ident ).closest('.fitem').addClass(css_hide);
				}
				else if ($( '.' + ident ).length) {
					$( '.' + ident ).closest('.fitem').addClass(css_hide);
				}
			}
        }
    };

    return {
        init: function(params) {
            mbseasynav(params);
        }
    };
});