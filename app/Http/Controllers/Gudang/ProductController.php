<?php

namespace App\Http\Controllers\Gudang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\JenisProduct;
use App\Models\ProductPicture;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gudang.product')->with('data', Product::paginate(10))->with('jenis_product', JenisProduct::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product;
        $data->id_jenis_product = $request->jenis;
        $data->name = $request->name;
        $data->low_name = strtolower($request->name);
        $data->unit = $request->unit;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->status = $request->status;
        $data->promo = $request->promo;
        $data->size = $request->size;
        $data->detail = $request->detail;

        if ($request->hasFile('picture')) {
            $uploadedFile  = $request->file('picture');
            $file_up       = $uploadedFile->store('public/product');
            $data->picture = \Storage::url($file_up);
        }

        $data->save();

        $picture = new ProductPicture;
        $picture->status = 1;
        $picture->id_product = $data->id;
        $picture->picture = \Storage::url($file_up);
        $product->save();

        Session::flash('success', 'Product berhasil di Simpan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $picture = ProductPicture::where('id_product', $id)->get();
        $product = Product::find($id);

        return view('admin.gudang.edit_picture')->with('data', $picture)->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);
        $data->id_jenis_product = $request->jenis;
        $data->name = $request->name;
        $data->low_name = strtolower($request->name);
        $data->unit = $request->unit;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->status = $request->status;
        $data->promo = $request->promo;
        $data->size = $request->size;
        $data->detail = $request->detail;

        if ($request->hasFile('picture')) {
            $uploadedFile  = $request->file('picture');
            $file_up       = $uploadedFile->store('public/product');
            $data->picture = \Storage::url($file_up);

            $picture = ProductPicture::where('id_product', $id)->where('status', 1)->first();
            if (!empty($picture)) {
                $picture->status = 1;
                $picture->id_product = $data->id;
                $picture->picture = \Storage::url($file_up);
                $product->save();
            }
        }

        $data->save();

        Session::flash('success', 'Product berhasil di Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPicture($id) {
        $data = ProductPicture::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newPicture(Request $request) {
        $data = new ProductPicture;
        $data->id_product = $request->id_product;
        $data->status = $request->status;
        
        $uploadedFile  = $request->file('picture');
        $file_up       = $uploadedFile->store('public/product');
        $data->picture = \Storage::url($file_up);

        $data->save();

        Session::flash('success', 'Product Picture berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePicture($id, Request $request) {
        $data = ProductPicture::find($id);

        if ($request->hasFile('picture')) {
            $uploadedFile  = $request->file('picture');
            $file_up       = $uploadedFile->store('public/product');
            $data->picture = \Storage::url($file_up);

            if ($request->status == '1') {
                $data->status = $request->status;
                $product = Product::findOrFail($data->id_product);
                $product->picture = \Storage::url($file_up);
                $product->save();
            }
        } else {
            $data->status = $request->status;
            if ($request->status == '1') {
                $product = Product::findOrFail($data->id_product);
                $product->picture = $data->picture;
                $product->save();
            }
        }

        $data->save();

        Session::flash('success', 'Product Picture berhasil diupdate');
        return redirect()->back();
    }

    public function deletePicture($id) {
        $role = ProductPicture::find($id)->delete();

        Session::flash('success', 'ProductPicture berhasil di hapus');
        return redirect()->back();
    }
}
