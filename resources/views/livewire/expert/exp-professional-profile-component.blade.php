<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{ route('profile')}}" class="link">Profile</a></li>
                <li class="item-link"><span>Edit Professional Profile </span></li>

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
            <form class="form-horizontal" wire:submit.prevent="updateProfile">

                        <div class="mb-6 col-8" wire:ignore>
                            <label class=" control-label">Bio </label>
                            <textarea class="form-control" id="bio" placeholder="bio" wire:model="bio"></textarea>
                            @error('bio')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6 col-8">
                            <label class=" control-label"> Price for hour </label>
                            <input type="text" placeholder="Price for hour" class="form-control input-md" wire:model="price"/>
                            @error('price')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        
                        <div class="mb-6 col-8">
                            <label class=" control-label">Category </label>
                            <select class="form-control" wire:model="category_id"> 
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row" style="margin: 10px auto;">
                        <button type="submit"  class="btn btn-primary"  style="display: flex;margin: auto;"> Submit</button>
                    </div>       
            </form>

        </div>
    </div>
</main>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#bio',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data =$('#bio').val();
                        @this.set('bio',sd_data);
                    });
                }
            });

        });
    </script>
@endpush