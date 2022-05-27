
	<!--main area-->
	<main id="main" class="main-site" style="padding: 100px 0px;">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Profile</span></li>
				</ul>
			</div>
		</div>
		
		<div class="container">
			<!-- <div class="main-content-area"> -->
				<div class="aboutus-info style-center">
                    <div class="team-member equal-elem">
                        <div class="media">
                            @if($user->profile_photo_path == NULL)
                                <img src="{{ asset('storage/profile-photos/avatar.png') }}"  style="width: 233px; height:233px; ">
                            @else
                                <img src="{{ asset('storage') }}/{{$user->profile_photo_path}}" style="width: 233px; height:233px; ">
                            @endif
                        </div>
                        <div class="info">
                            <b class="box-title">{{$user->name}} </b>
                            <b class="box-title">{{$user->email}} </b>
                            @if($user->utype == "EXP" )
                                @php
                                    $profile = DB::table('profiles')->where('user_id',$user->id)->first();
                                @endphp
                                @if ($profile != '')
                                        <b class="name">price</b>
                                        <span class="title">{{$user->profile->price}}</span>
                                        <br>
                                        <b class="name">featured</b>
                                        <span class="title"></span>
                                        <p class="desc">
                                            @if ($user->profile->featured == "0")
                                                Inactive
                                            @elseif ($user->profile->featured == "1")
                                                Active
                                            @elseif ($user->profile->featured == "2")
                                                Rejected
                                            @endif
                                        </p>
                                        @php
                                            $category = DB::table('categories')->where('id',$profile->category_id)->first();
                                        @endphp
                                        <b class="name">Category</b>
                                        <span class="title">{{$category->name}}</span>
                                        
                                @endif    
                            @endif
                        </div>
                        @if($user->utype == "EXP")
                            @if ($profile != '')
                                <p class="txt-content">
                                    {{$user->profile->bio}}
                                </p>
                            @endif
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <table class="table">
                            <tbody>
                                
                            @foreach ($userfills as $userfill)
                              <tr>
                                <td>{{$userfill->title}}</td>
                                <td>                                           
                                    <a herf="" onclick="confirm('Are you sure, You want to delete {{$userfill->title}} file') || event.stopImmediatePropagation()"  wire:click.prevent="deleteFile({{$userfill->id}})" style="margin-left:10px "> 
                                      <i class="fa fa-times fa-2x text-danger"> </i>
                                    </a>
                                </td>
                                <td>                                           
                                    <a herf="" onclick="confirm('Are you sure, You want to download {{$userfill->title}} file') || event.stopImmediatePropagation()"  wire:click.prevent="download({{$userfill->id}})" style="margin-left:10px "> 
                                      <i class="fa fa-download fa-2x text-primary"> </i>
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                          </table>
                        <div class="row">
                            @if (Auth::user()->utype === "EXP")
                                <a href="{{ route('expert.profile.uploadeFile') }}" class="btn btn-info">Upload file</a>
                                <a href="{{ route('expert.profile.professional') }}" class="btn btn-primary">Edit professional profile</a>
                            @endif
                            <a href="{{ route('profile.show') }}" class="btn btn-success" >Edit profile</a>
                            
                        </div>
                    </div>
                    
				</div>
			<!-- </div> -->
			

		</div><!--end container-->

	</main>
	<!--main area-->
