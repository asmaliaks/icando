function recoveryPass(e){
   
    var email = $('#email').val();
    if(checkEmail(email)){
       
       console.log(response);
    }else{
//        console.log(checkEmail(email));
    }
}

function checkEmail(email){
    $('#error').hide();
    $('#success').hide();
    $('#submit').hide();
    $('#preloader').show();
    var email = $('#emailRec').val();
        $.ajax({
          type: 'POST',
          url: '/registration/check-email',
          data: {email: email},
          success: function(data){
              if(data === 'false'){
                  $('#submit').show();
                  $('#preloader').hide();
                  $('#error').show();
              }else{
                  $.ajax({
                      type: 'POST',
                      url: '/registration/send-pass-email',
                      data: {email: email},
                      success: function(data){
                         $('#submit').show();
                         $('#preloader').hide();
                         $('#success').show();
                      }
                   });
              }    
        }
        }); 
}

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
    $('#phoneTaken').hide();
    $('#phoneError').hide();
    $('#mailError').hide();
    $('#submitReg').hide();
    $('#restrationPreloader').show();
  var username = $('#username').val();  
  var surname = $('#surname').val();  
  var email = $('#email').val();  
  var phonenumber = $('#phonenumber').val();  
  phonenumber = '375'+phonenumber;

      var sex = $('input[name=sex]:checked').val();

  var city = $('#city').val();
  var birth_month = $('#birth_мonth :selected').val();
  console.log('da ifa : '+birth_month);
  if(birth_month < 10){
     birth_month = '0'+birth_month;
  }console.log('posle ifa : '+birth_month);
  var birthday = $('#birth_day :selected').val()+'.'+birth_month+'.'+$('#birth_year :selected').val();
  
  var pass = $('#pass').val();
  var passConf = $('#passConf').val();
  $.ajax({
    type: 'POST',
    url: '/registration/index',
    data: {username: username, surname: surname, phonenumber: phonenumber, email: email, sex: sex, city: city, birthday: birthday, pass: pass, passConf: passConf},
    success: function(data){ 
        switch (data) {
            case 'username empty':
               $('#usernameError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'surname empty':
               $('#surnameError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'sex empty':
               $('#sexError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'phone empty':
               $('#phoneError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'city empty':
               $('#cityError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'city empty':
               $('#phoneTaken').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'city empty':
               $('#cityError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'birthday empty':
               $('#birthdayError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'mail taken':
               $('#mailError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'invalid mail':
               $('#mailInvalid').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'pass':
               $('#passError').show();
               $('#submitReg').show();
               $('#restrationPreloader').hide();
               break
            case 'true':
                var pathArray = location.href.split( '/' );
                var protocol = pathArray[0];
                var host = pathArray[2];
                var url = protocol + '//' + host;
                window.location.href = url+'/';
               break
            default:
               console.log(data);
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
       $('#submitReg').prop('disabled', false);
   }else{
       $('#passError').show();
       $('#submitReg').prop('disabled', true);
   }
}


