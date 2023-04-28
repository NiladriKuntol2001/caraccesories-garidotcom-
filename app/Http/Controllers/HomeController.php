<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Garagebook;
use App\Models\Garage;
use App\Models\Homeservice;
use App\Models\Userprofile;
use App\Models\Resell;
use App\Models\Reorder;
use App\Models\Recycle;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(9);
        $resell=resell::paginate(9);
        return view('home.userpage', compact('product','resell'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype=='1')
        {
            $total_product=product::all()->count();
            $total_resell=resell::all()->count();
            $total_recycle=recycle::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $total_reorder=reorder::all()->count();
            $total_garagebook=garagebook::all()->count();
            $total_homeservice=homeservice::all()->count();
            $order=order::all();
            $reorder=reorder::all();
            $garagebook=garagebook::all();
            $homeservice=homeservice::all();
            $recycle=recycle::all();
            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue=$total_revenue+$order->price;
            }
            foreach($reorder as $reorder)
            {
                $total_revenue=$total_revenue+$reorder->price;
            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','processing')->get()->count();
            $total_redelivered=reorder::where('delivery_status','=','delivered')->get()->count();
            $total_reprocessing=reorder::where('delivery_status','=','processing')->get()->count();
            return view('admin.home', compact('total_product','total_resell','total_recycle','total_order','total_reorder','total_garagebook','total_homeservice','total_user','total_revenue','total_delivered','total_processing','total_redelivered','total_reprocessing'));
        }
        else
        {
            $product=Product::paginate(9);
            $resell=resell::paginate(9);
            return view('home.userpage', compact('product','resell'));
        }
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function product_page()
    {
        $product=product::all();
        return view('home.product_page', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            if($product->discount_price!=0)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }        
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','We have received your order. We will connect you soon...');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Successful. Thank you for shoping with us." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data)
        { 
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->payment_status='Paid';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success', 'Payment successful!');
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='You Cancelled The Order';
        $order->save();
        return redirect()->back();
    }

    public function homeservice()
    {
        if(Auth::id())
        {
            return view('home.homeservice');
        }
        else
        {
            return redirect('login');
        }
    }

    public function done_homeservice(Request $request)
    {
        $user=Auth::user();
        $homeservice = new homeservice;
        $homeservice ->name=$request->name;
        $homeservice ->address=$request->address;
        $homeservice ->phone=$request->phone;
        $homeservice ->email=$request->email;
        $homeservice ->region=$request->region;
        $homeservice ->service=$request->service;
        $homeservice ->shift=$request->shift;
        $homeservice ->date=$request->date;
        $homeservice->user_id=$user->id;
        $homeservice ->save();
        return redirect()->back()->with('message','Homeservice Booked Successfully!');
    }

    public function show_homeservice()
    {
        if(Auth::id())
        {   
            $user=Auth::user();
            $userid=$user->id;
            $homeservice=homeservice::where('user_id','=',$userid)->get();
            return view('home.showhomeservice',compact('homeservice'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function delete_homeservice($id)
    {
        $homeservice=homeservice::find($id);
        $homeservice->delete();
        return redirect()->back()->with('message','Homeservice Book Cancelled Successfully!');
    }

    public function update_homeservice($id)
    {
        $homeservice=homeservice::find($id);
        return view('home.updatehomeservice',compact('homeservice'));
    }

    public function update_homeservice_confirm(Request $request, $id)
    {
        $user=Auth::user();
        $homeservice = new homeservice;
        $homeservice ->name=$request->name;
        $homeservice ->address=$request->address;
        $homeservice ->phone=$request->phone;
        $homeservice ->email=$request->email;
        $homeservice ->region=$request->region;
        $homeservice ->service=$request->service;
        $homeservice ->shift=$request->shift;
        $homeservice ->date=$request->date;
        $homeservice->user_id=$user->id;
        $homeservice->save();
        return redirect()->back()->with('message','Homeservice Booking Upadated Successfully!');
    }

    public function garage_book()
    {
        if(Auth::id())
        {
            $garage=garage::all();
            return view('home.garagebook', compact('garage'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function done_garage(Request $request)
    {
        $user=Auth::user();
        $garagebook = new garagebook;
        $garagebook ->name=$request->name;
        $garagebook ->address=$request->address;
        $garagebook ->phone=$request->phone;
        $garagebook ->email=$request->email;
        $garagebook ->shift=$request->shift;
        $garagebook ->date=$request->date;
        $garagebook ->service=$request->service;
        $garagebook ->garage=$request->garage;
        $garagebook->user_id=$user->id;
        $garagebook ->save();
        return redirect()->back()->with('message','Garage Booked Successfully!');
    }

    public function show_garagebook()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $garagebook=garagebook::where('user_id','=',$userid)->get();
            return view('home.show_garagebook',compact('garagebook'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function delete_garagebook($id)
    {
        $garagebook=garagebook::find($id);
        $garagebook->delete();
        return redirect()->back()->with('message','Garage Book Cancelled Successfully!');
    }

    public function update_garagebook($id)
    {
        $garagebook=garagebook::find($id);
        $garage=garage::all();
        return view('home.update_garagebook',compact('garagebook','garage'));
    }

    public function update_garagebook_confirm(Request $request, $id)
    {
        $user=Auth::user();
        $garagebook = new garagebook;
        $garagebook ->name=$request->name;
        $garagebook ->address=$request->address;
        $garagebook ->phone=$request->phone;
        $garagebook ->email=$request->email;
        $garagebook ->shift=$request->shift;
        $garagebook ->date=$request->date;
        $garagebook ->service=$request->service;
        $garagebook ->garage=$request->garage;
        $garagebook->user_id=$user->id;
        $garagebook->save();
        return redirect()->back()->with('message','Garage Book Upadated Successfully!');
    }

    public function show_profile()
    {   
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $userprofile=userprofile::where('user_id','=',$userid)->get();
            return view('userprofile.home', compact('userprofile'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function resell_product()
    {
        $resell=resell::all();
        return view('home.resell_product', compact('resell'));
    }

    public function resell_details($id)
    {
        $resell=resell::find($id);
        return view('home.resell_details', compact('resell'));
    }

    public function resell_order(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $resell=resell::find($id);
            $reorder=new reorder;
            $reorder->name=$user->name;
            $reorder->email=$user->email;
            $reorder->phone=$user->phone;
            $reorder->address=$user->address;
            $reorder->user_id=$user->id;
            $reorder->product_title=$resell->title;
            $reorder->quantity=$request->quantity;
            if($resell->discount_price!=0)
            {
                $reorder->price=$resell->discount_price * $request->quantity;
            }
            else
            {
                $reorder->price=$resell->price * $request->quantity;
            }        
            $reorder->image=$resell->image;
            $reorder->product_id=$resell->id;
            $reorder->payment_status='cash on delivery';
            $reorder->delivery_status='processing';
            $reorder->save();
            return redirect()->back()->with('message','We have received your order. We will connect you soon...');
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_resell_order()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $reorder=reorder::where('user_id','=',$id)->get();
            return view('home.show_resell_order', compact('reorder'));
        }
        else
        {
            return redirect('login');
        }
    }
}
