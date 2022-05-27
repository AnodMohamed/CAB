<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{ route('asker.appointments')}}" class="link"><span> View Appointments </a></span></li>
                <li class="item-link"><span>Add Review </span></li>
  
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
            <form class="form-horizontal" wire:submit.prevent="storeReview">

                <div class="mb-6 col-8" wire:ignore>
                    <label class=" control-label">Content </label>
                    <textarea class="form-control" id="content" placeholder="content" wire:model="content"></textarea>
                    @error('content')
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
  @push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#content',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data =$('#content').val();
                        @this.set('content',sd_data);
                    });
                }
            });

        });
    </script>
@endpush
  