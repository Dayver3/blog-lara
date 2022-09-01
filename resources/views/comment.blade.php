
<form action='/comment?post_id={{$data['post_id']}}&parents_com_id={{$data['parents_com_id']}}' method='post'>
    @csrf
    <label for="comment">
        Коментарий:
    </label><br/>
    <textarea id="comment" name="commentText" cols="50" rows="5"> </textarea>
    <button type="submit">
        отправить
    </button>
</form>
