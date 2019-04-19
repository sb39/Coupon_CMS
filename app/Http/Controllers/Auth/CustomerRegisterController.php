<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// use App\User;
// use Validator;
// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Http\Request;
use DB;
use Mail;

class CustomerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/customer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }


      public function showRegistrationForm()
    {
        return view('auth.customer-register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request) {
        $input = $request->all();
        $validator = $this->validator($input);
  
        if ($validator->passes()){
          $user = $this->create($input)->toArray();
          $user['link'] = str_random(30);
  
          DB::table('customer_activation')->insert(['id_user'=>$user['id'],'token'=>$user['link']]);
  
          Mail::send('emails.activation', $user, function($message) use ($user){
            $message->to($user['email']);
            $message->subject('tester - A/C Activation Confirmation');
          });
          return redirect()->route('customer.login')->with('success',"We sent activation code. Please check your mail.");
        }
        return back()->with('errors',$validator->errors());
      }
  
      public function customerActivation($token){
        $check = DB::table('customer_activation')->where('token',$token)->first();
        if(!is_null($check)){
          $user = Customer::find($check->id_user);
          if ($user->is_activated ==1){
            return redirect()->route('customer.login')->with('success',"user are already actived.");
  
          }
          $user->update(['is_activated' => 1]);
          DB::table('customer_activation')->where('token',$token)->delete();
          return redirect()->route('customer.login')->with('success',"user active successfully.");
        }
        return redirect()->route('customer.login')->with('Warning',"your token is invalid");
      }
}
