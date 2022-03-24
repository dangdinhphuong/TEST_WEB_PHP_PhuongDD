<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\Admin\Prodcuts\CreateRequest;
use App\Http\Requests\Admin\Prodcuts\UpdateRequest;
use App\Common\Constants;
use Illuminate\Support\Facades\DB;
use Exception;


class ProductController extends Controller
{
    public function index()
    {
        $Products = Products::orderBy('id', 'DESC')->paginate(10);
        $Products->load('category');
        if ($Products->currentPage() > $Products->lastPage()) {
            return redirect("/admin/products");
        }
        return view('admin.pages.products', compact('Products'));
    }
    public function create()
    {
        $Categories = Categories::all();
        return view('admin.pages.CreateProduct', compact('Categories'));
    }
    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();
            if (isset($request->status) && !empty($request->status) && $request->status == "on") {
                $request->status = Constants::ENABLED;
            } else {
                $request->status = Constants::DISABLE;
            }
            $pathImage = $request->file('image')->store('public/images/products');
            $pathImage = str_replace("public/", "", $pathImage);
            Products::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'amount' => $request->amount,
                'image' =>  $pathImage,
                'status' => $request->status
            ]);
            DB::commit();
            return redirect('/admin/products')->with('message', 'A category success');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }
    }
    public function edit(Request $request, $id)
    {
        $Products = Products::find($id);
        $Categories = Categories::all();
        //dd($Products);
        if ($Products) {
            return view('admin.pages.EditProduct', compact('Products', 'Categories'));
        } else {
            return redirect('/admin/products');
        }
    }
    public function update(UpdateRequest $request, $id)
    {
        $Products = Products::find($id);
        // check product existence 
        if ($Products) {
            $Categories = Categories::find($request->category_id);
            // check categories existence 
            if ($Categories) {
                try {
                    DB::beginTransaction();
                    if (isset($request->status) && !empty($request->status) && $request->status == "on") {
                        $request->status = Constants::ENABLED;
                    } else {
                        $request->status = Constants::DISABLE;
                    }
                    if ($request->file('image') != null) {
                        if (file_exists('storage/' . $Products->image)) {
                            unlink('storage/' . $Products->image);
                        }
                        $pathImage = $request->file('image')->store('public/images/products');
                        $pathImage = str_replace("public/", "", $pathImage);
                    } else {
                        $pathImage = $Products->image;
                    }
                    $Products->update(
                        [
                            'name' => $request->name,
                            'category_id' => $request->category_id,
                            'price' => $request->price,
                            'amount' => $request->amount,
                            'image' => $pathImage,
                            'status' =>  $request->status
                        ]
                    );
                    DB::commit();
                    return redirect('/admin/products');
                } catch (Exception $exception) {
                    DB::rollBack();
                }
            }
        }
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $Products = Products::find($id);
        if ($Products) {
            if (file_exists('storage/' . $Products->image)) {
                unlink('storage/' . $Products->image);
            }
            $Products->delete();
            return redirect()->back()->with('status', 'Bạn đã xóa' . $Products->name . ' thành công !');
        } else {
            return redirect()->back()->with('status', 'Bạn đã xóa' . $Products->name . ' thất bại !');
        }


    }
}
