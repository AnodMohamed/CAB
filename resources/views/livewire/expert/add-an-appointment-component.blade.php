<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{ route('admin.Categories')}}" class="link"><span>Manage Appointments </a></span></li>
                <li class="item-link"><span>Add An Appointment </span></li>
  
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
            <form class="form-horizontal" wire:submit.prevent="storeAppointment">
                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Appointment</label>
                    
                    <div class="col-md-4">
                        
                         <input type='text' class="form-control" id='appointment' wire:model='appointment'/>
                        
                    </div>
                    <div class="mb-6 mt-6 col-8">
                        <button type="submit" class="btn btn-success pull-right"  style="background-color: #7463b3 ; color:#fff"> Submit</button>
                    </div>
                </div>
               
            
            </form>
        </div>
    </div>
  </main>
  @push('scripts')
  <script>
      $(function () {
          $('#appointment').datetimepicker({
              format : 'Y-MM-DD h:m:s',
          })
          .on('dp.change', function (ev) {
              var data = $('#appointment').val();
              @this.set('appointment', data)
          });
      });
  </script>

@endpush