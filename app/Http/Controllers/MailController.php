<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    public $first_name = '';
    public $email = '';
    public $message= '';
    public function saveMessage(){
        Message::create([
            'first_name' =>$this->first_name,
            'email' =>$this->email,
            'message' =>$this->message,
        ]);
    
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('your_email@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}