<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>View Reviews  </span></li>
  
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
                        <th class="">Asker </th>
                        <th class="">Appointment ID</th>
                        <th class="">Content</th>
                        <th class="">created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td >{{$review->id}}</td>
                            <td >{{$review->asker->name}}</td>
                            <td >{{$review->appointment_id}}</td>
                            <td >{!!$review->content!!}</td>
                            <td >{{$review->created_at}}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$reviews->links()}}
            <div class="col-md-12">
                {{-----
                <a href="{{route('expert.addAppointment')}}" class="btn  pull-right"  style="background-color: #7463b3 ; color:#fff">Add category</a>
                -----}}
            </div>
        </div>
    </div>
  </main>
  