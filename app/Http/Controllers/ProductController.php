<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
       return view('crud_products');
    }
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
        return redirect('/dashboard')->with('success', 'Produto criado com sucesso!');
        }
        catch(\Exception $e){
            return redirect('/dashboard')->with('error', 'Erro ao criar produto: '.$e->getMessage());
        }
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('crud_products', ['product' => $product]);

    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=> 'required'
        ]);
        try{
            $product->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
        ]);
        return redirect('/dashboard')->with('success', 'Produto atualizado com sucesso!');
        }
        catch(\Exception $e){
            return redirect('/dashboard')->with('error', 'Erro ao atualizar produto: '.$e->getMessage());
        }
    }
}
?>