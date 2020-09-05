/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';

	config.mathJaxLib = '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML';

	// ...
	config.filebrowserBrowseUrl = '../templates/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../templates/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../templates/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../templates/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../templates/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../templates/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
	// ...
	/*config.uploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json';
	config.filebrowserBrowseUrl = '../templates/ckeditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '../templates/ckeditor/ckfinder/ckfinder.html?type=Images';
    config.filebrowserUploadUrl = '../templates/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '../templates/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';*/

    config.removePlugins = 'pastefromword,font,pastetext';
};
