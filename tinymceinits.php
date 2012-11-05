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
                mlb.add('Some item 1', 'val1');
                mlb.add('some item 2', 'val2');
                mlb.add('some item 3', 'val3');

                // Return the new listbox instance
                return mlb;

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
    plugins : "-example,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave", // - tells TinyMCE to skip the loading of the plugin
    mode : "specific_textareas",
    editor_selector : "active_textbox",
	theme : "advanced",
	skin : "o2k7",
	skin_variant : "silver",
    //theme_advanced_buttons1 : ",bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink",
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
	
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "mylistbox,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
	theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    //theme_advanced_statusbar_location : "bottom"
});
</script>








<!--
<script type="text/javascript">
function initScriptEditor()
{
   //getJSON from server with values to insert into the drop down box
   jQuery1_6_2.getJSON("/listTemplateVariables",
   function(result)
    {
        // Creates a new plugin class and a custom listbox
        tinymce.create('tinymce.plugins.ExamplePlugin',
        {
            createControl : function(n, cm)
            {

                switch(n)
                {
                    case 'variablesListBox':
                        //in the JSON I've an element called size which tells me how many objects should I iterate over
                        var total = parseInt(result.size, 10);
                        //save the values from the JSON in a var
                        var variables = new Array();
                        for(var i = 0, j = 0; j < total; i+=4, j++)
                        {
                            variables[i] = result.values[j].displayed_name;
                            variables[i+1] = result.values[j].name;
                            variables[i+2] = result.values[j].group;
                            variables[i+3] = result.values[j].query;
                        }
                        
                        var mlb = cm.createListBox('variablesListBox',
                        {
                           title : 'Variabili',
                           onselect : function(v)
                           {
                               //actions to be taken when the user clicks on a value
                               //alerts the value clicked
                               //tinyMCE.activeEditor.windowManager.alert('Inserting:' + v);
                               //inserts the corresponding value at the cursor position
                               tinyMCE.activeEditor.execCommand('mceInsertContent',false,v);
                           }
                        });
                        
                        // Add labels and values to the list box
                        for(var i = 0; i < (total * 4); i+=4)
                        {
                            mlb.add(variables[i], variables[i+1]);
                        }
                        
                        // Return the new listbox instance
                        return mlb;
                }
                
                return null;
            }
        });
        
        // Register plugin with a short name
        tinymce.PluginManager.add('templatevariables', tinymce.plugins.ExamplePlugin);
        
        tinyMCE
              .init(
              {
                 language : "it",
                 mode : "exact",
                 elements : "editor_editorText",
                 theme : "advanced",
                 skin : "o2k7",
                 plugins : "-templatevariables,advhr,insertdatetime,preview, print, table, template",
                 // Theme options - button# indicated the row# only
                 theme_advanced_buttons1 : "newdocument,|,cut,copy,paste,|,undo,redo,|,bullist,numlist,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
                 theme_advanced_buttons2 : "outdent,indent,|,image,|,preview,|,forecolor,backcolor,|,insertdate,inserttime,|,advhr,removeformat,|,sub,sup,|,charmap,print,|,template,variablesListBox",
                 theme_advanced_buttons3 : "tablecontrols,table,row_props,cell_props,delete_col,delete_row,col_after,col_before,row_after,row_before,split_cells,merge_cells",
                 theme_advanced_toolbar_location : "top",
                 theme_advanced_toolbar_align : "left",
                 //disabled the status bar, don't want it
                 //theme_advanced_statusbar_location : "bottom",
                 theme_advanced_resizing : true
              });
        
        //function to load the content into the editor when the user clicks open and has already inserted something in a previous session
        fillTextBoxFromProposte();
    });

}
</script>
-->