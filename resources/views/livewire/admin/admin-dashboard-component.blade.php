<div class="container"  style="padding: 100px 0px;">
    <div class="container">
      <div class="wrap-breadcrumb">
          <ul>
              <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
              <li class="item-link"><span>Manage askers </span></li>
  
          </ul>
      </div>
    </div>
       @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Search...." wire:model="searchTerm">
        </div>
       <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           
            @foreach ($users as $user)
            <tr>
              <th scope="row">{{  $user->id  }}</th>
              <td> 
                @if($user->profile_photo_path == NULL)
                  <img src="{{ asset('storage/profile-photos/avatar.png') }}" style="width: 60px; hight:60px;">
                @else
                    <img src="{{ asset('storage') }}/{{$user->profile_photo_path}}" style="width: 60px; hight:60px;">
                @endif
              </td>
              <td>{{  $user->name  }}</td>
              <td>{{  $user->email }}</td>
              <td>                                           
                <a herf="" onclick="confirm('Are you sure, You want to delete {{$user->name}} user') || event.stopImmediatePropagation()"  wire:click.prevent="deleteUser({{$user->id}})" style="margin-left:10px "> 
                  <i class="fa fa-times fa-2x text-danger"> </i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
  
  </div>
  