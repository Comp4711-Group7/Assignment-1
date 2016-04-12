<hr>
<div>
  <div class="reg-form">
    <form name="login" class="form-horizontal" action='/auth/submit' method="POST">
      <fieldset>
        <div class="control-group">
          <!-- Username -->
          <label class="control-label"  for="username">Username</label>
          <div class="controls">
            <input type="text" id="username" name="userid" placeholder="" class="input-xlarge">
          </div>
        </div>
        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="password" id="password" name="password"  class="input-xlarge">
          </div>
        </div>
        <br>
        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button type="submit" name="submitButton" class="btn btn-success" value="submit">Login</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>

