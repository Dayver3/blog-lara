@include('mainMenu')

    <ul id='menu'>
    
        @foreach($datum as $data)
        
            <li class='menuItem'>
                <a href='/theme?id={{$data->post_id}}'>
                    {{$data->postTitle}}
                </a>
            </li>
        @endforeach
    </ul>
