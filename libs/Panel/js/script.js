$(document).ready(function() {
	$('select').selectbox({ inputClass: "styledselect_form_1" });
	
	$("input[type=file]").filestyle({ 
		image: "libs/Panel/images/forms/upload_file.gif",
		imageheight : 29,
		imagewidth : 78,
		width : 300
	});
	
	//CKEDITOR.replaceAll();
});$(document).ready(function(){
					$('#account').click(function(){
						location = '?page=account';
					});
				});$(document).ready(function(){
					$('#logout').click(function(){
						$('form').append('<input id="action" name="action" type="hidden" value="logout();"  />');
						$('form').submit();
						$('#action').remove();
					});
				});$(document).ready(function(){
					$('#anasayfa').click(function(){
						location = '?page=anasayfa';
					});
				});$(document).ready(function(){
					$('#hakkimizda').click(function(){
						location = '?page=hakkimizda';
					});
				});$(document).ready(function(){
					$('#biz_kimiz').click(function(){
						location = '?page=bizkimiz';
					});
				});$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#username').val() == ''){
									notify('error', 'Lütfen Kullanıcı Adı alanını doldurunuz');
									$('#isSubmitted').val('false');
									return false;
								}
							}
							
						});
				   });$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#password').val() == ''){
									notify('error', 'Lütfen Şifre alanını doldurunuz');
									$('#isSubmitted').val('false');
									return false;
								}
							}
							
						});
				   });$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#password2').val() == ''){
									notify('error', 'Lütfen Şifre Tekrar alanını doldurunuz');
									$('#isSubmitted').val('false');
									return false;
								}
							}
							
						});
				   });