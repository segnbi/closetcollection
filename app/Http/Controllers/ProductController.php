<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request):Response
  {
    if($request->routeIs('admin.*')) {
      return Inertia::render('Admin/Products/Index', [
        'products' => Product::with('images')->get()
      ]);
    }

    return Inertia::render('Public/Welcome', [
      'products' => Product::with('images')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return Inertia::render('Admin/Products/Create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required',
      'images' => 'required',
      'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:500',
      'description' => 'required',
      'price' => 'required',
    ]);

    $product = Product::create([
      'name' => $validated['name'],
      'price' => $validated['price'],
      'description' => $validated['description'],
    ]);

    foreach ($validated['images'] as $validImage) {
      $path = $validImage->store('images/products', 'public');

      $product->images()->create([
        'path' => $path
      ]);
    }

    return redirect()->route('admin.products.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    $products = $product->with('images')->get();

    foreach($products as $key => $value) {
      if($value->id == $product->id) {
        $product = $value;
        $previous = ($key > 0)? $products[$key - 1]: null;
        $next = ($key < sizeof($products) - 1)? $products[$key + 1]: null;
      }
    }

    return Inertia::render('Public/Products/Show', [
      'product' => $product,
      'previous' => $previous,
      'next' => $next,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    return Inertia::render('Admin/Products/Edit', [
      'product' => $product->with('images')->where('id', $product->id)->first(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product, Image $image)
  {
    $validated = $request->validate([
      'name' => 'required',
      'images' => 'nullable',
      'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:500',
      'description' => 'required',
      'price' => 'required',
    ]);

    $product->update($validated);

    if (!empty($validated['images'])) {
      foreach ($image->where('product_id', $product->id)->get() as $image) {
        $image->delete();
        Storage::disk('public')->delete($image->path);
      }

      foreach ($validated['images'] as $validImage) {
        $path = $validImage->store('images/products', 'public');

        $product->images()->create(
          ['path' => $path]
        );
      }
    }

    return redirect()->route('admin.products.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product, Image $image)
  {
    foreach ($image->where('product_id', $product->id)->get() as $image) {
      Storage::disk('public')->delete($image->path);
    }

    $product->delete();

    return redirect()->route('admin.products.index');
  }
}
