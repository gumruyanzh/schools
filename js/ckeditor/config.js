/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	// //filebroser
	// config.extraPlugins = 'filebrowser';
	// //popup
	// config.extraPlugins = 'popup';
	// //esiminch
	// config.filebrowserUploadUrl = '../../newupload.php';
	var pathName = '';

// ...
   config.filebrowserBrowseUrl = pathName + '/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = pathName +  '/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = pathName + '/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = pathName + '/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = pathName + '/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = pathName + '/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
// ...

};
