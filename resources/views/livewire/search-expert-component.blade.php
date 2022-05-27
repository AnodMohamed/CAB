<main id="main" style="padding: 100px 0px;">
    <div class="container">
      <div class="row"> 
        <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Search...." wire:model="searchTerm" style="margin-bottom: 15px;">
        </div>
        <div class="col-md-6">
            <label for="drive_type">  Price  </label>
            <select wire:model="price" name="price" id="price" class="form-control" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title=" price type  is required" style="margin-bottom: 15px;"> 
                <option value="desc"> highest</option>
                <option value="asc"> lowest</option>

        
            </select>
        </div>
        <div class="col-md-6">
            <label class=" control-label">Category </label>
            <select class="form-control" wire:model="category_id"> 
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

        <!--On Sale-->

              
                <div class="wrap-products slide-carousel owl-carousel " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"3"}}'>


                    @foreach ($experts as $expert)
                        <div class="product product-style-2 ">
                            <div class="product-thumnail">
                                @if($expert->user->profile_photo_path == NULL)
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('storage/profile-photos/default-avatar.png') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                @else
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('storage') }}/{{$user->profile_photo_path}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                @endif
                                <div class="group-flash">
                                    @php
                                        $category = DB::table('categories')->where('id',$expert->category_id)->first();
                                    @endphp
                                    <span class="flash-item sale-label">{{$category->name}}</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('viewprofile',['user_id'=>$expert->user_id]) }}" class="product-name"><span>{{$expert->user->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$expert->price}}</span></div>
                            </div>
                        </div>

                    @endforeach

                </div>


      
   	

    </div>

</main>