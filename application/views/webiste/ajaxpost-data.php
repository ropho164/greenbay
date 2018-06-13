<script language="javascript">
$(function () {	
	$("#btnReEmail").on("click",function(e){
		e.preventDefault();
		var numreg=/^[0-9]+$/;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if( $("#frm_newsletter").find("input[name='cus_email']").val()=="")
		{				
			$("input[name='cus_email']").addClass('input_newsletter_err');
			return;
		}
		
		if(reg.test($("input[name='cus_email']").val())==false)
		{
			$("input[name='cus_email']").addClass('input_newsletter_err');
			return;
		}
		$("input[name='cus_email']").removeClass('input_newsletter_err');
		var data = $("#frm_newsletter").serializeArray();
		addNewsletter(data);
	});
	$("#send-contact-top").on("click",function(e){
		e.preventDefault();
		var numreg=/^[0-9]+$/;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if( $("#form-contact-top").find("input[name='cus_name_contact']").val()==""){				
			$("#form-contact-top").find("input[name='cus_name_contact']").attr("placeholder","Please enter your name");
			$("#form-contact-top").find("input[name='cus_name_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-top").find("input[name='cus_name_contact']").removeClass('input_newsletter_err');
		}
		if( $("#form-contact-top").find("input[name='cus_email_contact']").val()==""){				
			$("#form-contact-top").find("input[name='cus_email_contact']").attr("placeholder","Please enter your email");
			$("#form-contact-top").find("input[name='cus_email_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-top").find("input[name='cus_email_contact']").removeClass('input_newsletter_err');
		}
		if(reg.test($("#form-contact-top").find("input[name='cus_email_contact']").val())==false){
			$("#form-contact-top").find("input[name='cus_email_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-top").find("input[name='cus_email_contact']").removeClass('input_newsletter_err');
		}
		if( $("#form-contact-top").find("textarea[name='cus_cont_contact']").val()==""){				
			$("#form-contact-top").find("textarea[name='cus_cont_contact']").attr("placeholder","Message is not blank");
			$("#form-contact-top").find("textarea[name='cus_cont_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-top").find("textarea[name='cus_cont_contact']").removeClass('input_newsletter_err');
		}
		//alert("ok");
		var data = $("#form-contact-top").serializeArray();
		addContact(data,"top");
	});
	$("#send-contact-right").on("click",function(e){
		e.preventDefault();
		var numreg=/^[0-9]+$/;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if( $("#form-contact-right").find("input[name='cus_name_contact']").val()==""){				
			$("#form-contact-right").find("input[name='cus_name_contact']").attr("placeholder","Please enter your name");
			$("#form-contact-right").find("input[name='cus_name_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-right").find("input[name='cus_name_contact']").removeClass('input_newsletter_err');
		}
		if( $("#form-contact-right").find("input[name='cus_email_contact']").val()==""){				
			$("#form-contact-right").find("input[name='cus_email_contact']").attr("placeholder","Please enter your email");
			$("#form-contact-right").find("input[name='cus_email_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-right").find("input[name='cus_email_contact']").removeClass('input_newsletter_err');
		}
		if(reg.test($("#form-contact-right").find("input[name='cus_email_contact']").val())==false){
			$("#form-contact-right").find("input[name='cus_email_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-right").find("input[name='cus_email_contact']").removeClass('input_newsletter_err');
		}
		if( $("#form-contact-right").find("textarea[name='cus_cont_contact']").val()==""){				
			$("#form-contact-right").find("textarea[name='cus_cont_contact']").attr("placeholder","Message is not blank");
			$("#form-contact-right").find("textarea[name='cus_cont_contact']").addClass('input_newsletter_err');
			return;
		}
		else{
			$("#form-contact-right").find("textarea[name='cus_cont_contact']").removeClass('input_newsletter_err');
		}
		var data = $("#form-contact-right").serializeArray();
		addContact(data,"right");
	});
});
function addNewsletter(data){
	$.ajax({
		data:data,
		url:"<?=base_url().$this->lang->line('key')?>/home/add-newsletter",
		type:"POST",
		dataType:"xml",
		success:function(xml){
			var msg=$(xml).find("status").text();
			if($(xml).find("status").attr("state")==1){
				$("input[name='cus_email']").removeClass('input_newsletter_err');
				$("input[name='cus_email']").addClass('input_newsletter_suc');
				$("input[name='cus_email']").val('');
				$("input[name='cus_email']").attr("placeholder",msg);
			}
			else if($(xml).find("status").attr("state")==-1){
				$("input[name='cus_email']").addClass('input_newsletter_err');
				$("input[name='cus_email']").val('');
				$("input[name='cus_email']").attr("placeholder",msg);
			}
			else{
				$("input[name='cus_email']").addClass('input_newsletter_err');
			}
		}
	});	
}
function addContact(data,pos){
	$(".alert_success_contact").empty();
	$(".alert_success_contact_right").empty();
	$.ajax({
		data:data,
		url:"<?=base_url().$this->lang->line('key')?>/home/add-contact",
		type:"POST",
		dataType:"xml",
		success:function(xml){
			var msg=$(xml).find("status").text();
			if(pos=="top"){
				if($(xml).find("status").attr("state")==1){
					$("#form-contact-top")[0].reset();
					$(".alert_success_contact").addClass('c_success');
					$(".alert_success_contact").append(msg);
				}
				else{
					$(".alert_success_contact").addClass('c_error');
					$(".alert_success_contact").append(msg);
				}
			}
			if(pos=="right"){
				if($(xml).find("status").attr("state")==1){
					$("#form-contact-right")[0].reset();
					$(".alert_success_contact_right").addClass('c_success');
					$(".alert_success_contact_right").append(msg);
				}
				else{
					$(".alert_success_contact_right").addClass('c_error');
					$(".alert_success_contact_right").append(msg);
				}
			}
		}
	});	
}
</script>