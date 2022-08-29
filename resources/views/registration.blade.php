<form action="/registration" method="post">
    @csrf
    Логин:<br/>
    <input type="text" name="login"/><br/>
    Пароль:<br/>
    <input type="text" name="password"/><br/>
    Никнейм:<br/>
    <input type="text" name="nickname"/><br/>
    E-mail:<br/>
    <input type = "text" name="email"/><br/>
    Адрес:<br/>
    <input type="text" name="address"/><br/>
    Адрес:<br/>
    <input type="text" name="phone_number"/><br/>
    <button type="submit">
        Registration
    </button>
</form>
