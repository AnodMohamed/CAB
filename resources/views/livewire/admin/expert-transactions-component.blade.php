<div class="container"  style="padding: 100px 0px;">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Manage Experts </span></li>

            </ul>
        </div>
    </div>
     @if (Session::has('message'))
      <div class="alert alert-success" role="alert">
          {{Session::get('message')}}
      </div>
      @endif

     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Appointment id</th>
            <th scope="col">Amount</th>
            <th scope="col">Transaction id</th>
            <th scope="col">Expert</th>
            <th scope="col">Asker</th>
            <th scope="col">Expert Transaction id</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>

          @foreach ($transactioos as $transactioo)
          <tr>
            <th scope="row">{{  $transactioo->id  }}</th>
            <td> 
                {{  $transactioo->appointment_id  }}
            </td>
            <td>{{  $transactioo->amount  }}</td>
            <td>{{  $transactioo->transaction_id }}</td>
            <td>
                {{  $transactioo->expert->name }}
            </td>
               
            <td>                                           
                {{  $transactioo->asker->name }}
            </td>
                 @php
                    $checkreceived =  DB::table('receiveds')->where('appointment_id', $transactioo->appointment_id )->first();
                @endphp

            <td>      
                @if($checkreceived !== Null)
           
                    {{  $checkreceived->transaction_id }}
                @else

                    Empty
                @endif
            </td>
            <td>     
                
                @if($checkreceived == Null)
                    <a href="{{ route('admin.addTransaction',['appointment_id'=>$transactioo->appointment_id ]) }}" >Add expert's transaction </a>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>

</div>
