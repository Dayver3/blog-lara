<form action='/Comment?id=$data->post_id&com_id=$com_id' method='post'>
    <label for="comment">
        Коментарий:
    </label><br/>
    <textarea id="comment" name="comment" cols="50" rows="5"> </textarea>
    <button type="submit">
        отправить
    </button>
</form>
