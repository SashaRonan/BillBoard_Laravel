<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
//use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return Inertia::render("Products/Index", [
            'productsData' => DB::table('products as p')
                ->select('p.id', 'p.product_name', 'p.description', 'p.price', 'p.img', 'u.name', 'u.phone')
                ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function show(User $user)
    {


        $userID = auth()->id();

        return Inertia::render("Products/Show", [
                'myProducts' => DB::table('products')
                    ->select('products.id', 'products.product_name', 'products.description', 'products.price', 'products.img', 'products.user_id', 'users.name', 'users.phone')
                    ->leftJoin('users', 'products.user_id', '=', 'users.id')
                    ->where('products.user_id', $userID)
                    ->get()],
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
