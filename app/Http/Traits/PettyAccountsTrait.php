<?php
namespace App\Http\Traits;

use App\Models\PettyAccounts;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AccountsRequest;

trait PettyAccountsTrait {

  public function petty()
  {
    $begin = Carbon::today()->format('Y-m-d H:i:s');
    $end = Carbon::today()->format('Y-m-d')." 23:59:59";
    $accounts = PettyAccounts::where('created_at', '>=', $begin)
                             ->where('created_at', '<=', $end)
                             ->get();
    return view('accounts.index', [
        'active'=>'Petty Accounts',
        'accounts' => $accounts,
    ]);
  }
  public function petty_new()
  {
    return view('accounts.form',[
      'active'=>'Petty Accounts',
      'action'=>'New',
    ]);
  }
  public function petty_create (AccountsRequest $request)
  {
      $petty_account = new PettyAccounts;
      $petty_account->title = $request->title;
      $petty_account->description = $request->description;
      $petty_account->amount = $request->amount;
      if ($petty_account->save()) {
        return redirect()->route('accounts.petty-accounts.index')->with('created','accounts.Petty Account Has Been Created ...!');
      }
      return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
  }
  public function petty_edit($id)
  {
      $account = PettyAccounts::find($id);
      return view('accounts.form',[
          'active'=>'Petty Accounts',
          'action'=>'Edit',
          'account'=>$account
      ]);
  }
  public function petty_update(AccountsRequest $request, $id)
  {
      $petty_account= PettyAccounts::find($id);
      $petty_account->title = $request->title;
      $petty_account->description = $request->description;
      $petty_account->amount = $request->amount;
  		if ($petty_account->save()) {
  	      return redirect()->route('accounts.petty-accounts.index')->with('updated','accounts.Petty Account Has Been updated ...!');
  	  }
  	  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
  }
  public function petty_delete($id)
  {
      $account = PettyAccounts::find($id);
      if ($account && $account->delete()) {
          return redirect()->route('accounts.petty-accounts.index')->with('deleted','accounts.Petty Account has been Deleted ...!');
      }
      return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
  }
  public function petty_view($id)
  {
  		$account = PettyAccounts::find($id);
  		if(!$account)
  		{
  				return redirect()->route('accounts.petty-accounts.index')->withErrors('common.Sorry But these view doesn\'t exist' );
  		}
  		return view('accounts.view',[
  				'active'=>'Petty Accounts',
  				'account'=>$account,
  		]);
  }
}
