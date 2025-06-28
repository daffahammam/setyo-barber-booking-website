<?php

namespace App\Http\Controllers;

use App\Models\Capster;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\PriceList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $priceList = PriceList::all();
        $contacts = Contact::all();
        $products = Product::all();
        $galleries = Gallery::all();
        $capsters = Capster::all();
        
       
        
        return view('home', compact('priceList', 'capsters','contacts', 'products', 'galleries'));

    }

    public function home()
    {
        $priceList = PriceList::all();
        $contacts = Contact::all();
        $products = Product::all();
        $galleries = Gallery::all();
        $capsters = Capster::all();
        
       
        
        return view('home-user', compact('priceList', 'capsters','contacts', 'products', 'galleries'));

    }

   
}
