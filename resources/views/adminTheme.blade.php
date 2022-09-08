@include('adminMainMenu')
<ul id='menu'>
    @csrf
    Тема:
    <li><a> {{$datum[0]->postTitle}} <br> </a></li>
    Пост:
    <li><a>{{$datum[0]->postText}}<br></a></li>
    Время:
    <li><a>{{$datum[0]->created_at}}<br></a></li>
    <form action='/comment/?post_id={{$datum[0]->post_id}}' method='post'>
        <button type='submit'>коментировать</button>
    </form>

    @foreach($comDatum  as $comData)
        <div style='margin-left: {{$comData->level*25}}px'> {{$comData->commentText}}<br>{{$comData->created_at}}</div>
        @csrf
        <label>
            <form action='/change?comment_id={{$comData->comment_id}}' method='post'>
                @csrf
                <button type='submit'>изменить</button>
            </form>
        </label>
        <label>
            <form action='/delete/comment?comment_id={{$comData->comment_id}}' method='post' name="fuckme">
                @csrf
                <button type='submit'>удалить</button>
            </form>
        </label>
    <label>
        <form action='/comment/?post_id={{$comData->post_id}}&parents_com_id={{$comData->comment_id}}' method='post'>
            <button type='submit'>коментировать</button>
        </form>
    </label>


    @endforeach
</ul>
