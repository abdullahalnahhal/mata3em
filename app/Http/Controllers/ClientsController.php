<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\DishCategories;
use Illuminate\Support\Carbon;
use App\Http\Requests\ClientsRequest;
use App\Http\Requests\ClientsUpdateRequest;
use App\Http\Requests\OrderRequest;
use App\Http\MainControllers\ClientsController  as Main;

class ClientsController  extends Main
{
	  public function index ()
    {
      $clients = Clients::all();
        return view('clients.index', [
            'active'=>'Clients',
            'clients' => $clients,
        ]);
    }
    public function new()
    {
      return view('clients.form',[
        'active'=>'Clients',
        'action'=>'New',
      ]);
    }
		public function create (ClientsRequest $request, $order = 0)
		{
			$client = new Clients;
			$client->name = $request->name;
			$client->tel1 = $request->tel1;
      $client->tel2 = $request->tel2;
			$client->address = $request->address;
		  if ($client->save()) {
					if ($order) {
						return redirect()->route('clients.create-order',['id'=>$client->id])->with('created','clients.Client Has Been Created ...!');
					}
		      return redirect()->route('clients.index')->with('created','clients.Client Has Been Created ...!');
		  }
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function edit($id)
    {
        $client = Clients::find($id);
        return view('clients.form',[
            'active'=>'Clients',
            'action'=>'Edit',
            'client'=>$client
        ]);
    }
		public function update(ClientsUpdateRequest $request, $id)
		{
        $client = Clients::find($id);
        $search_client = Clients::where('tel1', '=',$request->tel1)
                                ->orWhere('tel2', '=',$request->tel1)
                                ->get();

        if ($search_client->count() > 1 || $search_client->first()->id != $id) {
            return back()->withErrors('clients.Client Telepphone 1 Must be Unique');
        }
        $search_client2 = Clients::where('tel1', '=',$request->tel2)
                                ->orWhere('tel2', '=',$request->tel2)
                                ->get();

        if ($search_client2->count() > 1 || ($search_client2->first() && $search_client2->first()->id != $id)) {
            return back()->withErrors('clients.Client Telepphone 2 Must be Unique');
        }

        $client->name = $request->name;
  			$client->tel1 = $request->tel1;
        $client->tel2 = $request->tel2;
  			$client->address = $request->address;
				if ($client->save()) {
			      return redirect()->route('clients.index')->with('updated','clients.Client Has Been updated ...!');
			  }
			  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function delete($id)
		{
		    $client = Clients::find($id);
		    if ($client && $client->delete()) {
		        return redirect()->route('clients.index')->with('deleted','clients.Client has been Deleted ...!');
		    }
		    return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		}
		public function view($id)
		{
				$client = Clients::find($id);
				if(!$client)
				{
						return redirect()->route('clients.index')->withErrors('common.Sorry But these view doesn\'t exist' );
				}
				return view('clients.view',[
						'active'=>'Clients',
						'client'=>$client,
				]);
		}
		public function makeOrder($id)
		{
			$client = Clients::find($id);
			$dish_categories = DishCategories::all();
			if(!$client)
			{
					return redirect()->route('clients.index')->withErrors('common.Sorry But these view doesn\'t exist' );
			}
			return view('clients.make-order',[
					'active'=>'Clients',
					'action'=>'New',
					'client'=>$client,
					'dish_categories' => $dish_categories,
			]);
		}
		public function createOrder(OrderRequest $request, $id)
		{
				$client = Clients::find($id);
				$order = $this->makeClientOrder($request, $client);
				if ($order) {
						return redirect()->route('orders.orders.print', ['id'=>$order->id]);
						// return redirect()->route('orders.orders.index', ['locale'=>cLang()])->with('created','clients.Client Request has been Created ...!');
				}
				return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		}
		public function search(Request $request)
		{
				$client = new Clients;
				if ($request->name) {
						$client = $client->where('name', 'like', '%'.$request->name.'%');
				}
				if ($request->phone) {
					$client = $client->where('tel1', 'like', '%'.$request->phone.'%')
													 ->orWhere('tel2', 'like', '%'.$request->phone.'%');
				}
				if ($request->address) {
					$client = $client->where('address', 'like', '%'.$request->address.'%');
				}
				if ($request->name || $request->phone || $request->address) {
					$clients = $client->get()->toArray();
				}else{
					$clients = [];
				}

				return $clients;
		}
}

?>
