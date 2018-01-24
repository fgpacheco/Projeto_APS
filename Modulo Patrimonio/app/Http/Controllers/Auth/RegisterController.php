<?php
namespace web\Http\Controllers\Auth;
use web\User;
use web\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/index';
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
        $regras = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
        /*
        $mensagens = [
            'unique' => 'Já existe um usuario com este email.',
            'confirmed' => 'A confirmação da senha não corresponde.',
            'string' => 'Caracter invalido.',
            'min:6' => 'A senha deve conter pelo menos 6 caracteres',
            'max:255' => 'Numero maximo atingido.',
        ];
         * 
         */
        return Validator::make($data,$regras);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \web\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}