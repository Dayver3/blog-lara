<ul id='menu'>
    @foreach($datum as $data)
        Тема:
        <li><a> {{$data->postTitle}} <br> </a></li>
        Пост:
        <li><a>{{$data->postText}}<br></a></li>
        Время:
        <li><a>{{$data->created_at}}<br></a></li>
        <form action='/comment/?id={{$data->post_id}}' method='post'>
            <button type='submit'>коментировать</button></form>
    @endforeach
</ul>
