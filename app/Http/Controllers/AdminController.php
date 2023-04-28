<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Homeservice;
use App\Models\Garagebook;
use App\Models\Garage;
use App\Models\Reorder;
use App\Models\Recycle;
class AdminController extends Controller
{
    public function view_category()
    {   
        $data=category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    
    public function delete_category($id)
    {   
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new product;
        $product ->title=$request->title;
        $product ->description=$request->description;
        $product ->price=$request->price;
        $product ->quantity=$request->quantity;
        $product ->discount_price=$request->dis_price;
        $product ->category=$request->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product ->save();
        return redirect()->back()->with('message','Product Added Successfully!');
    }

    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully!');
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $category=category::all();
        return view('admin.update_product',compact('product','category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully!');
    }

    public function order()
    {
        $order=order::all();
        return view('admin.order', compact('order'));
    }

    public function see_homeservice()
    {
        $homeservice=homeservice::all();
        return view('admin.seehomeservice', compact('homeservice'));
    }

    public function see_garagebook()
    {
        $garagebook=garagebook::all();
        return view('admin.seegaragebook', compact('garagebook'));
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back();
    }

    public function searchdata(Request $request)
    {
        $searchText=$request->search;
        $order=order::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));
    }

    public function searchdatagarage(Request $request)
    {
        $searchText=$request->search;
        $garagebook=garagebook::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('garage','LIKE',"%$searchText%")->orwhere('shift','LIKE',"%$searchText%")->orwhere('address','LIKE',"%$searchText%")->get();
        return view('admin.seegaragebook',compact('garagebook'));
    }

    public function searchdatahome(Request $request)
    {
        $searchText=$request->search;
        $homeservice=homeservice::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('shift','LIKE',"%$searchText%")->orwhere('service','LIKE',"%$searchText%")->get();
        return view('admin.seehomeservice',compact('homeservice'));
    }

    public function view_garage()
    {   
        $garage=garage::all();
        return view('admin.garage', compact('garage'));
    }

    public function add_garage(Request $request)
    {
        $garage=new garage;
        $garage->garage_name=$request->garage_name;
        $garage->garage_location=$request->garage_location;
        $garage->save();
        return redirect()->back()->with('message','Garage Added Successfully');
    }

    public function delete_garage($id)
    {   
        $garage=garage::find($id);
        $garage->delete();
        return redirect()->back()->with('message','Garage Deleted Successfully');
    }

    public function resellshow()
    {
        $reorder=reorder::all();
        return view('admin.resellorder', compact('reorder'));
    }

    public function searchdataresell(Request $request)
    {
        $searchText=$request->search;
        $reorder=reorder::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('email','LIKE',"%$searchText%")->get();
        return view('admin.resellorder',compact('reorder'));
    }

    public function view_recycle_offers()
    {
        $recycle=recycle::all();
        return view('admin.showrecycleoffer', compact('recycle'));
    }

    public function reselldelivered($id)
    {
        $reorder=reorder::find($id);
        $reorder->delivery_status="delivered";
        $reorder->payment_status="Paid";
        $reorder->save();
        return redirect()->back();
    }

    public function searchdatarecycle(Request $request)
    {
        $searchText=$request->search;
        $recycle=recycle::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->get();
        return view('admin.showrecycleoffer',compact('recycle'));
    }

}
