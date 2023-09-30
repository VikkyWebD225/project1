<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Usermodel;

use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Auth;



class Usermgt extends Controller
{
    public function login()
    {
        // dd('hello hyhy ');
        return view('admin.login');
    }


    public function register()
    {
        return view('admin.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:usermodels',
            'password' => 'required|min:5|max:12'
        ]);

        $user = new Usermodel();
        $user->email = $request->email;
        $user->password = $request->password;

        $res = $user->save();

        if ($res) {
            return back()->with('success', 'You Have Registered Successfully');
        } else {
            return back()->with('fail', 'You Have Not Have Registered Successfully');
        }

    }

    public function loginUser(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Usermodel::where('email', $credentials['email'])->first();

        if ($user) {
            session::put('loginId', $user->id);

            return redirect('dashboards');
        } else {
            return redirect('login');
        }





    }

    public function product()
    {
        // dd('hello');
        return view('admin.product');
    }

    public function productinsert(Request $request)
    {



        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,avif|max:2048',
            'prodname' => 'required',
            'description' => 'required',
            'expdate' => 'required',
            'stock' => 'required',

        ]);

        $product = new Product();


        $product->productname = $request->input('prodname');
        $product->description = $request->input('description');
        $product->expirydate = $request->input('expdate');
        $product->unitsinstock = $request->input('stock');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $product['image'] = 'upload/' . $filename;
        }


        $res = $product->save();
        if ($res) {

            return redirect()->route('add-product')->with('success', 'Successfully Inserted');
        } else {
            return redirect()->with('danger', 'Not created successfully');
        }

    }

    public function showproducts()
    {
        $data = Product::all();

        return view('admin.productlist', ['products' => $data]);

    }


    public function account()
    {
        return view('admin.account');
    }

    public function addproduct()
    {
        return view('admin.add-product');
    }

    // public function editproduct($id)
    // {
    //     $products = Product::find($id);
    //     return view('admin.edit-product', compact('products'));
    // }

    public function edit($id)
    {

        $product = Product::where('id', $id)->first();
        return view('admin.edit-product', ['products' => $product]);
    }

    public function updatepro(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $product->productname = $request->prodname;
        $product->expirydate = $request->expdate;
        $product->unitsinstock = $request->stock;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('showproduct');

    }

    public function deletepro($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->route('showproduct');
    }

    public function undos()
    {
        $product = Product::onlyTrashed()->get();
        return view('admin.product-trash', ['products' => $product]);
    }

    public function restores($id)
    {

        $product = Product::withTrashed()->find($id);
        if (!is_null($product)) {
            $product->restore();
        }

        return redirect()->route('showproduct');
    }

    // public function forceDelete($id)
    // {
    //     $product = Product::withTrashed()->find($id);
    //     if (!is_null($product)) {
    //         $product->forceDelete();
    //     }
    //     return redirect()->back();
    // }





    // public function updateproduct(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    //         'prodname' => 'required',
    //         'description' => 'required',
    //         'expdate' => 'required',
    //         'stock' => 'required'

    //     ]);


    // }




    public function dashboard()
    {

        return view('admin.dashboard');
    }





    // public function imgstore(Request $request)
    // {
    //     $request->validate([
    //         'images' => 'required|image|mimes:png,jpg,jpeg|max:2048'
    //     ]);
    //     $imageName = time() . '_' . $request->images->extension();
    //     $request->images->move(public_path('images'), $imageName);
    //     return back()->with('success', 'Image uploaded successfully!')
    //         ->with('images', $imageName);
    //     dd($request->all());
    // }


    // public function imgstore(Request $request)
    // {
    //     $request->validate([
    //         'images' => 'required|image|mimes:png,jpg,jpeg|max:2048'
    //     ]);

    //     $imageName = time() . '.' . $request->images->getClientOriginalExtension();
    //     $request->images->move(public_path('images'), $imageName);

    //     return back()->with('success', 'Image uploaded successfully!')->with('images', $imageName);
    // }


    public function logout(Request $request)
    {

        Auth::logout();

        // Clear the session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user to the desired location after logout
        return redirect('/login');
    }


}