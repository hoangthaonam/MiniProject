<div class="col-sm-4 col-sm-offset-4">
  <form action="./Login/verify" method="POST">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" id="username"
        <?php if(isset($_COOKIE["username"])) echo 'value="'.$_COOKIE["username"].'"'; ?>>
      <div id="alert_username">
      </div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="password" 
        <?php if(isset($_COOKIE["password"])) echo 'value="'.$_COOKIE["password"].'"'; ?>>
      <div id="alert_password">
      </div>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
      <button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>
    </div>
  </form>
</div>
<script>
  $(document).ready(function(){
    $('#username').keyup(function(){
      let username = $(this).val();
      $.post('http://localhost/Intern/MiniProject/Login/validateLogin',{username:username},function(data){
        $('#alert_username').html(data);
      });
    });
    $('password').change(function(){
      let password = $(this).val();
      $.post('http://localhost/Intern/MiniProject/Login/validateLogin',{password:password},function(data){
        $('#alert_password').html(data);
      });
    });
  });
</script>
