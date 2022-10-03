@include('adminMainMenu')
<ul id='menu'>

    @foreach($datum as $data)
        <li class='menuItem'>
            <a href='/adminTheme?id={{$data->post_id}}'>
                {{$data->postTitle}}
            </a>
        </li>
    @endforeach
</ul>
