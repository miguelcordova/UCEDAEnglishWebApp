var ajaxType = {
	success: 0,
	error: -1,
	alert: 1};

function confirmloading(){
         return i18n.General.textBeforeUnloadBroweser;
}

function unconfirmLoading(){}

var isContentEdited = false;

$(document).ready(function() {
	$.ajaxSetup({error: ajaxErrorHandler});
       
        var path = (window.location.pathname).toLowerCase();
        
        
        if(path.search("add") != -1 || path.search("edit") != -1 ){
            $('textarea').keyup(function(){
                isContentEdited = true;
                window.onbeforeunload = confirmloading;
            });

            $('select').change(function(){
                window.onbeforeunload = unconfirmLoading;
            });

            $('select').click(function(){
                window.onbeforeunload = unconfirmLoading;
            });

            $('input').keyup(function(){
                isContentEdited = true;
                window.onbeforeunload = confirmloading;
            });

            $('input[type=submit]').click(function(){
                window.onbeforeunload = unconfirmLoading;
            });

            $('a').click(function (){
                var href  = $(this).attr('href');
                
                var re_js_rfc3986_path_absolute = /^\/(?:(?:[A-Za-z0-9\-._~!$&'()*+,;=:@]|%[0-9A-Fa-f]{2})+(?:\/(?:[A-Za-z0-9\-._~!$&'()*+,;=:@]|%[0-9A-Fa-f]{2})*)*)?$/;
               
                var pattern = new RegExp(re_js_rfc3986_path_absolute);
                if(pattern.test(href) && isContentEdited) {
                    var Leavebtn = {
                            value: i18n.General.textLeavePage,
                            callback: function() { 
                                window.onbeforeunload = unconfirmLoading;
                                window.location.href = href; 
                            }
                    };

                    var dlgOpt = {
                            id: 'unloadPage-dialog',
                            title: i18n.General.textBeforeUnloadTitle,
                            content: i18n.General.textBeforeRedirect,
                            buttons: [Leavebtn],
                            closeBtnCaption: i18n.General.textStayOnPage,
                    };
                    $.dialog(dlgOpt);
                    return false;
                }
            });
      }
        
});


function getRootURL() {
	return 'https://demo.openemis.org/core/';
}

function ajaxErrorHandler(jqXHR, textStatus, errorThrown) {
	if (jqXHR.status === 0) return;
	
	var dlgOpt = { id: 'ajax-error-dialog' };
	$('.mask').each(function() {
		if($(this).attr('id') != 'ajax_dialog_mask') {
			$(this).remove();
		}
	});
	
	if (jqXHR.status === 0) {
			} else if (jqXHR.status == 403 || jqXHR.status == 503) { // Forbidden, session timed out
		dlgOpt.title = 'Session Timed Out';		var maskId;
		var loginBtn = {
			id: 'ajax-login-btn',
			value: 'Login',
			callback: function() {
				var form = $('#ajax_login');
				
				$.ajax({
					type: "post",
					dataType: "text",
					url: form.attr('action'),
					data: form.serialize(),
					beforeSend: function (XMLHttpRequest) {
						maskId = $.mask({parent: '#' + dlgOpt.id + ' .dialog-box', text: i18n.General.textReconnecting});
					},
					complete: function (XMLHttpRequest, textStatus) {
						$.unmask({id: maskId});
					},
					success: function (data, textStatus) {
						if(data) {
							$.closeDialog({id: dlgOpt.id});
                                                        window.location.href = getRootURL() + 'Home';
						} else {
							$.alert({
								parent: '#' + dlgOpt.id + ' .dialog-box',
								text: i18n.Config.InvalidUser ,
								type: alertType.error
							});
						}
					}
				});
			}
		}
		
		dlgOpt.buttons = [loginBtn];
		dlgOpt.ajaxUrl = getRootURL() + 'Security/login';
		dlgOpt.onOpen = function() {
			$('#ajax-login form input[type="password"]').keypress(function(e) {
				var key = utility.getKeyPressed(e);
				if(key==13) { // enter key
					$('#ajax-login-btn').click();
				}
			});
		};
		dlgOpt.onClose = function() {
			window.location.href = getRootURL() + 'Security/logout';
		}
	} else if (jqXHR.status == 404) {
		dlgOpt.title = 'Page not found';dlgOpt.content = 'The requested page cannot be found. <br /><br /> Please contact the administrator for assistance';	} else if (jqXHR.status == 500) {
		dlgOpt.title = 'Internal Server Error';dlgOpt.content = 'An unexpected error has occurred. <br /><br /> Please contact the administrator for assistance';	} else if (textStatus === 'parsererror') {
		dlgOpt.title = 'JSON parse failed';dlgOpt.content = 'Invalid JSON data.';	} else if (textStatus === 'timeout') {
		dlgOpt.title = 'Request Timeout';dlgOpt.content = 'Your request has been timed out. Please try again.';	} else if (textStatus === 'abort') {
		dlgOpt.title = 'Request Aborted';dlgOpt.content = 'Your request has been aborted.';	} else {
		dlgOpt.title = 'Unexpected Error';dlgOpt.content = 'An unexpected error has occurred. <br /><br /> Please contact the administrator for assistance';	}
	
	if($('#' + dlgOpt.id).length==0) {
		$.dialog(dlgOpt);
	}
}
