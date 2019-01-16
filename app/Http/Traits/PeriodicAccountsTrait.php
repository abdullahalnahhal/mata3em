<?php
namespace App\Http\Traits;

use App\Models\PeriodicAccounts;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AccountsRequest;

trait PeriodicAccountsTrait {

  public function periodic()
  {
    $begin = Carbon::today()->format('Y-m-d H:i:s');
    $end = Carbon::today()->format('Y-m-d')." 23:59:59";
    $accounts = PeriodicAccounts::where('created_at', '>=', $begin)
                             ->where('created_at', '<=', $end)
                             ->get();
    return view('accounts.index', [
        'active'=>'Periodic Accounts',
        'accounts' => $accounts,
    ]);
  }
  public function periodic_new()
  {
    return view('accounts.form',[
      'active'=>'Periodic Accounts',
      'action'=>'New',
    ]);
  }
  public function periodic_create (AccountsRequest $request)
  {
      $periodic_account = new PeriodicAccounts;
      $periodic_account->title = $request->title;
      $periodic_account->description = $request->description;
      $periodic_account->amount = $request->amount;
      if ($periodic_account->save()) {
        return redirect()->route('accounts.periodic-accounts.index')->with('created','accounts.Periodic Account Has Been Created ...!');
      }
      return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
  }
  public function periodic_edit($id)
  {
      $account = PeriodicAccounts::find($id);
      return view('accounts.form',[
          'active'=>'Periodic Accounts',
          'action'=>'Edit',
          'account'=>$account
      ]);
  }
  public function periodic_update(AccountsRequest $request, $id)
  {
      $periodic_account= PeriodicAccounts::find($id);
      $periodic_account->title = $request->title;
      $periodic_account->description = $request->description;
      $periodic_account->amount = $request->amount;
      if ($periodic_account->save()) {
          return redirect()->route('accounts.periodic-accounts.index')->with('updated','accounts.Periodic Account Has Been updated ...!');
      }
      return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
  }
  public function periodic_delete($id)
  {
      $account = PeriodicAccounts::find($id);
      if ($account && $account->delete()) {
          return redirect()->route('accounts.periodic-accounts.index')->with('deleted','accounts.Periodic Account has been Deleted ...!');
      }
      return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
  }
  public function periodic_view($id)
  {
      $account = PeriodicAccounts::find($id);
      if(!$account)
      {
          return redirect()->route('accounts.periodic-accounts.index')->withErrors('common.Sorry But these view doesn\'t exist' );
      }
      return view('accounts.view',[
          'active'=>'Periodic Accounts',
          'account'=>$account,
      ]);
  }

}
