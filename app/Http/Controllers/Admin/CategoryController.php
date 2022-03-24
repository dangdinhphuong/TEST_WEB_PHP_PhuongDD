<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Common\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $Categories = Categories::orderBy('id', 'DESC')->paginate(10);
        if ($Categories->currentPage() > $Categories->lastPage()) {
            return redirect("/admin/categories");
        }
        //  dd($Categories->links(),$Categories, count($Categories));
        return view('admin.pages.category', compact('Categories'));
    }
    public function create()
    {
        return view('admin.pages.CreateCategory');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        if (isset($request->status) && !empty($request->status) && $request->status == "on") {
            $request->status = Constants::ENABLED;
        } else {
            $request->status = Constants::DISABLE;
        }
        Categories::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect('/admin/categories')->with('message', 'A category success');
    }
    public function edit(Request $request, $id)
    {
        $Categories = Categories::find($id);
        if ($Categories) {
            return view('admin.pages.EditCategory', compact('Categories'));
        } else {
            return redirect('/admin/categories');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $request->route('id') . ',id',
        ]);
        $Categories = Categories::find($id);
        if ($Categories) {
            if (isset($request->status) && !empty($request->status) && $request->status == "on") {
                $request->status = Constants::ENABLED;
            } else {
                $request->status = Constants::DISABLE;
            }
            $Categories->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect('/admin/categories')->with('message', 'A category success');
        } else {
            return redirect('/admin/categories');
        }
    }

    public function destroy(Request $request, $id)
    {
        $Categories = Categories::find($id);
        $Categories->load('products');

        if ($Categories) {
            try {
                DB::beginTransaction();
                foreach ($Categories->products as $product) {
                    if (file_exists('storage/' . $product->image)) {
                        unlink('storage/' . $product->image);
                    }
                    $product->delete();
                }
                $Categories->delete();
                DB::commit();
                return redirect()->back()->with('status', 'Bạn đã xóa' . $Categories->name . ' thành công !');
            } catch (Exception $exception) {
                DB::rollBack();
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('status', 'Bạn đã xóa' . $Categories->name . ' thất bại !');
        }
    }
}
