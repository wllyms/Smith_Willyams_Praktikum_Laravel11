<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Product;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /** 
     * index 
     *  
     * @return void 
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    /** 
     * create 
     *  
     * @return View 
     */
    public function create(): View
    {
        return view('products.create');
    }


    /** 
     * store 
     *  
     * @param mixed $request 
     * @return RedirectResponse 
     */

    public function store(Request $request): RedirectResponse
    {
        //validate form  
        $request->validate([
            'image'          => 'required|image|mimes:jpeg,jpg,png|max: 2048',
            'title'          => 'required|min:5',
            'description'    => 'required|min:10',
            'price'          => 'required|numeric',
            'stock'          => 'required|numeric'
        ]);

        $image = $request->file('image');

        $imagePath = $image->storeAs('products', $image->hashName(), 'public');

        //create product 
        Product::create([
            'image'          => basename($imagePath),
            'title'          => $request->title,
            'description'    => $request->description,
            'price'          => $request->price,
            'stock'          => $request->stock
        ]);

        //redirect to index 
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param mixed $id
     * @return View
     */

    public function show(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.show', compact('product'));
    }

    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);
        //render view with product
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            //delete old image
            Storage::delete('public/products/' . $product->image);
            //update product with new image
            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            //update product without image
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }
        //redirect to index
        return redirect()->route('products.index')->with(['success' =>
        'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
{
    // Ambil data produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Hapus gambar dari penyimpanan jika ada
    if ($product->image) {
        Storage::delete('public/products/' . $product->image);
    }

    // Hapus data produk dari database
    $product->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('products.index')->with(['success' => 'Data berhasil dihapus!']);
}

}
