<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Models\Alcohol;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // use App\Models\Alcohol をやってるからこんなにシンプルにデータを取れる
        $alcohols = Alcohol::get();

        return view('auth.register', compact('alcohols'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // ddd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alcohol_id' => 'required',
            'cups' => 'required',

            // 'tolerance' => 'required',
            // 'email_verified_at' => 'required',
            // 'remember_token' => 'required',


        ]);
        // ddd($request);

        // $tolerance_calc = 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alcohol_id' => $request->alcohol_id,
            'cups' => $request->cups,
            // 'tolerance' => DB::table('users as u')
            // ->join('alcohols as a', 'u.alcohol_id', '=', 'a.id')
            // ->select(DB::raw('a.amount * a.degree / 100 * u.cups'))
            // ->get(),
            'tolerance' => null,
            'email_verified_at' => $request->email_verified_at,
            'remember_token' => $request->remember_token,

        ]);
        // ddd($user);

        $tolerance = DB::table('users as u')
        ->join('alcohols as a', 'u.alcohol_id', '=', 'a.id')
        ->orderBy('u.updated_at', 'desc')
        ->select(DB::raw('a.amount * a.degree / 100.0 * u.cups as result'))
        ->first()
        ->result;
        // ddd($tolerance);
        // User::insert(['tolerance' => $tolerance]);
        User::wherenull('tolerance')->update([
            'tolerance' => $tolerance,
        ]);

        $user = DB::table('users')
        ->orderBy('updated_at', 'desc')
        ->first();

        // ddd($user);

        
        event(new Registered($user));
        
        // 上の処理で$userのデータの内容を更新したため，Auth::login($user)で引っかかった？
        // User::createした後に，データを更新したときはid認証に変える必要あり？
        // Auth::login($user);
        Auth::loginUsingId($user->id);


        // return redirect(RouteServiceProvider::HOME);
        $alcohols = Alcohol::get();
        return view('alcohol.input', compact('user', 'alcohols'));
    }
}
