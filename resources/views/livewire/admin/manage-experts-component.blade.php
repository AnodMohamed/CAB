<div class="container"  style="padding: 40px 0;">
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
      <div class="col-md-4">
        <input type="text" class="form-control" placeholder="Search...." wire:model="searchTerm">
      </div>
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">User</th>
            <th scope="col">Email</th>
            <th scope="col">Featured</th>
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
                    @if ($user->profile->featured == "0")
                        Inactive
                    @elseif ($user->profile->featured == "1")
                        Active
                    @elseif ($user->profile->featured == "2")
                        Rejected
                    @endif

            </td>

            <td> 
            <div class="relative w-1/6">

          </div>
            </td>
            <td>                                           
              <a herf=""  class="btn btn-danger" onclick="confirm('Are you sure, You want to delete {{$user->name}} user') || event.stopImmediatePropagation()"  wire:click.prevent="deleteUser({{$user->id}})" style="margin-left:10px ">Delete</a>
              <a href="{{ route('admin.Experts.ExpertProfessionalProfile',['user_id'=>$user->id ]) }}" class="btn btn-info">More detiles </a>
              <a href="{{ route('admin.Experts.ChangeExpertStatus',['user_id'=>$user->id ]) }}" class="btn btn-success">Change status </a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>

</div>
