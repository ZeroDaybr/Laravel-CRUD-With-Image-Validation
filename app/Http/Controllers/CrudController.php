<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Crud::get();

        return view("pages.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cruds|max:255',
            'email' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048',
            'date' => 'nullable',
        ]);
        // if ($request->hasFile('image')) {
        //     // Get filename with extension
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();

        //     //Get just file name
        //     $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //     // Get just ext
        //     $extension = $request->file('image')->guessClientExtension();

        //     // File name to store
        //     $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        //     // Upload image
        //     $path = $request->file('image')->storeAs('/public/images', $fileNameToStore);
        // } else {
        //     $fileNameToStore = "noimage.jpg";
        // }
        // Crud::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'description' => $request->input('description'),
        //     'image' => $fileNameToStore,
        //     'date' => date('Y-m-d H:i:s')
        // ]);

        $requestData = $request->all();
        $file = $request->image;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extension;
            $file->move('images/crud', $fileName);
            $path = '/images/crud/' . $fileName;
        } else {
            $path = null;
        }
        $requestData['image'] = $path;
        crud::create($requestData);
        return redirect()->route('home.index');
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
        // dd($id);
        $data = Crud::findOrFail($id);
        return view("pages.update", compact("data"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $crud = Crud::findOrFail($id);
        $requestData = $request->all();
        $file = $request->image;

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extension;
            $file->move('images/crud', $fileName);
            $path = '/images/crud/' . $fileName;
        } else {
            $path= $crud->image;
        }
        $requestData['image'] = $path;
        $crud->update($requestData);

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Crud::destroy($id);
        return redirect()->route('home.index');
    }
}
