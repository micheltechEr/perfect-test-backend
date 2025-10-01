<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_Sells;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class DashboardController extends Controller
{   
    public function dashboard(Request $request)
    {
        $query = Product_Sells::query();
        if($request->filled(('date_range')))
        {
            $dateRange =  $request->input('date_range');
            $dates = explode(' - ',$dateRange);

            $startDate = Carbon::createFromFormat('d/m/Y', trim($dates[0]))->startOfDay();
            $endDate = isset($dates[1]) ?
                     Carbon::createFromFormat('d/m/Y', trim($dates[1]))->endOfDay()
                     : $startDate;
            $query->whereBetween('sale_date', [$startDate, $endDate]);
        }
        $sales_date = $query->latest()->get();
        $totalRevenues = Product_Sells::sum('total_price'); 
        $totalSellsCount = Product_Sells::count();
        $cancelledSellsCount = Product_Sells::where('status', 'Cancelado')->count();
        $cancelledSellsRevenue = Product_Sells::where('status', 'Cancelado')->sum('total_price');
        $devolutionSellsCount = Product_Sells::where('status', 'Devolvido')->count();
        $devolutionSellsRevenue = Product_Sells::where('status', 'Devolvido')->sum('total_price');
        $productsCount = Product::count();
        $latestProducts = Product::latest()->take(5)->get();
        return view('dashboard',[
            'sales_date' => $sales_date,
            'totalRevenues' => $totalRevenues,
            'totalSellsCount' => $totalSellsCount,
            'cancelledSellsCount' => $cancelledSellsCount,
            'cancelledSellsRevenue' => $cancelledSellsRevenue,
            'devolutionSellsCount' => $devolutionSellsCount,
            'devolutionSellsRevenue' => $devolutionSellsRevenue,
            'productsCount' => $productsCount,
            'latestProducts' => $latestProducts
        ]);
    }
}
