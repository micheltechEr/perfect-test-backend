<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_Sells;
class ProductSellController extends Controller
{

    public function store(Request $request)
    {
        $validateData = $request->validate(([
            'product_id' => 'required|exists:products,id', // 'exists' garante que o produto existe na tabela 'products'
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'client_cpf' => 'required|string|max:14',
            'sale_date' => 'required',
            'quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0',
            'status' => 'required|string',
            ]));
        $validateData['sale_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validateData['sale_date'])->format('Y-m-d');
        try{
            $product = Product::findOrFail($validateData['product_id']);
            $subtotal = $product->price * $validateData['quantity'];
            $discount = $validateData['discount'] ?? 0;
            $total_price = $subtotal - $discount;
            Product_Sells::create([
                'product_id'=> $validateData['product_id'],
                'client_name'=> $validateData['client_name'],
                'client_email'=> $validateData['client_email'],
                'client_cpf'=> $validateData['client_cpf'],
                'sale_date'=>$validateData['sale_date'],
                'quantity'=>$validateData['quantity'],
                'discount'=>$discount,
                'status'=> $validateData['status'],
                'total_price'=>$total_price
            ]);
            return redirect('/')->with('success', 'Venda registrada com sucesso!');
        }
        catch(\Exception $e){
            \Log::error('Erro ao registrar venda: ' . $e->getMessage());
            return redirect('/')->with('error', 'Erro ao registrar venda: '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
