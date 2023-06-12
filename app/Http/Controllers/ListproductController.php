<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ListproductController extends Controller
{
    public function product()
    {
       
        $products = product::paginate(6);
        return view('product', compact('products'))->with('id', (request()->input('page', 1) - 1) * 6);
    }
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $product->views++; // Tăng giá trị trường 'views' lên 1
        $product->save();
        $products = product::find($id);
        if (!$products) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
        }
        return view('detail', compact('products'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = product::where('name', 'like', '%' . $searchTerm . '%')->get();

        return view('search', compact('products'));
    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $products = product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $products->name,
                "image" => $products->image,
                "description" => $products->description,
                "quantity" => 1,
                "price" => $products->price,
                "status" => $products->status
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Giỏ hàng đã được cập nhật');
        }
    }
    public function remove_from_cart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        }
    }
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('views')->default(0);
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
}
