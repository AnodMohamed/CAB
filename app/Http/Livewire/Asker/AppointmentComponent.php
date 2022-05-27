<?php

namespace App\Http\Livewire\Asker;

use App\Models\Appointment;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppointmentComponent extends Component
{
    
    public $cardname;
    public $cardnumber;
    public $cvc;
    public $nonth;
    public $year;
    public $massege_code;
    public $Appointments;
    public $app;
    public $user_id;
    public $appointments_id;
    public $regular_price;
    public $int_price;

    //public $ad_id;
    //public $period;
    //public $regular_price;
    //public $int_price;

    public function mount($user_id)
    {
        $this->user_id=$user_id;
        $Appointments = Appointment::where('expert_id', $user_id)->where('status','Available')->get();
        //$this->appointments_id = $Appointments->id;
        $this->Appointments = $Appointments;
        //check massege_code
        $getMessagecode  = Message::query()
                
        ->where(function($query) use ($user_id) {
            $query->where('receiver', $user_id)
                    ->where('sender', Auth::user()->id)
                    ->orderBy('created_at', 'DESC');
        })


        ->orwhere(function($query) use ($user_id) {
                $query->where('sender', $user_id)
                    ->where('receiver', Auth::user()->id)
                    ->orderBy('created_at', 'DESC');
        })
        ->first();
        $this->massege_code = $getMessagecode->massege_code;

        $getExpertPrice =Profile::where('user_id',$user_id)->first();
       
        $this->int_price=(int)$getExpertPrice->price;

    }
    public function updated($fields)
    {   
        //the user will see the validation live before submit
        $this->validateOnly($fields,[

            'cardname' => ['required','string'],
            'cardnumber'=> ['required', 'numeric' ,'digits:16'],
            'cvc' => [ 'required', 'numeric' ,'digits:3'],
            'nonth' => [ 'required', 'numeric' ,'digits:2', 'max:12'],
            'year' => [ 'required', 'numeric' ,'digits:4', 'min:'.(date('Y'))],
            'app' => ['required'],

        ]);

        
    }


    public function stripePost()
    {
        
        $this->validate([
            'cardname' => ['required','string'],
            'cardnumber'=> ['required', 'numeric' ,'digits:16'],
            'cvc' => [ 'required', 'numeric' ,'digits:3'],
            'nonth' => [ 'required', 'numeric' ,'digits:2', 'min:1', 'max:12'],
            'year' => [ 'required', 'numeric' ,'digits:4', 'min:'.(date('Y'))],
            'app' => ['required'],

        ]);
        
        $appointment = Appointment::find($this->app);
        $appointment->status = 'Reserved';
        $appointment->chat_code =  $this->massege_code;
        $appointment->save();

         //add STRIPE_SECRET 
         $stripe = new  \Stripe\StripeClient(env('STRIPE_SECRET'));


         //add customer detials
         
         $customer = $stripe->customers->create([
             'source' => 'tok_mastercard',
             "email" => Auth::user()->email,
         ]);
         //add card detials
         $stripe->tokens->create([
 
             'card' => [
             'name'=>$this->cardname,
             'number' =>$this->cardnumber,
             'exp_month' =>$this->nonth,
             'exp_year' =>$this->year,
             'cvc' => $this->year,
             ],
 
         ]);
 
         //send data to stripe
        $intent =  $stripe->paymentIntents->create([
             'amount'=> $this->int_price.'00',
             'currency' => 'usd',
             'payment_method_types' => ['card'],
             'payment_method' => 'pm_card_visa',
             'customer'=> $customer,
             'confirm' => true,
         ]);
        
        // check if status is success
         $paymentStatus = json_decode($this->generateResponse($intent),true);
 
         
         if ($paymentStatus['success'] === true) {
            
             if ($customer) {
 
                 //$date = new Date('today');
                // $currentDateTime = Carbon::now()->format('Y-m-d');
                // $newDateTime = Carbon::now()->addDay($this->period)->format('Y-m-d');                
               
             
                 //add Transaction detials to database
                 $transaction = new Transaction();
                 $transaction->appointment_id = $this->app;
                 $transaction->amount =  $this->int_price;
                 $transaction->currency = 'usd';
                 $transaction->status ='payed';
                 $transaction->asker_id =Auth::user()->id;
                 $transaction->expert_id = $this->user_id;
                 $transaction->transaction_id = $customer->id;

                 $transaction->save();
                 
     
             }
              
             //send message to user
             session()->flash('message','The Appointment has been selected successfully!');
             return redirect()->route('user.Messeges');
            
             
        }
        
    }

    public function generateResponse($intent) {
        if ($intent->status == 'succeeded') {
          // Handle post-payment fulfillment
          return json_encode(['success' => true]);
        } else {
          // Any other status would be unexpected, so error
          return json_encode(['error' => 'Invalid PaymentIntent status']);
        }
    }
    public function render()
    {

        return view('livewire.asker.appointment-component')->layout('layouts.base');
    }
}
