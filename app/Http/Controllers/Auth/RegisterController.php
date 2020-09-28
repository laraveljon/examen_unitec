<?php

namespace App\Http\Controllers\Auth;

use App\catalogos;
use App\Http\Controllers\Controller;
use App\nivel_colegiaturas;
use App\nivel_interes;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(){

        $catalogos =  catalogos::all();
        $nivel_interes = nivel_interes::all();
        $nivel_interes_ = nivel_interes::pluck('id','nivel_inter');
        $nivel_colegiaturas_ = nivel_colegiaturas::pluck('id','tipo_colegiatura');
        //$users = User::all();
        //return $nivel_interes;
        return view('auth.register', ['catalogos' => $catalogos,'nivel_interes'=>$nivel_interes,'nivel_interes_' =>$nivel_interes_,'users' =>new User(), 'nivel_colegiaturas_'=>$nivel_colegiaturas_]);
    }

    public function byNivel_Interes($id){
        //return $id ;
        return nivel_colegiaturas::where('interes_id','=',$id)->get();
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
            'apellido_p' => ['required', 'string', 'max:255'],
            'apellido_m' => ['required', 'string', 'max:255'],
            'edad' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'interes_id' => ['required'],
            'colegiatura_id' => ['required'],
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

        //return "LLegan ";

        return User::create([
            'name' => $data['name'],
            'apellido_p' =>$data['apellido_p'],
            'apellido_m' =>$data['apellido_m'],
            'edad' =>$data['edad'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'interes_id' =>$data['interes_id'],
            'colegiatura_id' =>$data['colegiatura_id'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
         //return $request;

        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
  /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
