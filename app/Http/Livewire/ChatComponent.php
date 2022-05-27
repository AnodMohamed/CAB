<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatComponent extends Component
{
    public $messageText;
    public $created_at;
    public $user_id;
    public $endDeal;
    public $massege_code;
    public $ChechMessagecode;
    public $Status;


    public function mount($user_id)
    {
        $this->user_id=$user_id;
        $user = User::where('id', $user_id)->first();
        
        //check massege_code
        $check  = Message::query()
        
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

        $this->ChechMessagecode = $check->massege_code ;

       // $checkappontimentstatus = Null;
  
        if($check != ""){
           // $checkappontimentstatus =Appointment::where('chat_code',$check->massege_code)->where('status','Happening now')->count();
           // if( $checkappontimentstatus == '0' ){
              
           // }
        }

     
    }

    public function sendMessage()
    {
        $user_id = $this->user_id;

        //check massege_code
        $check  = Message::query()
                
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

        if($check != ""){
            $checkappontimentstatusreserved =Appointment::where('chat_code',$check->massege_code)->where('status','Reserved')->count();
            $checkappontimentstatusHappeningnow = Appointment::where('chat_code',$check->massege_code)->where('status','Happening now')->count();
            $checkappontimentstatusDone = Appointment::where('chat_code',$check->massege_code)->where('status','Done')->count();

        }
        if($check == ""){
            $this->massege_code = time();
            //because index start from zero 
        }elseif($check->count() > '2' && Auth::user()->utype == 'ASK' && $checkappontimentstatusreserved > '0'){

            return redirect()->route('asker.alert');

        }elseif($check->count() > '2' && Auth::user()->utype == 'ASK'  && $checkappontimentstatusreserved == '0' &&  $checkappontimentstatusHappeningnow  == '0'){
            //return redirect()->route('asker.appointment')->with( ['user_id' => $user_id] );
            return redirect()->route('asker.appointment',['user_id' => $user_id],['massege_code'=> $this->massege_code]);
        
        }elseif($check->count() > '2' && Auth::user()->utype == 'EXP'  &&  $checkappontimentstatusHappeningnow  == '0'){

            return redirect()->route('expert.notification');
        }else{
            $this->massege_code = $check->massege_code;

        }
       

     
        
        $check  = Message::query()
                
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

            $message = new Message();
            $message->sender = Auth::user()->id;  
            $message->message_text = $this->messageText;  
            $message->massege_code = $this->massege_code;  
            $message->receiver = $this->user_id;  
            $message->save();
            $this->reset('messageText');



            

    }



    public function render()
    {         
        $user_id = $this->user_id;
        $messages  = Message::query()
        
        ->where(function($query) use ($user_id) {
            $query->where('receiver', $user_id)
                    ->where('sender', Auth::user()->id);
        })


        ->orwhere(function($query) use ($user_id) {
                $query->where('sender', $user_id)
                    ->where('receiver', Auth::user()->id);
        })
        ->get();

        
        $currentDateTime = Carbon::now('GMT+3');
        $nextHour =Carbon::now('GMT+3')->addHour();
       if($this->ChechMessagecode != "" )
        {
            $checkTheAppointemnt = Appointment::where('chat_code',$this->ChechMessagecode)
            ->whereBetween('appointment', [now('GMT+3')->format('Y-m-d H:00:00'), now('GMT+3')->addHours(1)->format('Y-m-d H:00:00')])
            ->where('status','Reserved')->first();

            if($checkTheAppointemnt != Null){
                $checkTheAppointemnt->status = 'Happening now';
                $checkTheAppointemnt->save();

            }
           $checkTheAppointemntStatus = Appointment::where('chat_code',$this->ChechMessagecode )->where('status','Happening now')->first();
           if($checkTheAppointemntStatus  != Null){

                if($checkTheAppointemntStatus->end_time <  $currentDateTime)
                {
                    $checkTheAppointemntStatus->status = 'Done';
                    $checkTheAppointemntStatus->save();

                }
                
           }
        }
       




        return view('livewire.chat-component',['messages'=>$messages,'currentDateTime'=>$currentDateTime])->layout('layouts.base');
    }
}
