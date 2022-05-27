<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Manage Appointments </span></li>
  
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
                        <th class="">Status</th>
                        <th scope="">Expert Transaction id</th>
                        <th class="">created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td >{{$appointment->id}}</td>
                            <td >{{$appointment->appointment}}</td>
                            <td >{{$appointment->status}}</td>
                   
                            @php
                            $checkreceived =  DB::table('receiveds')->where('appointment_id', $appointment->id )->first();
                            @endphp
        
                            <td>      
                                @if($checkreceived !== Null)
                                {{  $checkreceived->transaction_id }}
                            @else
                               Empty
                            @endif
                            </td>
                            <td >{{$appointment->created_at}}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$appointments->links()}}
            <div class="col-md-12">
                <a href="{{route('expert.addAppointment')}}" class="btn  pull-right"  style="background-color: #7463b3 ; color:#fff">Add category</a>
            </div>
        </div>
    </div>
  </main>
  