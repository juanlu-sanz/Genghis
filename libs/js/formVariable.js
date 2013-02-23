  $(function() {
        var name = $( "#name" ),
            type = $( "#type" ),
            var_min = $( "#var_min" ),
            var_max = $( "#var_max" ),
            allFields = $( [] ).add( name ).add( type ).add( var_min ).add( var_max ),
            tips = $( ".validateTips" );
 
        function updateTips( t ) {
            tips
                .text( t )
                .addClass( "ui-state-highlight" );
            setTimeout(function() {
                tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }
 
        function checkLength( o, n, min, max ) {
            if ( o.val().length > max || o.val().length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( "Length of " + n + " must be between " +
                    min + " and " + max + "." );
                return false;
            } else {
                return true;
            }
        }
 
        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } else {
                return true;
            }
        }
 
        $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 300,
            width: 300,
            modal: true,
            buttons: {
                "Crear": function() {
                    var bValid = true;
                    allFields.removeClass( "ui-state-error" );
                    bValid=true;
                    if ( bValid ) {
                    	/*$.post('./libs/save.php', {'name': name}, function(o) {
							console.log(o);
						});*/
                        $( "#users tbody" ).append( "<tr>" +
                            "<td>" + name.val() + "</td>" + 
                            "<td>" + type.val() + "</td>" + 
                            "<td>" + password.val() + "</td>" +
                        "</tr>" ); 
                        $( this ).dialog( "close" );
                    }
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            },
            close: function() {
                allFields.val( "" ).removeClass( "ui-state-error" );
            }
        });
 
        $( "#create-user" )
            .click(function() {
                $( "#dialog-form" ).dialog( "open" );
            });
    });