function alert_msgbox(content_txt) {
	jQuery.showMessageBox({
	title: 'Informasi',
	content:content_txt
	});
}

function alert_addinfo_msgbox(content_txt, content_ket) {
jQuery.showMessageBox({
		title: 'Exception',
		type:'alert',
		content:content_txt,
		AdditionalInformation:content_ket,
	});
}
