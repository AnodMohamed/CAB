<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Payment </span></li>
  
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
            <p class="text-center"> the price for one hour is {{ $int_price }}   </p>

            <form   wire:submit.prevent="stripePost"  
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">

               

               {{-----Name on Card-----}}
               <div class="row">
                 <div class="col-md-12 mb-3">
                   <label for="validationTooltip01">Name on Card  </label>
                   <input type="text" class="form-control" id="cardname" placeholder="Name on Card" wire:model="cardname" required>
                   @error('cardname')
                       <div class=" text-danger">
                           {{$message}}
                       </div>
                   @enderror
                  </div>         
               </div>
              
       
       
               {{-----Card Number-----}}
                <div class="row">
                   <div class="col-md-12 mb-3">
                     <label for="validationTooltip01">Card Number </label>
                     <input type="text"  class="form-control" id="cardnumber" placeholder="Card Number" wire:model="cardnumber" required>
                     @error('cardnumber')
                         <div class=" text-danger">
                             {{$message}}
                         </div>
                     @enderror
                    </div>         
               </div>
               
                 {{-----Card CVC-----}}
                 <div class="row">
                   <div class="col-md-12 mb-3">
                   <label for="validationTooltip01">CVC</label>
                     <input type="text"  class="form-control" placeholder='ex. 311'  id="cvc"  wire:model="cvc" required>
                     @error('cvc')
                         <div class=" text-danger">
                             {{$message}}
                         </div>
                     @enderror
                    </div>         
                 </div>
       
                {{----Expiration Month-----}}
                <div class="row">
                   <div class="col-md-12 mb-3">
                       <label for="validationTooltip01">Expiration Month</label>
                     <input type="text" class="form-control" id="nonth" placeholder="MM" wire:model="nonth" required>
                     @error('nonth')
                         <div class=" text-danger">
                             {{$message}}
                         </div>
                     @enderror
                    </div>         
                 </div>
       
       
                 {{-----Expiration Year -----}}
                 <div class="row">
                   <div class="col-md-12 mb-3">
                       <label for="validationTooltip01">Expiration Year</label>
                     <input type="text" size='4' class="form-control" id="year" placeholder="YYYY" wire:model="year" required>
                     @error('year')
                         <div class=" text-danger">
                             {{$message}}
                         </div>
                     @enderror
                    </div>         
                 </div>
                
                 <div class="mb-6 col-8">
                    <label class=" control-label">Appointment </label>
                    <select class="form-control" wire:model="app"> 
                        @foreach ($Appointments as $app)
                            <option value="{{$app->id}}">{{$app->appointment}}</option>
                        @endforeach
                    </select>
                </div>
                @error('app')
                    <div class=" text-danger">
                        {{$message}}
                    </div>
                @enderror
                 <div  class="col-md-12 " style="margin-top:10px; display:block;">
                   <button class="btn btn-primary pull-right " type="submit">Submit form</button>
                 </div>
                
             </form>
        </div>
    </div>
  </main>
  