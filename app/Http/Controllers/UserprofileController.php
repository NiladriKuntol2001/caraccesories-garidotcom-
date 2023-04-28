<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Resell;
use App\Models\User;
use App\Models\Recycle;
use App\Models\Userprofile;

class UserprofileController extends Controller
{
    public function view_resell()
    {
        $user=Auth::user();
        $userid=$user->id;
        $category = category::all();
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.resell', compact('category','userprofile'));
    }

    public function add_resell(Request $request)
    {
        $user=Auth::user();
        $resell = new resell;
        $resell ->title=$request->title;
        $resell ->description=$request->description;
        $resell ->price=$request->price;
        $resell ->quantity=$request->quantity;
        $resell ->discount_price=$request->dis_price;
        $resell ->category=$request->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('resell',$imagename);
        $resell->image=$imagename;
        $resell->user_id=$user->id;
        $resell ->save();
        return redirect()->back()->with('message','Product Added Successfully!');
    }

    public function show_resell()
    {
        $user=Auth::user();
        $userid=$user->id;
        $resell=resell::where('user_id','=',$userid)->get();
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.showresell', compact('resell','userprofile'));
    }

    public function delete_resell($id)
    {
        $resell=resell::find($id);
        $resell->delete();
        return redirect()->back()->with('message','Resell Product Deleted Successfully!');
    }

    public function update_resell($id)
    {
        $user=Auth::user();
        $resell=resell::find($id);
        $category=category::all();
        $userid=$user->id;
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.updateresell',compact('resell','category','userprofile'));
    }

    public function update_resell_confirm(Request $request, $id)
    {
        $user=Auth::user();
        $resell=resell::find($id);
        $resell->title=$request->title;
        $resell->description=$request->description;
        $resell->price=$request->price;
        $resell->discount_price=$request->dis_price;
        $resell->category=$request->category;
        $resell->quantity=$request->quantity;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('resell',$imagename);
            $resell->image=$imagename;
        }
        $resell->user_id=$user->id;
        $resell->save();
        return redirect()->back()->with('message','Resell Product Updated Successfully!');
    }

    public function view_recycle()
    {
        $user=Auth::user();
        $userid=$user->id;
        $category = category::all();
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.recycle', compact('category','userprofile'));
    }

    public function add_recycle(Request $request)
    {
        $user=Auth::user();
        $recycle = new recycle;
        $recycle ->name=$user->name;
        $recycle ->email=$user->email;
        $recycle ->phone=$user->phone;
        $recycle ->address=$user->address;
        $recycle ->title=$request->title;
        $recycle ->description=$request->description;
        $recycle ->quantity=$request->quantity;
        $recycle ->category=$request->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('recycle',$imagename);
        $recycle->image=$imagename;
        $recycle->user_id=$user->id;
        $recycle ->save();
        return redirect()->back()->with('message','Recycle Product Added Successfully!');
    }

    public function show_recycle()
    {
        $user=Auth::user();
        $userid=$user->id;
        $recycle=recycle::where('user_id','=',$userid)->get();
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.showrecycle', compact('recycle','userprofile'));
    }

    public function delete_recycle($id)
    {
        $recycle=recycle::find($id);
        $recycle->delete();
        return redirect()->back()->with('message','recycle Product Deleted Successfully!');
    }

    public function update_recycle($id)
    {
        $recycle=recycle::find($id);
        $category=category::all();
        $userid=$user->id;
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.updaterecycle',compact('recycle','category','userprofile'));
    }

    public function update_recycle_confirm(Request $request, $id)
    {
        $user=Auth::user();
        $recycle=recycle::find($id);
        $recycle ->name=$user->name;
        $recycle ->email=$user->email;
        $recycle ->phone=$user->phone;
        $recycle ->address=$user->address;
        $recycle->title=$request->title;
        $recycle->description=$request->description;
        $recycle->category=$request->category;
        $recycle->quantity=$request->quantity;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('recycle',$imagename);
            $recycle->image=$imagename;
        }
        $recycle->user_id=$user->id;
        $recycle->save();
        return redirect()->back()->with('message','recycle Product Updated Successfully!');
    }

    public function profiledetails()
    {   
        $user=Auth::user();
        $userid=$user->id;
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.userprofile', compact('userprofile'));
    }

    public function add_profile(Request $request)
    {
        $user=Auth::user();
        $userprofile = new userprofile;
        $userprofile ->name=$user->name;
        $userprofile ->email=$user->email;
        $userprofile ->phone=$user->phone;
        $userprofile ->address=$user->address;
        $userprofile ->nid=$request->nid;
        $userprofile ->dateofbirth=$request->dateofbirth;
        $userprofile ->post=$request->post;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('userprofile',$imagename);
        $userprofile->image=$imagename;
        $userprofile->user_id=$user->id;
        $userprofile ->save();
        return redirect()->back()->with('message','Profile Information Added Successfully!');
    }

    public function view_profile()
    {
        $user=Auth::user();
        $userid=$user->id;
        $userprofile=userprofile::where('user_id','=',$userid)->get();
        return view('userprofile.viewprofile', compact('userprofile'));
    }
}
