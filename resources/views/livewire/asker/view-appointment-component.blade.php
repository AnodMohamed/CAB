<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>View Appointments </span></li>
  
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
                        <th>Id</th>
                        <th class="">Appointment </th>
                        <th class="">Expert </th>
                        <th class="">Transaction id</th>
                        <th class="">Status</th>
                        <th class="">created at</th>
                        <th class="">view</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td >{{$appointment->id}}</td>
                            <th >{{$appointment->apppintment->appointment}}</th>
                            <td >{{$appointment->expert->name}}</td>
                            <td >{{$appointment->transaction_id}}</td>
                            <th >{{$appointment->apppintment->status}}</th>
                            <td >{{$appointment->created_at}}</td>
                            <td>
                                <a href="{{route('Chat',['user_id'=>$appointment->expert_id])}}">
                                    View
                                </a>  
                                <a href="{{route('asker.review',['app_id'=>$appointment->id])}}">
                                    Write review
                                </a>       
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$appointments->links()}}
           
        </div>
    </div>
  </main>
  