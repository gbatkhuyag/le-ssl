<!-- templates/configure.tpl -->

<form method="post">
    <label for="domain"><?php echo $_LANG['domain']; ?></label>
    <input type="text" name="domain" id="domain" required>
    <label for="email"><?php echo $_LANG['email']; ?></label>
    <input type="email" name="email" id="email" required>
    <input type="submit" value="<?php echo $_LANG['issueSSL']; ?>">
</form>
