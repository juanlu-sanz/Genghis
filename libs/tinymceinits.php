<script type="text/javascript">
// Creates a new plugin class and a custom listbox
tinymce.create('tinymce.plugins.ExamplePlugin', {
    createControl: function(n, cm) {
        switch (n) {
        case 'mylistbox':
            var mlb = cm.createListBox('mylistbox', {
                title : 'Variables',
                    onselect : function(v) {
                        //tinyMCE.activeEditor.windowManager.alert('Value selected:' + v);
                        //inserts the corresponding value at the cursor position
                        tinyMCE.activeEditor.execCommand('mceInsertContent',false,v);
                    }
            });

            // Add some values to the list box
<?php 
foreach ($vars as $id => $properties){
    if($properties['name'] != ""){
        echo "mlb.add('" . $properties['name'] . "', '&nbsp;<var>".$properties['name']."</var>&nbsp;');\n";
    }
}
?>
                /*mlb.add('Variable 1', 'val1');
mlb.add('Variable 2', 'val2');
                mlb.add('Varaible 3', 'val3');*/

    // Return the new listbox instance
    return mlb;
case 'mysmalllistbox':
    var mlb2 = cm.createListBox('mysmalllistbox', {
        title : 'Variables',
            onselect : function(v) {
                //tinyMCE.activeEditor.windowManager.alert('Value selected:' + v);
                //inserts the corresponding value at the cursor position
                tinyMCE.activeEditor.execCommand('mceInsertContent',false,v);
            }
    });
<?php 
foreach ($vars as $id => $properties){
    if($properties['name'] != ""){
        echo "mlb2.add('" . $properties['name'] . "', '[".$properties['name']."]');\n";
    }
}
?>   

    return mlb2;
case 'mysplitbutton': 
    var c = cm.createSplitButton('mysplitbutton', {
        title : 'My split button',
            image : '/example_data/example.gif',
            onclick : function() {
                tinyMCE.activeEditor.windowManager.alert('Button was clicked.');
            }
    });

    c.onRenderMenu.add(function(c, m) {
        m.add({title : 'Some title', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

        m.add({title : 'Some item 1', onclick : function() {
            tinyMCE.activeEditor.windowManager.alert('Some  item 1 was clicked.');
        }});

        m.add({title : 'Some item 2', onclick : function() {
            tinyMCE.activeEditor.windowManager.alert('Some  item 2 was clicked.');
        }});
    });

    // Return the new splitbutton instance
    return c;
        }

        return null;
    }
});

// Register plugin with a short name
tinymce.PluginManager.add('example', tinymce.plugins.ExamplePlugin);

// Initialize TinyMCE with the new plugin and listbox

tinyMCE.init({
    plugins : "jsasciimath,asciimath,asciisvg,-example,equation,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups"/*,autosave"*/, // - tells TinyMCE to skip the loading of the plugin
        mode : "specific_textareas",
        editor_selector : "tinymce",
        theme : "advanced",
        skin : "o2k7",
        width: "834",
        skin_variant : "silver",
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,code,|,insertdate,inserttime,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,iespell,media,advhr,|,fullscreen",
        theme_advanced_buttons4 :/* "jsasciimathcharmap,*/"asciimathcharmap,asciisvg,mylistbox,|,styleprops,visualchars,nonbreaking,|,code",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        AScgiloc : 'http://www.imathas.com/editordemo/php/svgimg.php',			      //change me  
        ASdloc : 'http://www.imathas.com/editordemo/jscripts/tiny_mce/plugins/asciisvg/js/d.svg',  //change me  	
        content_css : "./libs/tinymce/css/content.css",
        //theme_advanced_statusbar_location : "bottom"

});
tinyMCE.init({
    plugins : "jsasciimath,-example,equation,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups"/*,autosave"*/, // - tells TinyMCE to skip the loading of the plugin
        mode : "specific_textareas",
        editor_selector : "tinymce_solution",
        theme : "advanced",
        skin : "o2k7",
        width: "834",
        skin_variant : "silver",
        theme_advanced_buttons1 : "save,|,jsasciimathcharmap, mysmalllistbox,|,code",
        AScgiloc : 'http://www.imathas.com/editordemo/php/svgimg.php',			      //change me  
        ASdloc : 'http://www.imathas.com/editordemo/jscripts/tiny_mce/plugins/asciisvg/js/d.svg',  //change me  	

        content_css : "./libs/tinymce/css/content.css",
});

tinyMCE.init({
    plugins : "jsasciimath,asciimath,asciisvg,-example,equation,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups"/*,autosave"*/, // - tells TinyMCE to skip the loading of the plugin
        mode : "specific_textareas",
        editor_selector : "tinymce_hint",
        theme : "advanced",
        skin : "o2k7",
        width: "760",
        skin_variant : "silver",
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,code,|,insertdate,inserttime,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,iespell,media,advhr,|,fullscreen",
        theme_advanced_buttons4 :/* "jsasciimathcharmap,*/"asciimathcharmap,asciisvg,mylistbox,|,styleprops,visualchars,nonbreaking,|,code",
          theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        AScgiloc : 'http://www.imathas.com/editordemo/php/svgimg.php',			      //change me  
        ASdloc : 'http://www.imathas.com/editordemo/jscripts/tiny_mce/plugins/asciisvg/js/d.svg',  //change me  	
        content_css : "./libs/tinymce/css/content.css",
        //theme_advanced_statusbar_location : "bottom"

});
</script>





