@include('mainMenu')
<form action="/adminLogin" method="post">
    @csrf
    Логин:<br/>
    <input type="text" name="email"/><br/>
    Пароль:<br/>
    <input type="text" name="password"/><br/>
    <button type="submit">
        push
    </button>
</form>
