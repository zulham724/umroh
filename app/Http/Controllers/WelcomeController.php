<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\MenuItem;
use App\Models\Slider;

class WelcomeController extends Controller
{
    public function index(){
    	$data["plans"] = Plan::with('plan_features','vouchers')->withCount('vouchers')->get();
    	$data["menuitems"] = MenuItem::get();
    	$data["menuitems_count"] = MenuItem::count();
    	$data["sliders"] = Slider::get();
    	// dd($data);
    	return view('welcome',$data);
    }
}
