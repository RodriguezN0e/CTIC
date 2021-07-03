<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="<?=base_url('resources/assets/css/styles.css');?>" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('resources/assets/jquery-toast/dist/jquery.toast.min.css');?>">

  <title>Login</title>
</head>
<body>
  <div class="login-reg-panel">
    <div class="login-info-box">
      <h2>Tienes una cuenta?</h2>
      <p>Have an account?</p>
      <label id="label-register" for="log-reg-show">Login</label>
      <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
    </div>
              
    <div class="register-info-box">
      <h2>No tienes una cuenta?</h2>
      <p>Don't have an account?</p>
      <label id="label-login" for="log-login-show">Register</label>
      <input type="radio" name="active-log-panel" id="log-login-show">
    </div>
              
    <div class="white-panel">
      <div class="login-show">
        <form action="<?=base_url('login/autenticar');?>" method="post">
          <h2>LOGIN</h2>
          <input type="text" placeholder="Email" id="email" name="email">
          <input type="password" placeholder="Password" id="password" name="password">
          <input type="submit" class="btn btn-secondary" value="Login">
        </form>
      </div>
      <div class="register-show">
        <form id="registerForm">
              <span id="message-error" Style="Display:none;"></span>
              <h4>REGISTER</h4>
              <input type="text" placeholder="User" id="name"  name="name" required>
              <span id="name-error"></span>
              <input type="text" placeholder="Email" id="emailuser"  name="emailuser" required>
              <span id="emailuser-error"></span>
              <input type="password" placeholder="Password" id="passworduser"  name="passworduser" required>
              <span id="passworduser-error"></span>
              <input type="password" placeholder="Confirm Password" id="confirmpass"  name="confirmpass" required>
              <span id="confirmpass-error"></span>
              <input type="hidden" placeholder="" id="type"  name="type" value="Administrador">
              <input type="submit" class="btn btn-secondary" value="Register">
        </form>
      </div>
    </div>
  </div>
</body>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="<?=base_url('resources/assets/jquery-toast/dist/jquery.toast.min.js');?>"></script>
<script src="<?=base_url('resources/assets/jquery-toast/dist/toast.js');?>"></script>
<script type="text/javascript">
  $(function(){
      let response = "";
      $(document).on('submit','#registerForm',function(event){
        event.preventDefault();
        clearForm('registerForm');
        _url = "";
        _method = "";
        var _id = $(document).find('#id').val();

        console.info(_id);
        console.info("llego Post");
        _url = "http://localhost/envirmonitoring/index.php/User/api/user";
        _method = "POST";
        _text = 'Los datos fueron guardados correctamente';

        $.ajax({
          url:_url,
          method: _method,
          headers : {
            'X-API-KEY':'QWERTY'
          },
          data: $(document).find("#registerForm").serialize(),
          success : function(_response){
            response= JSON.stringify(_response);
            if(_response.status == "error"){
              $.toast({
              heading: 'Error',
              text: 'llene los campos correctamente',
              position: 'top-right',
              loaderBg:'#ff6849',
               icon: 'error',
               hideAfter: 3500

              });
              console.info('llego errores')

              // Solo si hay error
              if(_response.status == 'error') {
                  // Colocar mensaje en formulario
                  document.querySelector('#message-error').innerText = _response.message;
                  // Recorrer validaciones por clave
                  for(let key in _response.validations) {
                      // Asignar mensaje al span correspondiente
                      document.querySelector(`#${key}-error`).innerText = _response.validations[key];
                  }
              }


              /*$.each(_response.validations, function(key,message){
                 $(document).find('#'+key).addClass('is-invalid').after('<div class="invalid-feedback">'+message+'</div>');
                });*/
            }else{
              $.toast({
               heading: 'Success',
               text: _text,
               position: 'top-right',
               loaderBg:'#74C627',
               icon: 'success',
               hideAfter: 4000,
               stack: 6,
                afterHidden: function () {
                  window.location = "<?=base_url('login');?>";
                },

             });
             clearForm('registerForm');
            }

          },
          error : function(err){
              response= JSON.stringify(err.responseText);
              $(document).find('#responseText').html(
                '<div class="alert alert-success" role="alert">'
                +response+
                '</div>'
              );
              setTimeout(function(){
                  $(document).find('#responseText').html('');
              }, 3000);
          }
        });
      });
    });

  function clearForm(_id){
    $(document).find('#'+_id).find('input,select').each(function(e){
      $(this).removeClass('is-invalid');
      $(this).next('div').remove();
    });
  }
  
  $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
  });


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});
  
</script>
</html>