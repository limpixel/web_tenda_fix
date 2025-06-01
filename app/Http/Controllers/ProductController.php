<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    
class ProductController extends Controller
{ 
    
    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }
   

    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('product.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    
    public function create(): View
    {
        $products = Product::latest();
        return view('product.create', compact('products') );
    }
    
   
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name_product' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'masa_waktu' => 'required|string|max:255',
            'harga' => 'required|integer',
            'satuan' => 'required|integer',
            'tipe' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/products/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $productImage);
            $input['image'] = $productImage;
        }


        Product::create($input);
    
        notify('success', 'Product created successfully!');
        return redirect()->route('dashboard.product.index');
    }
    
  
    public function show(Product $product): View
    {
        return view('product.show',compact('product'));
    }
    
    
    public function edit(Product $product): View
    {
        return view('product.edit',compact('product'));
    }
    
   
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name_product' => 'required|string|max:255',
        'ukuran' => 'required|string|max:255',
        'masa_waktu' => 'required|string|max:255',
        'harga' => 'required|integer',
        'satuan' => 'required|integer',
        'tipe' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        // Optional: delete old image
        if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
            unlink(public_path('images/products/' . $product->image));
        }

        $destinationPath = 'images/products/';
        $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move(public_path($destinationPath), $productImage);
        $input['image'] = $productImage;
    }

    $product->update($input);

    notify('success', 'Product updated successfully!');
    return redirect()->route('dashboard.product.index');
}


    
    
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
    
        return redirect()->route('dashboard.product.index')
                        ->with('success','Product deleted successfully');
    }
}