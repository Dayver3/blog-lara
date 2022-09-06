@include('adminMainMenu')
<form action="/adminRegistration" method="post">
    @csrf
    E-mail:<br/>
    <input type = "text" name="email"/><br/>
    Пароль:<br/>
    <input type="text" name="password"/><br/>
    Никнейм:<br/>
    <input type="text" name="nickname"/><br/>
    Адрес:<br/>
    <input type="text" name="address"/><br/>
    phone number:<br/>
    <input type="text" name="phone_number"/><br/>
    <button type="submit">
        admin reg
    </button>
</form>
