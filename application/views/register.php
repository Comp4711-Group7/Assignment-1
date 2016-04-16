<hr>
<div>
  <div class="reg-form">
      <?php echo validation_errors(); ?>
    <form class="form-horizontal" enctype="multipart/form-data" action='/auth/registration' method="POST">
      <fieldset>
        <div class="control-group">
          <!-- Username -->
          <label class="control-label"  for="username">Username</label>
          <div class="controls">
            <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
          </div>
        </div>
        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="avatar">Avatar</label>
          <div class="controls">
            <input type="file" id="avatar" name="avatar"  accept="image/*">
          </div>
        </div>
        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
          </div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <label class="control-label"  for="password_confirm">Password (Confirm)</label>
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
          </div>
        </div>
        <br>
        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button type="submit" name="submitButton" class="btn btn-success" value="submit">Register</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>

