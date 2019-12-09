<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaymentController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index()
    {
        return view('posts.checkout');
    }
    public function payWithPaypal(Request $request)
    {
        $data = \Opis\Closure\unserialize($request->Cart);
        $total = $data['total'];
        $id = $data['post_id'];
        unset($data['total']);
        unset($data['post_id']);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
            $item = new Item();
            $item->setName('Share Square');
            $item->setCurrency('CAD');
            $item->setQuantity(1);
            $item->setPrice($total);
        $item_list = new ItemList();
        $item_list->setItems(array($item));
        $amount = new Amount();
        $amount->setCurrency('CAD')
            ->setTotal($total);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Adding Features to the Post');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status', ['id' => $id])) /** Specify return URL **/
        ->setCancelUrl(URL::to(URL::to('status', ['id' => $id])));
        $payment = new Payment();
        $payment->setId($id)
            ->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        //return $payment;
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to(URL::to('promotePost', ['id' => $id]));
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to(URL::to('promotePost', ['id' => $id]));
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }
    public function getPaymentStatus($id)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to(URL::to('promotePost', ['id' => $id]));
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            return Redirect::to(URL::to('displayPost', ['id' => $id]));
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to(URL::to('displayPost', ['id' => $id]));
    }
}
