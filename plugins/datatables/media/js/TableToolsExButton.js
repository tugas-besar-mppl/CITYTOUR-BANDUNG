TableTools.BUTTONS.download = {
    "sAction": "text",
    "sTag": "default",
    "sFieldBoundary": "",
    "sFieldSeperator": "\t",
    "sNewLine": "<br>",
    "sToolTip": "",
    "sButtonClass": "DTTT_button_text",
    "sButtonClassHover": "DTTT_button_text_hover",
    "sButtonText": "Download",
    "mColumns": "all",
    "bHeader": true,
    "bFooter": true,
    "sDiv": "",
    "fnMouseover": null,
    "fnMouseout": null,
    "fnClick": function( nButton, oConfig ) {
    var oParams = this.s.dt.oApi._fnAjaxParameters( this.s.dt );
    var iframe = document.createElement('iframe');
	var oParamsAdd = "";
    iframe.style.height = "0px";
    iframe.style.width = "0px";
	if ($('#kelompok').val() != "undefined")
	   oParamsAdd ="&daop="+$('#kelompok').val();
	   
    iframe.src = oConfig.sUrl+"?"+$.param(oParams)+oParamsAdd;
	//alert(oConfig.sUrl+"?"+$.param(oParams)+oParamsAdd);
    document.body.appendChild( iframe );
    },
    "fnSelect": null,
    "fnComplete": null,
    "fnInit": null
};