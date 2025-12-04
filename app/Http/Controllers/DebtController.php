<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Expense;
use App\Models\Safekeeping;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    // public function index()
    // {
    //     $owedByMe = Debt::where('type', 'owed_by_me')->orderBy('created_at', 'desc')->get();
    //     $owedToMe = Debt::where('type', 'owed_to_me')->orderBy('created_at', 'desc')->get();
    //     $expenses = Expense::orderBy('created_at', 'desc')->get();
    //     $safekeeping = Safekeeping::orderBy('created_at', 'desc')->get();
        
    //     // Calculate totals by currency
    //     $totalOwedByMeRUB = $owedByMe->where('currency', 'RUB')->sum('amount');
    //     $totalOwedByMeUSDT = $owedByMe->where('currency', 'USDT')->sum('amount');
        
    //     $totalOwedToMeRUB = $owedToMe->where('currency', 'RUB')->sum('amount');
    //     $totalOwedToMeUSDT = $owedToMe->where('currency', 'USDT')->sum('amount');
        
    //     $totalExpensesRUB = $expenses->where('currency', 'RUB')->sum('amount');
    //     $totalExpensesUSDT = $expenses->where('currency', 'USDT')->sum('amount');
        
    //     $totalSafekeepingRUB = $safekeeping->where('currency', 'RUB')->sum('amount');
    //     $totalSafekeepingUSDT = $safekeeping->where('currency', 'USDT')->sum('amount');
        
    //     $debtBalanceRUB = $totalOwedToMeRUB - $totalOwedByMeRUB;
    //     $debtBalanceUSDT = $totalOwedToMeUSDT - $totalOwedByMeUSDT;
    //     $activeTab = session('active_tab', 'owedByMe');

    //     return view('index', compact(
    //         'owedByMe', 'owedToMe', 'expenses', 'safekeeping',
    //         'totalOwedByMeRUB', 'totalOwedByMeUSDT',
    //         'totalOwedToMeRUB', 'totalOwedToMeUSDT',
    //         'totalExpensesRUB', 'totalExpensesUSDT',
    //         'totalSafekeepingRUB', 'totalSafekeepingUSDT',
    //         'debtBalanceRUB', 'debtBalanceUSDT',
    //         'activeTab'
    //     ));
    // }
    public function index(Request $request)
{
    // Get user_code from session
    $userCode = session('user_code');
    
    // If no user_code, redirect to code entry (we'll create this later)
    if (!$userCode) {
        return view('enter-code');
    }
    
    // Filter all data by user_code
    $owedByMe = Debt::where('type', 'owed_by_me')
                    ->where('user_code', $userCode)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
    $owedToMe = Debt::where('type', 'owed_to_me')
                    ->where('user_code', $userCode)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
    $expenses = Expense::where('user_code', $userCode)
                       ->orderBy('created_at', 'desc')
                       ->get();
                       
    $safekeeping = Safekeeping::where('user_code', $userCode)
                              ->orderBy('created_at', 'desc')
                              ->get();
    
    // Calculate totals by currency (same as before)
    $totalOwedByMeRUB = $owedByMe->where('currency', 'RUB')->sum('amount');
    $totalOwedByMeUSDT = $owedByMe->where('currency', 'USDT')->sum('amount');
    
    $totalOwedToMeRUB = $owedToMe->where('currency', 'RUB')->sum('amount');
    $totalOwedToMeUSDT = $owedToMe->where('currency', 'USDT')->sum('amount');
    
    $totalExpensesRUB = $expenses->where('currency', 'RUB')->sum('amount');
    $totalExpensesUSDT = $expenses->where('currency', 'USDT')->sum('amount');
    
    $totalSafekeepingRUB = $safekeeping->where('currency', 'RUB')->sum('amount');
    $totalSafekeepingUSDT = $safekeeping->where('currency', 'USDT')->sum('amount');
    
    $debtBalanceRUB = $totalOwedToMeRUB - $totalOwedByMeRUB;
    $debtBalanceUSDT = $totalOwedToMeUSDT - $totalOwedByMeUSDT;
    
    $activeTab = session('active_tab', 'owedByMe');
    
    return view('index', compact(
        'owedByMe', 'owedToMe', 'expenses', 'safekeeping',
        'totalOwedByMeRUB', 'totalOwedByMeUSDT',
        'totalOwedToMeRUB', 'totalOwedToMeUSDT',
        'totalExpensesRUB', 'totalExpensesUSDT',
        'totalSafekeepingRUB', 'totalSafekeepingUSDT',
        'debtBalanceRUB', 'debtBalanceUSDT',
        'activeTab'
    ));
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // public function storeDebt(Request $request)
    // {
    //     $request->validate([
    //         'person_name' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:0.01',
    //         'type' => 'required|in:owed_by_me,owed_to_me',
    //         'currency' => 'required|in:RUB,USDT'
    //     ]);
        
    //     Debt::create($request->all());
        
    //     $tabName = $request->type === 'owed_by_me' ? 'owedByMe' : 'owedToMe';
    //     session(['active_tab' => $tabName]);
        
    //     return redirect()->back()->with('success', 'تم الإضافة بنجاح');
    // }


    public function storeDebt(Request $request)
{
    $request->validate([
        'person_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0.01',
        'type' => 'required|in:owed_by_me,owed_to_me',
        'currency' => 'required|in:RUB,USDT'
    ]);
    
    // Get user_code from session
    $userCode = session('user_code');
    
    // Add user_code to the data
    $data = $request->all();
    $data['user_code'] = $userCode;
    
    Debt::create($data);
    
    $tabName = $request->type === 'owed_by_me' ? 'owedByMe' : 'owedToMe';
    session(['active_tab' => $tabName]);
    
    return redirect()->back()->with('success', 'تم الإضافة بنجاح');
}
 /////////////////////////////////////////////////////////////////////////////////////////////////////////   
    // public function storeExpense(Request $request)
    // {
    //     $request->validate([
    //         'amount' => 'required|numeric|min:0.01',
    //         'currency' => 'required|in:RUB,USDT'
    //     ]);
        
    //     Expense::create($request->all());
        
    //     session(['active_tab' => 'expenses']);
        
    //     return redirect()->back()->with('success', 'تم الإضافة بنجاح');
    // }

    public function storeExpense(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'currency' => 'required|in:RUB,USDT'
    ]);
    
    // Get user_code from session
    $userCode = session('user_code');
    
    // Add user_code to the data
    $data = $request->all();
    $data['user_code'] = $userCode;
    
    Expense::create($data);
    
    session(['active_tab' => 'expenses']);
    
    return redirect()->back()->with('success', 'تم الإضافة بنجاح');
}
///////////////////////////////////////////////////////////////////////////////////////////
    
    // public function storeSafekeeping(Request $request)
    // {
    //     $request->validate([
    //         'person_name' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:0.01',
    //         'currency' => 'required|in:RUB,USDT'
    //     ]);
        
    //     Safekeeping::create($request->all());
        
    //     session(['active_tab' => 'safekeeping']);
        
    //     return redirect()->back()->with('success', 'تم الإضافة بنجاح');
    // }

    public function storeSafekeeping(Request $request)
{
    $request->validate([
        'person_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0.01',
        'currency' => 'required|in:RUB,USDT'
    ]);
    
    // Get user_code from session
    $userCode = session('user_code');
    
    // Add user_code to the data
    $data = $request->all();
    $data['user_code'] = $userCode;
    
    Safekeeping::create($data);
    
    session(['active_tab' => 'safekeeping']);
    
    return redirect()->back()->with('success', 'تم الإضافة بنجاح');
}
///////////////////////////////////////////////////////////////////////////////////////////
    
    // public function updateDebt(Request $request, $id)
    // {
    //     $request->validate([
    //         'person_name' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:0.01',
    //         'currency' => 'required|in:RUB,USDT'
    //     ]);
        
    //     $debt = Debt::findOrFail($id);
    //     $debt->update($request->only(['person_name', 'amount', 'currency']));
        
    //     $tabName = $debt->type === 'owed_by_me' ? 'owedByMe' : 'owedToMe';
    //     session(['active_tab' => $tabName]);
        
    //     return redirect()->back()->with('success', 'تم التعديل بنجاح');
    // }
    
    public function updateDebt(Request $request, $id)
{
    $request->validate([
        'person_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0.01',
        'currency' => 'required|in:RUB,USDT'
    ]);
    
    $userCode = session('user_code');
    
    // Find debt that belongs to this user only
    $debt = Debt::where('id', $id)
                ->where('user_code', $userCode)
                ->firstOrFail();
                
    $debt->update($request->only(['person_name', 'amount', 'currency']));
    
    $tabName = $debt->type === 'owed_by_me' ? 'owedByMe' : 'owedToMe';
    session(['active_tab' => $tabName]);
    
    return redirect()->back()->with('success', 'تم التعديل بنجاح');
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // public function updateExpense(Request $request, $id)
    // {
    //     $request->validate([
    //         'amount' => 'required|numeric|min:0.01',
    //         'currency' => 'required|in:RUB,USDT'
    //     ]);
        
    //     $expense = Expense::findOrFail($id);
    //     $expense->update($request->only(['amount', 'currency']));
        
    //     session(['active_tab' => 'expenses']);
        
    //     return redirect()->back()->with('success', 'تم التعديل بنجاح');
    // }



    public function updateExpense(Request $request, $id)
{
    $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'currency' => 'required|in:RUB,USDT'
    ]);
    
    $userCode = session('user_code');
    
    // Find expense that belongs to this user only
    $expense = Expense::where('id', $id)
                      ->where('user_code', $userCode)
                      ->firstOrFail();
                      
    $expense->update($request->only(['amount', 'currency']));
    
    session(['active_tab' => 'expenses']);
    
    return redirect()->back()->with('success', 'تم التعديل بنجاح');
}

//////////////////////////////////////////////////////////////////////////////////////////
    
    // public function updateSafekeeping(Request $request, $id)
    // {
    //     $request->validate([
    //         'person_name' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:0.01',
    //         'currency' => 'required|in:RUB,USDT'
    //     ]);
        
    //     $safekeeping = Safekeeping::findOrFail($id);
    //     $safekeeping->update($request->only(['person_name', 'amount', 'currency']));
        
    //     session(['active_tab' => 'safekeeping']);
        
    //     return redirect()->back()->with('success', 'تم التعديل بنجاح');
    // }
    
    public function updateSafekeeping(Request $request, $id)
{
    $request->validate([
        'person_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0.01',
        'currency' => 'required|in:RUB,USDT'
    ]);
    
    $userCode = session('user_code');
    
    // Find safekeeping that belongs to this user only
    $safekeeping = Safekeeping::where('id', $id)
                              ->where('user_code', $userCode)
                              ->firstOrFail();
                              
    $safekeeping->update($request->only(['person_name', 'amount', 'currency']));
    
    session(['active_tab' => 'safekeeping']);
    
    return redirect()->back()->with('success', 'تم التعديل بنجاح');
}
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // public function deleteDebt($id)
    // {
    //     $debt = Debt::findOrFail($id);
    //     $tabName = $debt->type === 'owed_by_me' ? 'owedByMe' : 'owedToMe';
    //     $debt->delete();
        
    //     session(['active_tab' => $tabName]);
        
    //     return redirect()->back()->with('success', 'تم الحذف بنجاح');
    // }
    
    // public function deleteExpense($id)
    // {
    //     Expense::findOrFail($id)->delete();
        
    //     session(['active_tab' => 'expenses']);
        
    //     return redirect()->back()->with('success', 'تم الحذف بنجاح');
    // }
    
    // public function deleteSafekeeping($id)
    // {
    //     Safekeeping::findOrFail($id)->delete();
        
    //     session(['active_tab' => 'safekeeping']);
        
    //     return redirect()->back()->with('success', 'تم الحذف بنجاح');
    // }



    public function deleteDebt($id)
{
    $userCode = session('user_code');
    
    // Find and delete only if belongs to this user
    $debt = Debt::where('id', $id)
                ->where('user_code', $userCode)
                ->firstOrFail();
                
    $tabName = $debt->type === 'owed_by_me' ? 'owedByMe' : 'owedToMe';
    $debt->delete();
    
    session(['active_tab' => $tabName]);
    
    return redirect()->back()->with('success', 'تم الحذف بنجاح');
}

public function deleteExpense($id)
{
    $userCode = session('user_code');
    
    // Find and delete only if belongs to this user
    Expense::where('id', $id)
           ->where('user_code', $userCode)
           ->firstOrFail()
           ->delete();
    
    session(['active_tab' => 'expenses']);
    
    return redirect()->back()->with('success', 'تم الحذف بنجاح');
}

public function deleteSafekeeping($id)
{
    $userCode = session('user_code');
    
    // Find and delete only if belongs to this user
    Safekeeping::where('id', $id)
               ->where('user_code', $userCode)
               ->firstOrFail()
               ->delete();
    
    session(['active_tab' => 'safekeeping']);
    
    return redirect()->back()->with('success', 'تم الحذف بنجاح');
}
}