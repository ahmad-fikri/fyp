<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderFormRequest;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\Order;
use App\User;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;

        $orders = Order::whereUserId($id)->orderBy('created_at', 'DESC')->get();
         return view('orders.index', compact('orders'));
    }

    public function showall(){
        $orders = Order::all()->where('print', 'no');
         return view('orders.index', compact('orders'));   
    }


    public function completed(){
        $orders = Order::all()->where('print', 'yes');   
        return view('orders.complete', compact('orders'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // getting all of the post data
        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;

        foreach ($files as $file) {
        $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'storage'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;


          $size = $request->get('size');
          $colour = $request->get('colour');
          $noCopies = $request->get('copies');
          
          $price = 0;
                if ($size == "A2" && $colour == "colored"){
            $price = $noCopies * 1.20;
          } else if ($size == "A2" && $colour == "bw"){
            $price = $noCopies * 1.10;
          } else if ($size == "A3" && $colour == "colored"){
            $price = $noCopies * 0.70;
          } else if ($size == "A3" && $colour == "bw"){
            $price = $noCopies * 0.60;
          } else if ($size == "A4" && $colour == "colored"){
            $price = $noCopies * 0.25;
          } else if  ($size == "A4" && $colour == "bw"){
            $price = $noCopies * 0.15;
          } else {
            $price = 99999999999999999999999;
          }



        $id = \Auth::user()->id;
        $extension = $file->getClientOriginalExtension();
        $order = new Order(array(
            'status' => 'unpaid',
            'price' => $price,
            'size' => $size,
            'layout' => $request->get('layout'),
            'noCopies' => $noCopies,
            'colour' => $colour,
            'user_id' => $id,
            'filename' => $file->getFilename().'.'.$extension,
            'mime' => $file->getClientMimeType(),
            'original_filename' => $filename
            
        ));

        $order->save();

        return redirect('/order')->with('status', 'Done add order');
    }
}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $order = Order::whereId($id)->firstOrFail();
    return view('orders.edit', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    
{
    $order = Order::whereId($id)->firstOrFail();
        $order->status = $request->get('status');
        $order->price = $request->get('price');
    
    

    $order->save();
    return redirect(action('OrdersController@edit', $order->id))->with('status', 'The order #'.$id.' has been updated!');

}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $order = Order::whereId($id)->firstOrFail();
    $order->delete();
    return redirect('/allorder')->with('status', 'The order '.$id.' has been deleted!');
}

public function show($id)
{
    $order = Order::whereId($id)->first();

    $id = $order->user_id;

    $user_id = User::whereId($id)->first();



    return view('orders.show', compact('order', 'user_id'));
}



/* Stripe Payment */

public function pay(){
    return view('payment.pay');
}

public function charge(Request $request){
     $id = \Auth::user()->id;
     $user = User::whereId($id)->firstOrFail();
     $credit = $user->credit;

     $price = floatval($request->get('price'));
     $orderid = $request->get('orderid');

     $user->credit = $credit - $price;
     $user->save();

     $order = Order::whereId($orderid)->first();
     $order->status = "paid";
     $order->save();

    return redirect('/order')->with('status', 'Payment for Successfull for order #' .$orderid );

}

public function charge10(){
     $id = \Auth::user()->id;
     $user = User::whereId($id)->firstOrFail();
     $credit = $user->credit;

     $user->credit = $credit + 10;

     $user->save();

    return redirect('/order')->with('status', 'Done topup RM10');

}

public function charge20(){
     $id = \Auth::user()->id;
     $user = User::whereId($id)->firstOrFail();
     $credit = $user->credit;

     $user->credit = $credit + 20;

     $user->save();

     return redirect('/order')->with('status', 'Done topup RM20');
}


public function charge50(){
     $id = \Auth::user()->id;
     $user = User::whereId($id)->firstOrFail();
     $credit = $user->credit;

     $user->credit = $credit + 50;

     $user->save();

     return redirect('/order')->with('status', 'Done topup RM50');
}

public function mark_as_done($id){
     $order = Order::whereId($id)->first();

     $order->print = "yes";

     $order->save();

     return redirect('/allorder')->with('status', 'Done print');
}




}
