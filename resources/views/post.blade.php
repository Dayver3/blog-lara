@include('mainMenu')
<form action="/post" method="post">
    @csrf
    Тема:<br/>
    <input type="text" name="postTitle"/><br/>
    Пост:<br/>
    <textarea name="postText" cols="50" rows="5"></textarea><br />
    <button type="submit">
        Запостить
    </button>
</form>
