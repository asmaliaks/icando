
/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	 config.language = 'en';
	 config.uiColor = '#C6DDF0'; 
         config.removeFormatTags = 'b,big,code,del,dfn,em,font,i,ins,kbd,script';
         config.htmlEncodeOutput = true;
         config.toolbar = 'Toolbar';
         config.autoParagraph = false;
 
config.toolbar = //_Toolbar =
[
	{ name: 'document', items : [ 'Source' ] },
	{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','-','Undo','Redo' ] },
	{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },

	'/',
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','-','RemoveFormat' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	{ name: 'insert', items : [ 'HorizontalRule','SpecialChar','PageBreak' ] },
	'/',
        { name: 'links', items : [ 'Link','Unlink' ] },
	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	{ name: 'colors', items : [ 'TextColor','BGColor' ] }
];

};
