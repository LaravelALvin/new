const inputs = document.querySelectorAll(".input");
$(document).ready(function(){

//Input line Animation check if input value is not empty

	function addcl(){
		let parent = this.parentNode.parentNode;
		parent.classList.add("focus");
	}

	function remcl(){
		let parent = this.parentNode.parentNode;
		if(this.value == ""){
			parent.classList.remove("focus");
		}
	}

	inputs.forEach(input => {
		input.addEventListener("focus", addcl);
		input.addEventListener("blur", remcl);
	});


//Create object "Note"
var Note = {
		/*
		Login function
		check if the input fields are empty
		
		end PHP POST method with username value and check if username exist
		
		If all input fields are not empty and username exist from the database,
		send a POST METHOD in PHP with password value.
		
		The value return from the php will determine the if else statement.
		if passsword decrypted matched, then load to landing page. If not, display error. 

		*/

		login: function(){
				if ($("#txt_username").val() == '') {
					$(".txt_error").text('Username must not be empty!');
				}else if($("#txt_password").val() == ''){
					$(".txt_error").text('Passowrd must not be empty!');
				}else{
					$(".txt_error").text('');
					var user = {
						username : $("#txt_username").val()	
					};

					$.ajax({
					type : "POST",
					data : { data: user, action : 'ifUserExist'},
					url : '../php/Note.php',
					beforeSend:function(){
						$(".loading").addClass("active");
						
					},
					success : function(data){
						$(".loading").removeClass("active");
						Note.username = jQuery.parseJSON(data);
						console.log(data);
						if (!$.trim(Note.username)){
							
							$(".txt_error").text('Username does not exist');

						}else{
							var user = {
								username : Note.username[0].username,
								password : $("#txt_password").val()	
							};
							console.log(user);
							$.ajax({
							type : "POST",
							data : { data: user, action : 'login'},
							url : '../php/Note.php',
							beforeSend:function(){
								$(".loading").addClass("active");
								
							},
							success : function(data){
								$(".loading").removeClass("active");
								var action = jQuery.parseJSON(data);
								console.log(data);
								if (action == "verified"){
									window.location.href = "../index.php";
								}else{
									$(".txt_error").text('Incorrect Password');
								}
							}

							});

						}

						
					}
					});

				}

			
		},

		/*
		Creating a new user function
		check if the input fields are empty
		
		Send PHP POST method with username value and check if username exist
		

		If all input fields are not empty and username is not existing into the database,
		 send a POST method in php with username, firstname lastname and password values.
		
		The value return from the php will determine the if else statement.
		if true, new account created. If not, display error. 

		*/

		register: function(){
			$(".txt_success").text('');
			if ($("#txt_username").val() == '') {
				$(".txt_error").text('Username must not be empty!');
			}
			else if($("#txt_firstname").val() == ''){
				$(".txt_error").text('Firstname must not be empty!');
			}
			else if($("#txt_lastname").val() == ''){
				$(".txt_error").text('Lastname must not be empty!');
			}
			else if($("#txt_password").val() == ''){
				$(".txt_error").text('Passowrd must not be empty!');
			}
			else if($("#txt_confirmpassword").val() != $("#txt_password").val()){
				$(".txt_error").text('Passowrd not match!');
			}else{
				$(".txt_error").text('');
					var user = {
						username : $("#txt_username").val()		
					};

				$.ajax({
					type : "POST",
					data : { data: user, action : 'ifUserExist'},
					url : '../php/Note.php',
					beforeSend:function(){
						$(".signuploading").addClass("active");
						
					},
					success : function(data){
						$(".signuploading").removeClass("active");
						Note.username = jQuery.parseJSON(data);
						console.log(data);
						if (!$.trim(Note.username)){
							
							var user = {
								username : $("#txt_username").val(),
								firstname : $("#txt_firstname").val(),
								lastname : $("#txt_lastname").val(),
								password : $("#txt_password").val()
							};

							$.ajax({
							type : "POST",
							data : { data: user, action : 'register'},
							url : '../php/Note.php',
							beforeSend:function(){
								$(".signuploading").addClass("active");
								
							},
							success : function(data){
								$(".signuploading").removeClass("active");
								var action = jQuery.parseJSON(data);
								console.log(data);
								// if (action == "verified"){
								// 	window.location.href = "../index.php";
								// }else{
								// 	$(".txt_error").text('Incorrect Password');
								// }
							}

							});

							$(".txt_success").text('Succesfully Registered!');
						}else{
							$(".txt_error").text('Username already not exist');
							

						}

						
					}
					});
			}
		}

	};
//Register button function with shake animation to error message
$("#btn_register").click(function(){
		Note.register();
	});

$('#btn_register').on('click', function(e){
  e.preventDefault();
  $('.txt_error').addClass('shake');
});

  $('.txt_error').on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
  	$('.txt_error').delay(200).removeClass('shake');
  });


//Login button function with shake animation to error message
$("#btn_login").click(function(){
		Note.login();
	});

$('#btn_login').on('click', function(e){
  e.preventDefault();
  $('.txt_error').addClass('shake');
});

  $('.txt_error').on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
  	$('.txt_error').delay(200).removeClass('shake');
  });

});