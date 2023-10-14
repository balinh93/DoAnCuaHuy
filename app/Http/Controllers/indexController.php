<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\products;
use App\models\categories;


class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sumProducts = Products::count();
        $sumCate = Categories::count();
        $cates1 = Categories::all();
        $products = Products::where('status', '0')
        ->orderBy('created_at','desc')
        ->get();
        return view('user.index', compact('products','sumProducts','sumCate','cates1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cates1 = Categories::all();
        $products = Products::find($id);
        $title = $products->title;
        $price = $products->price;
        $content = $products->content;
        $image = $products->image;
        return view('user.show',compact('title','price','content','image','cates1'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
