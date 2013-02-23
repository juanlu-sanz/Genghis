tinyMCEPopup.requireLangPack();
var waitforAMTcgiloc = true;

var jsAsciimathDialog = {
	init : function() {
		AMTcgiloc = tinyMCEPopup.getWindowArg('AMTcgiloc');
	},

	set : function(val) {
		tinyMCEPopup.restoreSelection();
		// Insert the contents from the input into the document
		tinyMCEPopup.editor.execCommand('mcejsAsciimath', val);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(jsAsciimathDialog.init, jsAsciimathDialog);
