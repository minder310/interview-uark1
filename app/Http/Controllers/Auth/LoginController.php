<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         // 這裡是驗證規則，'exists:orgs,org_no'是與資料庫串聯並且驗證是否有這個號碼。
    //         'account' => ['required', 'string', 'max:255', 'exists:users,status,1'],
    //     ]);
    // }
    public function show(Request $request)
    {
        $user = DB::table('users')->where('account', $request->account)->first();
        if (empty($user)) {
            // 帳號不存在
            return '帳號錯誤';
        } else if ($user->status == 0) {
            // 這是回傳$message的，至前端的方法。並顯示錯誤碼。
            return redirect()->back()->withErrors(['account' => '此帳號代審核開通']);
        } else if (!Hash::check($request->password, $user->password)) { //前面這段是laravel的驗證密碼的方法
            return '密碼錯誤';
        }
        return '登入成功';
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
}
