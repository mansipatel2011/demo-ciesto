<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DataTables;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Shop::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.url('shops').'/' . $row->id . '/edit" class="btn btn-primary btn-sm mx-2">Edit</a>';
                           $btn .= '<a href="javascript:void(0)" data-id='. $row->id .' class="delete btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $this->data['module_name'] = 'shop';
        $this->data['shops'] = Shop::get();
        return view('admin.shop.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['module_name'] = 'shop';
        return view('admin.shop.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:shops,email',
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

        $shop = new Shop();
        $shop->name = $request->input('name');
        $shop->address = $request->input('address');
        $shop->email = $request->input('email');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $shop->image =  $imageName;
        }
        $shop->save();

        $response = [
            'status' => true,
            'msg' => 'Shop created successfully',
        ];
        return response()->json($response);    }

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
        $this->data['module_name'] = 'shop';
        $this->data['shop'] = Shop::findOrFail($id);
        return view('admin.shop.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:shops,email,' . $id,
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

        $shop = Shop::findOrFail($id);
        $shop->name = $request->input('name');
        $shop->address = $request->input('address');
        $shop->email = $request->input('email');
        if ($request->hasFile('image')) {
            // Delete the old image
            if (File::exists(public_path($shop->image))) {
                File::delete(public_path($shop->image));
            }
    
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $shop->image =  $imageName;
        }
        $shop->save();

        $response = [
            'status' => true,
            'msg' => 'Shop updated successfully',
        ];
        return response()->json($response);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = Shop::where('id',$id)->first();
        if (File::exists(public_path($shop->image))) {
            File::delete(public_path($shop->image));
        }
        Shop::where('id',$id)->delete();

        $response = [
            'status' => true,
            'msg' => 'Shop deleted successfully',
        ];
        return response()->json($response);    
    }

    /*Import csv data*/
    public function import(Request $request)
    {
        $validator = Validator::make($request->get(), [
            'file' => 'required|mimes:csv',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
    
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
    
            $validator = Validator::make(['email' => $data[1]], [
                'email' => [
                    'required',
                    'email',
                    Rule::unique('shops')->where(function ($query) use ($data) {
                        return $query->where('name', $data[0]);
                    }),
                ],
            ]);
    
            if ($validator->fails()) {
                continue;
            }
    
            // Check if the shop with the same email already exists
            $existingShop = Shop::where('email', $data[1])->first();
    
            if ($existingShop) {
                // Update the existing shop data or handle as needed
                $existingShop->update([
                    'name' => $data[0],
                    'address' => $data[2],
                ]);
            } else {
                Shop::create([
                    'name' => $data[0],
                    'email' => $data[1],
                    'address' => $data[2],
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }

    /*Export csv data*/
    public function export()
    {
        $shops = Shop::get();
        $currentDate = Carbon::now()->format('Y-m-d');
        $csvFileName = 'shop_export_' . $currentDate . '.csv';
        $filePath = storage_path('app/' . $csvFileName);

        $handle = fopen($filePath, 'w');
        fputcsv($handle, ['Name', 'Email', 'Address']);

        foreach ($shops as $value) {
            fputcsv($handle, [$value->name, $value->email, $value->address]);
        }

        fclose($handle);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
