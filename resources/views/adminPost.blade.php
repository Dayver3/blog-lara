@include('adminMainMenu')
<form action="/adminPost" method="post">
    @csrf
    Тема:<br/>
    <input type="text" name="postTitle"/><br/>
    Пост:<br/>
    <textarea name="postText" cols="50" rows="5"></textarea><br />
    <button type="submit">
        adm post
    </button>
</form>
