<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Tainant;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Core\PayPalHttpClient;

class PaypalController extends Controller
{
    /**
     * @var PayPalCheckoutSdk\Core\PayPalHttpClient
     */
    protected $client;

    public function __construct()
    {
        $this->client = App::make('paypal.client');
    }

    public function createPayment($total, $id)
    {

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "value" => $total,
                    "currency_code" => "USD",
                ],
            ]],
            "application_context" => [
                "cancel_url" => url(route('CancelPayment')),
                "return_url" => url(route('CallbackPayment'))
            ],
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $this->client->execute($request);

            dd($response);
            if($response && $response->statusCode == 201) {
                $links = collect($response->result->links);

                $link = $links->where('rel', '=', 'approve')->first();

                return redirect()->away($link->href);

            };
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
//            print_r($response);

        }catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function callback()
    {
        $paypal_order_id = request()->query('token');

        $request = new OrdersCaptureRequest($paypal_order_id);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call

            $response = $this->client->execute($request);

            dd($response);
//            if($response && $response->statusCode == 201) {
//                foreach($response->result->purchase_units as $unit){
//                    $workspace = $unit->amount->workspace;
//
//                    dd($workspace);
//                };
//
//                $workspace = Workspace::where('id', $request->workspace_id)->first();
//
//                $tainents = Tainant::where('workspace_id', $workspace->id)->first();
//
//                $start = Carbon::createFromFormat('Y-m-d', $request->start_date);
//                $end = Carbon::createFromFormat('Y-m-d', $request->end_date);
//                $diff_in_days = $start->diffInDays($end);
//
//                if ( $tainents->remaining_days == 0 ) {
//                    Tainant::create([
//                        'workspace_id' => $request->workspace_id,
//                        'owner_id' => $request->owner_id,
//                        'user_id' => Auth::guard(session('guardName'))->user()->id,
//                        'start_date' => $request->start_date,
//                        'end_date' => $request->end_date,
//                        'total' => $diff_in_days * $workspace->price,
//                        'remaining_days' => $diff_in_days,
//                        'per_day' => $workspace->price,
//                    ]);
//                }else {
//                    toastr()->error('The office is currently booked');
//
//                    return redirect()->back();
//                }
//
//                $workspace->update([
//                    'status' => 'booked',
//                ]);
//
//                toastr()->success('Done !');
//
//                $tainents = Tainant::where('user_id', Auth::guard(session('guardName'))->user()->id)->get();
//                return view('customer.workspace.index', compact('tainents'));

//                return redirect()->route('my-workspaces.index');
//            }
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
//            dd($response);
        }catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }
}

