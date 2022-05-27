<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Manage Messages </span></li>
  
           </ul>
        </div>
    </div>
    <div class="container">
        <div class="panel-body">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User </th>
                        <th scope="col">Last message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($meesages as $meesage) 
                    <tr>
                         @if ($meesage->receiver != Auth::user()->id)
                        <td>{{ $meesage->receiverUser->name }} </td>
                        @elseif($meesage->sender != Auth::user()->id)
                        <td>{{ $meesage->senderUser->name }} </td>
                        @endif
                        <td>{{ $meesage->message_text }}</td>
                        <td>
                            @if ($meesage->receiver != Auth::user()->id)
                            <a href="{{route('Chat',['user_id'=>$meesage->receiver])}}">
                                view
                             </a>
                            @elseif($meesage->sender != Auth::user()->id)

                            <a href="{{route('Chat',['user_id'=>$meesage->sender])}}">
                                view
                             </a>                                
                            @endif
                           
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>

      
  
        </div>
    </div>
 </main>
  