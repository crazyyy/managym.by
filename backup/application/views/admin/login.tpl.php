<div class="container">
    <form method="post" class="form-signin">
        <h3 class="form-signin-heading">Авторизация</h3>
        <? if ($error): ?>
            <p class="text-error">Проверьте правильность Логина и Пароля</p>
        <? endif; ?>
        <p><input type="text" placeholder="E-mail" name="auth[login]" /></p>
        <p><input type="password" placeholder="Пароль" name="auth[pass]" /></p>
        <p>
            <label class="checkbox">
                <input type="checkbox" name="auth[remember]" /> запомнить
            </label>
        </p>
        <p><input type="submit" value="Авторизоваться" class="btn btn-success"/></p>
    </form>
</div>