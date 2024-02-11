<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DataTables;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('shop')->select('*');
            if ($request->filled('stock_available')) {
                $data->where('stock', $request->input('stock_available') ? '>' : '=', 0);
            }
    
            if ($request->filled('price_filter')) {
                $minMaxPrice = $request->input('price_filter') == 'min' ? 'asc' : 'desc';
                $data->orderBy('price', $minMaxPrice);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('shop_name', function($row){
                        $name = $row->shop->name;
                        return $name;
                    })
                    ->addColumn('action', function($row){
     
                        $btn = '<a href="'.url('products').'/' . $row->id . '/edit" class="btn btn-primary btn-sm mx-2">Edit</a>';
                        $btn .= '<a href="javascript:void(0)" data-id='. $row->id .' class="delete btn btn-danger btn-sm">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action','shop_name'])
                    ->make(true);
        }
        $this->data['module_name'] = 'product';    
        $this->data['products'] = Product::get(); 
    
        return view('admin.product.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['module_name'] = 'product';
        $this->data['shops'] = Shop::get();
        return view('admin.product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:products,name,' . $request->input('id') . ',id,shop_id,' . $request->input('shop_id'),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'shop_id' => 'required|exists:shops,id',
            'video' => 'mimetypes:video/mp4,video',
        ]);      
    
        if ($validator->fails()) {
            $response = [
                'status' => false,
                'msg' => 'Validation error.',
            ];

            if(!empty($validator->errors())){
                $response['error'] = $validator->errors();
            }

            return response()->json($response);
        }      

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->shop_id = $request->input('shop_id');

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('videos'), $videoName);
            $product->video = 'videos/' . $videoName;
        }

        $product->save();
        $response = [
            'status' => true,
            'msg' => 'Product created successfully',
        ];
        return response()->json($response);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['module_name'] = 'product';
        $this->data['product'] = Product::findOrFail($id);
        $this->data['shops'] = Shop::get();
        return view('admin.product.form', $this->data);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:products,name,' . $id . ',id,shop_id,' . $request->shop_id,
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'shop_id' => 'required|exists:shops,id',
            'video' => 'mimetypes:video/mp4,video', 
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => false,
                'msg' => 'Validation error.',
            ];

            if(!empty($validator->errors())){
                $response['error'] = $validator->errors();
            }

            return response()->json($response);
        } 

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->shop_id = $request->input('shop_id');

        if ($request->hasFile('video')) {
            // Delete the old video
            if (File::exists(public_path($product->video))) {
                File::delete(public_path($product->video));
            }

            $video = $request->file('video');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('videos'), $videoName);
            $product->video = 'videos/' . $videoName;
        }

        $product->save();

        $response = [
            'status' => true,
            'msg' => 'Product updated successfully',
        ];
        return response()->json($response);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id',$id)->first();

        if (File::exists(public_path($product->video))) {
            File::delete(public_path($product->video));
        }
        Product::where('id',$id)->delete();

        $response = [
            'status' => true,
            'msg' => 'Product deleted successfully',
        ];
        return response()->json($response);      
    }
}
