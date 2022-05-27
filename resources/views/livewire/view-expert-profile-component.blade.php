
	<!--main area-->
	<main id="main" class="main-site" style="padding: 100px 0px;">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
                    <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
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
                                <img src="{{ asset('storage/profile-photos/default-avatar.png') }}"  style="width: 233px; height:233px;  display: flex;  margin: auto;">
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
                        @if(Route::has('login'))
                            @auth
                                @if(Auth::user()->utype == 'ASK')
                                <div class="mb-6 mt-6 col-8">
                                    <a href="{{ route('Chat',['user_id'=>$user->id ]) }}" class="btn btn-success pull-center"  style="background-color: #7463b3 ; color:#fff"> Submit</a>
                                </div>



                                @endif
                            @endauth
                        @endif
                    </div>
                    
				</div>
			<!-- </div> -->
			
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th class="">Asker </th>
                        <th class="">Content</th>
                        <th class="">created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td >{{$review->id}}</td>
                            <td >{{$review->asker->name}}</td>
                            <td >{!!$review->content!!}</td>
                            <td >{{$review->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


		</div><!--end container-->

	</main>
	<!--main area-->

