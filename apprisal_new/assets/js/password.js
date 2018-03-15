
$(document).ready(function(){

    $('#amar').prop('disabled', true);

 $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");


    if($("#oldpassword").val().length >= 1){
		$("#oldpass").removeClass("glyphicon-remove");
		$("#oldpass").addClass("glyphicon-ok");
		$("#oldpass").css("color","#00A41E");

         
		

	}else{
		$("#oldpass").removeClass("glyphicon-ok");
		$("#oldpass").addClass("glyphicon-remove");
		$("#oldpass").css("color","#FF0004");
		//$('#amar').prop('disabled', true);

		
	}


	
	if($("#password1").val().length >= 8){
		$("#8char").removeClass("glyphicon-remove");
		$("#8char").addClass("glyphicon-ok");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("glyphicon-ok");
		$("#8char").addClass("glyphicon-remove");
		$("#8char").css("color","#FF0004");
		//$('#amar').prop('disabled', true);
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("glyphicon-remove");
		$("#ucase").addClass("glyphicon-ok");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("glyphicon-ok");
		$("#ucase").addClass("glyphicon-remove");
		$("#ucase").css("color","#FF0004");
		//$('#amar').prop('disabled', true);
	}
	
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("glyphicon-remove");
		$("#lcase").addClass("glyphicon-ok");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("glyphicon-ok");
		$("#lcase").addClass("glyphicon-remove");
		$("#lcase").css("color","#FF0004");
		//$('#amar').prop('disabled', true);
	}
	
	if(num.test($("#password1").val())){
		$("#num").removeClass("glyphicon-remove");
		$("#num").addClass("glyphicon-ok");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("glyphicon-ok");
		$("#num").addClass("glyphicon-remove");
		$("#num").css("color","#FF0004");
		//$('#amar').prop('disabled', true);
	}
	
       if($("#password2").val().length >= 1){        
			if($("#password1").val() == $("#password2").val()){
				$("#pwmatch").removeClass("glyphicon-remove");
				$("#pwmatch").addClass("glyphicon-ok");
				$("#pwmatch").css("color","#00A41E");
				// $('#amar').prop('disabled', false);
			}else{
				$("#pwmatch").removeClass("glyphicon-ok");
				$("#pwmatch").addClass("glyphicon-remove");
				$("#pwmatch").css("color","#FF0004");
				$('#amar').prop('disabled', true);
	}
 }
     if (($('#oldpass').css('color') === 'rgb(0, 164, 30)') && ($('#8char').css('color') === 'rgb(0, 164, 30)') && ($('#ucase').css('color') === 'rgb(0, 164, 30)') && ($('#lcase').css('color') === 'rgb(0, 164, 30)') && ($('#num').css('color') === 'rgb(0, 164, 30)') && ($('#pwmatch').css('color') === 'rgb(0, 164, 30)'))  {
              $('#amar').prop('disabled', false);
            }
});

          
 });