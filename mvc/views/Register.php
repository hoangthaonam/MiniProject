<div class="col-sm-4 col-sm-offset-4">
  <form action="./Register/signUp" method="POST">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" id="username">
      <div id="alert_username">
      </div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="pwd">Re Password:</label>
      <input type="password" class="form-control" name="re_password" id="re_password">
      <div id="alert_password">
      </div>
    </div>
      <button type="submit" class="btn btn-primary pull-right" name="submit">Sign Up</button>
  </form>
</div>
<script>
    $(document).ready(function(){
        $("#username").keyup(function(){
            let username = $(this).val();
            $.post("http://localhost/Intern/MiniProject/Register/validateUsername",{username:username},function(data){
                $("#alert_username").html(data);
            })
        });
        $("#re_password").keyup(function(){
            let password = $("#password").val();
            let re_password = $(this).val();
            $.post("http://localhost/Intern/MiniProject/Register/validatePassword",{password:password, re_password:re_password},function(data){
                $("#alert_password").html(data);
            })
        })
    });
</script>
