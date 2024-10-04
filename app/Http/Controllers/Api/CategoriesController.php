<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =categories::latest()->paginate(5);

        $response = [
            'massage' =>'list all level',
            'data'    => $categories,
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $validator = validator::make($request->all(),[
            'categories' => 'required|unique:categories|min:2',
        ]);

        //jika validasi gagal
        if ($validator->fails()) {
            return response ()->json([
                'massage' => 'invalid field',
                'errors'  => $validator->errors()
            ],422);
        }

        //jika validasi sukses masukan data level ke database
        $categories = categories::create([
            'categories' => $request->categories,
            'is_active'  => $request->input('is_active', 1)
        ]);

        //response
        $response = [
            'succes' => 'Add level succes',
            'data'   => $categories,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //define validation rules
        $validator = validator::make($request->all(),[
            'categories' => 'required|unique:categories|min:2',
        ]);

        //chek if validation fails
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        //find level by ID
        $categories = categories::find($id);

        $categories->update([

        ]);

        //response
        $response = [
            'status'    => 'succes',
            'message'   => 'update category success',
            'data'      => $categories,
        ];
        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            //find charecter by ID
            $categories = categories::find($id);


            if (isset($categories)) {
                //jika data ditemukan delete image from storage
                $storage::delete('public/chategory/',basename($categories->image));

                //delete post
                $categories->delete();

                $response = [
                    'success' => 'delete chategory success',
                ];
                return response ()->json($response,200);



            }
        }
    }

}
