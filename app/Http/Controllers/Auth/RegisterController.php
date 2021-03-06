<?php

namespace App\Http\Controllers\Auth;

use App\Activity;
use App\Image;
use App\User;
use App\Http\Controllers\Controller;
use App\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;

class RegisterController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => 'required|between:6,255|confirmed',
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
        $this->validator($data)->validate();

        $userInfoId = UserInfo::create([
            'country' => $data['country'],
            'city' => $data['city'],
            'skype' => $data['skype'],
            'vk_id' => $data['vk_id'],
            'instagram_id' => $data['instagram_id'],
            'facebook_id' => $data['facebook_id'],
            'twitter_id' => $data['twitter_id'],
        ])->id;

        $user = User::create([
            'email' => $data['email'],
            'email_token' => base64_encode($data['email']),
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone_number' => $data['phone_number'],
            'birthday' => $data['birthday'],
            'user_info_id' => $userInfoId
        ]);

        $image = Image::create([
            'path' => Image::setMainPhoto($data['user_main_photo'], 'users', $user->id),
        ]);

        $user->images()->attach($image->id, array('is_main' => 1, 'relationship_id' => 1));

        Activity::create([
            'text' => 'Регистрация',
            'user_id' => $user->id,
            'type_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        return view('users.profile.verification');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        $user->is_confirmed = 1;
        if ($user->save()) {
            return view('users.emailconfirm', ['user' => $user]);
        }
    }
}
