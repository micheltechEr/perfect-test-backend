<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=> 'required'
        ]);
        try{
            Product::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
        ]);
        return redirect('/')->with('success', 'Produto criado com sucesso!');
        }
        catch(\Exception $e){
            return redirect('/')->with('error', 'Erro ao criar produto: '.$e->getMessage());
        }
    }
    public function dashboard()
    {
        try{
            $products = Product::all();
            return view('dashboard',['products'=>$products]);
        }
        catch(\Exception $e){
            return redirect('/')->with('error', 'Erro ao buscar produtos: '.$e->getMessage());
        }
    }
    public function sell_product()
    {
        try{
            $products = Product::all();
            return view('crud_sales',['products'=>$products]);
        }
        catch(\Exception $e){
            return redirect('/')->with('error', 'Erro ao buscar produtos: '.$e->getMessage());
        }
    }
}
?>