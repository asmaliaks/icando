function login(){
    $('#authError').hide();
  var login = $('#login-user').val();
  var pass = $('#login-password').val();
  $.ajax({
    type: 'POST',
    url: '/authentication/log-in',
    data: {login: login, pass: pass},
    success: function(data){
       var pathArray = location.href.split( '/' );
       var protocol = pathArray[0];
       var host = pathArray[2];
       var url = protocol + '//' + host;
       if(data == 'admin'){
           window.location.href = url+'/admin/index/';
       }else if(data == 'customer'){
           window.location.href = url+'/customer/index/';
       }else if(data == 'performer'){
           window.location.href = url+'/performer/index/';
       }else if(data == 'false'){
           $('#authError').show();
       }
    }
 }); 
};

function register(){ console.log('register function');
    $('#mailInvalid').hide();
    $('#mailError').hide();
  var username = $('#username').val();  
  var surname = $('#surname').val();  
  var email = $('#email').val();  
  var phonenumber = $('#phonenumber').val();  

      var sex = $('input[name=sex]:checked').val();

  var city = $('#city').val();
  var birthday = $('#birthday').val();
  var pass = $('#pass').val();
  $.ajax({
    type: 'POST',
    url: '/registration/index',
    data: {username: username, surname: surname, phonenumber: phonenumber, email: email, sex: sex, city: city, birthday: birthday, pass: pass},
    success: function(data){ 
        switch (data) {
            case 'username empty':
               $('#usernameError').show();
               break
            case 'surname empty':
               $('#surnameError').show();
               break
            case 'sex empty':
               $('#sexError').show();
               break
            case 'phone empty':
               $('#phoneError').show();
               break
            case 'city empty':
               $('#cityError').show();
               break
            case 'city empty':
               $('#cityError').show();
               break
            case 'birthday empty':
               $('#birthdayError').show();
               break
            case 'mail taken':
               $('#mailError').show();
               break
            case 'invalid mail':
               $('#mailInvalid').show();
               break
            case 'true':
                var pathArray = location.href.split( '/' );
                var protocol = pathArray[0];
                var host = pathArray[2];
                var url = protocol + '//' + host;
                window.location.href = url+'/';
               break
            default:
               console.log('internal server error');
               break
         };

    }
 });
};

function checkPass(){console.log('checkPass');
   $('#passError').hide();
   var pass = $('#pass').val();
   var passConf = $('#passConf').val();
   if(passConf === pass){
       $('#passError').hide();
      $('#submit').prop('disabled', false);
   }else{
       $('#passError').show();
       $('#submit').prop('disabled', true);
   }
}

