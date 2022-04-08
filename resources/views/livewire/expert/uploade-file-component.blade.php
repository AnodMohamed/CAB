<main id="main" class="main-site">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{ route('profile')}}" class="link">Profile</a></li>
                <li class="item-link"><span>Uplode File  </span></li>

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
            <form class="form-horizontal"  id="form-upload" wire:submit.prevent="fileUpload" enctype="multipart/form-data">
                        <div class="mb-6 col-8" >
                            <label class=" control-label">Title </label>
                            <input class="form-control" id="title" placeholder="title" name="title" wire:model="title">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6 col-8">
                            <label class=" control-label"> File </label>
                           {{---  <input type="file" placeholder="File" class="form-control" wire:model="file_path"/>  ---}} 
                            <input type="file" class="form-control" name="file_path"  wire:model="file_path">

                            @error('file_path')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    <div class="row" style="margin: 10px auto;">
                        <button type="submit"  class="btn btn-primary"  style="display: flex;margin: auto;"> Submit</button>
                    </div>       
            </form>

        </div>
    </div>
</main>
