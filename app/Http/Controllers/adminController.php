<?php

namespace App\Http\Controllers;
use App\models\products;
use App\models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Alert;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cates = Categories::all();
        $products = Products::orderBy('created_at','desc')->get();
        return view('admin.products.index', compact('products','cates'));
    }
    public function indexCate()
    {
        $cates = Categories::all();
        return view('admin.cates.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            // Lưu trữ tệp hình đại diện trong thư mục 'public/avatars'
            $images->storeAs('public/image', $filename);
    
            // Tạo URL để truy cập hình đại diện
            $images = asset('storage/image/' . $filename);
            
            // Lưu $images vào cơ sở dữ liệu hoặc thực hiện các tác vụ khác tùy theo yêu cầu của bạn.
        } else {
            $images = null; // Hoặc giá trị mặc định nếu không có tệp được tải lên.
        }
        $products = new Products();
        $products->title = $request->input('title');
        $products->cate_id = $request->input('cate');
        $products->price = $request->input('price');
        $products->content = $request->input('content');
        $products->status = $request->input('status');
        $products->image = $images;
        $products->save();
        return redirect()->route('indexProducts')->with('success',"Thêm sản phẩm thành công");
    }
    public function storeCate(Request $request)
    {
        $cate = new Categories();
        $cate->name = $request->input('name');
        $cate->description = $request->input('desc');
        $cate->save();
        return redirect()->route('indexCates')->with('success',"Thêm loại sản phẩm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function showCate(string $id)
    {
        $cates = Categories::find($id);
        $cateId = $cates->id;
        $name = $cates->name;
        $mota = $cates->description;
        return view('admin.cates.edit', compact('cateId','name','mota'));
    }
    public function editCate(string $id, Request $request)
    {
        $cate = Categories::find($id);
        $cate->name = $request->input('name')??$cate->name;
        $cate->description = $request->input('desc')??$cate->description;
        $cate->update();
        return redirect()->route('indexCates')->with('success',"Cập nhật loại sản phẩm thành công");
    }
    public function show(string $id)
    {
        $products = Products::find($id);
        $idProduct = $products->id;
        $title = $products->title;
        $cates = $products->cate_id;
        $price = $products->price;
        $content = $products->content;
        $status = $products->status;
        $nameCate = Categories::where('id', $cates)->first();
        $name = $nameCate->name??null;
        $cate = Categories::all();
        return view('admin.products.edit', compact('cate','name','content','price','cates','title','status','idProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        
        $product = Products::find($id);
        // Kiểm tra xem đã có tệp hình ảnh mới được tải lên hay chưa
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            // Lưu trữ tệp hình đại diện trong thư mục 'public/avatars'
            $images->storeAs('public/image', $filename);

            // Tạo URL để truy cập hình đại diện
            $images = asset('storage/image/' . $filename);
            
            // Lưu $images vào cơ sở dữ liệu hoặc thực hiện các tác vụ khác tùy theo yêu cầu của bạn.
        } else {
            $images = $product->image;
        }
        
        $product->title = $request->input('title')??$product->title;
        $product->price = $request->input('price')??$product->price;
        $product->cate_id = $request->input('cate')??$product->cate_id;
        $product->content = $request->input('content')??$product->content;
        $product->status = $request->input('status')??$product->status;
        $product->image = $images??$product->image;
        $product->update();

        return redirect()->route('indexProducts')->with('success',"Cập nhật sản phẩm thành công");
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::find($id);
        if ($products) {
            $title = $products->title;
            $products->delete();
            return redirect()->route('indexProducts')->with('success', "Xóa sản phẩm thành công $title");
        }
    }    
    public function destroyCate(string $id)
    {
        $cates = categories::find($id);
        if ($cates) {
            $name = $cates->name;
            $cates->delete();
            return redirect()->route('indexCates')->with('success', "Xóa loai sản phẩm thành công $name");
        }
    }    
}
