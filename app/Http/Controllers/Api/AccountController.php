<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\AccountRepository;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $account;
    
    public function __construct(AccountRepository $account)
    {
        // $this->middleware('permission:ACCOUNTREAD', ['only' => ['index']]);
        // $this->middleware('permission:ACCOUNTADD', ['only' => ['create', 'store']]);
        // $this->middleware('permission:ACCOUNTEDIT', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:ACCOUNTDELETE', ['only' => ['destroy']]);
        return $this->account = $account;
    }

    public function index()
    {
        $account = $this->account->index();
        return response()->json($account);
        // return view('accounts/index', compact('account'));
    }

    public function store(Request $request)
    {
        $this->account->store($request);
    }

    public function update(Request $request, $id)
    {
        $this->account->update($request, $id);
    }

}
