<form class="form-inline" method="post">
    <input type="text" name="mail" class="input-small" placeholder="Email">
    <input type="password" name="pass" class="input-small" placeholder="Password">
    <button type="submit" class="btn">Sign in</button>
    <span class="help-inline"><?=@$this->error?></span>
</form>
