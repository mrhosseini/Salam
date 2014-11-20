/// initialization of tinymce

tinymce.init({
	selector: "textarea",
	directionality: "rtl",
	plugins: "directionality link emoticons textcolor image",
	toolbar: "undo redo | ltr rtl | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | link image | fontselect fontsizeselect | forecolor backcolor | emoticons",
	menu: false,
	menubar : false,
	statusbar: false,
	resize: false,
	element_format : "html",
	language : 'fa',
	height: 300,
});