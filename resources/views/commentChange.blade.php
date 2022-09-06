<form action='/change?comment_id={{$data['comment_id']}}' method='post'>
    @csrf
    <label for="comment">
        Коментарий:
    </label><br/>
    <textarea id="comment" name="commentText" cols="50" rows="5"> </textarea>
    <button type="submit">
        отправить
    </button>
</form>

