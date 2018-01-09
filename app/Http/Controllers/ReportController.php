<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function index(){
    	return view('report.index');
    }

    public function paid(){
    	//SELECT status, count(status) FROM `orders` GROUP BY status
    	 $paid = DB::table('orders')
    	 			->select(DB::raw('status, count(status) as value'))
    	 			->groupBy('status')
    	 			->get();
    	 return $paid;
    }

    public function product(){
    	//SELECT size, sum(price) as sum FROM `orders` GROUP BY size
    	$product = DB::table('orders')
    				->select(DB::raw('size, sum(price) as sum'))
    				->groupBy('size')
    				->get();
    	return $product;

    }

    public function sales(){
    	//SELECT Month(created_at)as month, sum(price) FROM `orders` group by Month(created_at)
    	$sales = DB::table('orders')
    				->select(DB::raw('Month(created_at) as month, sum(price) as sum'))
                    ->where('status', 'paid')
    				->groupBy('month')
    				->get();
    	return $sales;
    }

    public function prediction(){
        return view('report.prediction');
    }
}
