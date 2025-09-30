<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_Sells;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class DashboardController extends Controller
{
    public function dashboardDateRange(Request $request)
    {
        $query = Product_Sells::query();
        if($request->filled(('date_range')))
        {
            $dateRange =  $request->input('date_range');
            $dates = explode(' a ',$dateRange);
            $startDate = Carbon::createFromFormat('d/m/Y', trim($dates[0]))->format('Y-m-d');
            $endDate = isset($dates[1]) ?
                     Carbon::createFromFormat('d/m/Y', trim($dates[1]))->format('Y-m-d')
                     : $startDate;
            $query->whereBetween('sale_date', [$startDate, $endDate]);
        }
            $sales_date = $query->latest();
            return view('dashboard', ['sales_date' => $sales_date]);
        }
    public function dashboard()
    {
        // O with('product') carrega os dados do produto relacionado em uma única consulta extra    
        $latestSells = Product_Sells::with('product')->latest()->take(5)->get();
        $totalRevenues = Product_Sells::sum('total_price'); 
        $totalSellsCount = Product_Sells::count();
        $productsCount = Product::count();
        $latestProducts = Product::latest()->take(5)->get();
        return view('dashboard',[
            'latestSells' => $latestSells,
            'totalRevenues' => $totalRevenues,
            'totalSellsCount' => $totalSellsCount,
            'productsCount' => $productsCount,
            'latestProducts' => $latestProducts
        ]);
    }
}
