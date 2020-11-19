
$(function(){	
	// ******************** Avec id ******************
		/*
			$('#oeil').hover(
				function(){$('#pwd').attr('type','text')},
				function(){$('#pwd').attr('type','password')}
			);
		
		*/
		
	// *******************Avec class******************
		/*
			$('.oeil').hover(
				function(){$('.pwd').attr('type','text')},
				function(){$('.pwd').attr('type','password')}
			);		
		*/
	
	// *******************Avec variables js******************
	/*
		var input_pwd=$('#pwd'); 	//#pwd fait référence à l'element HTML ayant id="pwd"
		var span_oeil=$('.oeil'); 	//.oeil fait référence à l'element HTML ayant class="oeil"
		
		$(span_oeil).hover(
		
			function(){
				$(input_pwd).attr('type','text');
				$(span_oeil).attr('class','fa fa-eye fa-2x oeil');
			},
			
			function(){
				$(input_pwd).attr('type','password');
				$(span_oeil).attr('class','fa fa-eye-slash fa-2x oeil');
			}
			
		);
	
	*/
	
	
	
	// ******************* Avec Click ******************
	
		var input_pwd=$('#pwd'); 	//#pwd fait réfèrence à l'element HTML ayant id="pwd"
		var span_oeil=$('.oeil'); 	//.oeil fait rèfèrence à l'element HTML ayant class="oeil"
		
		$(span_oeil).click(
		
			function(){
			
				if($(input_pwd).attr('type')==='password'){
					$(input_pwd).attr('type','text');
					$(this).attr('class','fa fa-eye fa-2x oeil');
					//this : l'element ayant declanché l'évenement click
				}
				else{
					$(input_pwd).attr('type','password');
					$(this).attr('class','fa fa-eye-slash fa-2x oeil');				
				}
			}
			
		);
	
	
	$('input').each(function(){  // pour chaque élément input de toute l'application
		if($(this).attr('required')==='required'){  // si l'élément est obligatoire
			$(this).after('<span class="etoile">*</span>'); // Afficher une étoile aprés l'élémnt
		}
	});
	
	
});
