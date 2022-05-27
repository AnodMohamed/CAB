<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{ route('admin.Categories')}}" class="link"><span>Manage Categories </a></span></li>
                <li class="item-link"><span>Add Category </span></li>
  
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
            <form class="form-horizontal" wire:submit.prevent="storeCategory">

                <div class="mb-6 col-8">
                    <label class=" control-label">Category Name</label>
                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup=" generaleslug"/>
                     @error('name')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                 </div>
               
                 <div class="mb-6 col-8">
                     <label class=" control-label">Category Slug</label>
                     <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug"/>
                     @error('slug')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                 </div>
                 <div class="mb-6 mt-6 col-8">
                     <button type="submit" class="btn btn-success pull-right"  style="background-color: #7463b3 ; color:#fff"> Submit</button>
                 </div>
            </form>
        </div>
    </div>
  </main>
  