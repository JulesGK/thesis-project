<form action="includes/signup-inc.php" class="signup-form" method="POST">
    <h5 class="signup-heading">Sign Up</h5>
    <div class="form-group">
        <label for="username-inp">UserName</label>
        <input type="text" class="username-inp" id="username-inp" name="username" required>
    </div>

    <div class="form-group">
        <label for="email-inp">Email</label>
        <input type="email" class="email-inp" id="email-inp" name="email" required>
    </div>

    <div class="form-group">
        <label for="pwd-inp">Password</label>
        <input type="password" class="pwd-inp" id="pwd-inp" name="pwd" required>
    </div>

    <div class="form-group">
        <label for="pwdRepeat-inp">Repeat Password</label>
        <input type="password" class="pwdRepeat-inp" id="pwdRepeat-inp" name="pwdRepeat" required>
    </div>

    <button class="signup-btn btn-primary" name="submit" value="submit">Sign Up</button>
  <div class="res-msg-container"></div>
</form>

