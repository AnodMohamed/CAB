
	<!--main area-->
	<main id="main" class="main-site" style="padding: 100px 0px;">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
                    <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                    <li class="item-link"><a href="{{ route('admin.Experts') }}" class="link">Manage Experts </a></li>
					<li class="item-link"><span> Expert Profile</span></li>
				</ul>
			</div>
		</div>
		
		<div class="container">
			<!-- <div class="main-content-area"> -->
				<div class="aboutus-info style-center">
                    <div class="team-member equal-elem">
                        <div class="media ">
                            @if($user->profile_photo_path == NULL)
                                <img src="{{ asset('storage/profile-photos/avatar.png') }}"  style="width: 233px; height:233px;  display: flex;  margin: auto;">
                            @else
                                <img src="{{ asset('storage') }}/{{$user->profile_photo_path}}" style="width: 233px; height:233px; display: flex;  margin: auto;">
                            @endif
                        </div>
                        <div class="info">
                            <b class="box-title">{{$user->name}} </b>
                            <b class="box-title">{{$user->email}} </b>
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
                        </div>
                        <p class="txt-content">
                            {!!$user->profile->bio!!}
                        </p>

                        <table class="table">
                            <tbody>
                                
                            @foreach ($userfills as $userfill)
                              <tr>
                                <td>{{$userfill->title}}</td>

                                <td>                                           
                                    <a herf="" onclick="confirm('Are you sure, You want to download {{$userfill->title}} file') || event.stopImmediatePropagation()"  wire:click.prevent="download({{$userfill->id}})" style="margin-left:10px "> 
                                      <i class="fa fa-download fa-2x text-primary"> </i>
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                          </table>

                    </div>
                    
				</div>
			<!-- </div> -->
			

		</div><!--end container-->

	</main>
	<!--main area-->

