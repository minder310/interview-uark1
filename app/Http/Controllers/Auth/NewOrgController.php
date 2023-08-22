<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewOrgController extends Controller
{
    // 連線到view->auth->neworg.blade.php
    public function index()
    {
        return view('auth.neworg');
    }

    public function store(Request $request)
    {
        
        // 驗證輸入的資料
        $this->validate($request, [
            'title' => ['required','string','max:255'],
            'org_no' =>['required','integer','min:1'],
        ]);

        // 建立新的資料
        $org = new \App\Models\org;
        $org->title = $request->title;
        $org->org_no = $request->org_no;
        $org->save();

        // 導向首頁
        return redirect()->route('home');
    }

}
