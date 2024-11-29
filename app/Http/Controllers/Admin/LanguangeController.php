<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLanguangeStoreRequest;
use App\Http\Requests\AdminLanguangeUpdateRequest;
use App\Models\Languange;
use Illuminate\Http\Request;

class LanguangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languanges = Languange::all();
        return view('admin.languange.index', compact ('languanges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.languange.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguangeStoreRequest $request)
    {
        $languange = new Languange();
        $languange->name = $request->name;
        $languange->lang = $request->lang;
        $languange->slug = $request->slug;
        $languange->default = $request->default;
        $languange->status = $request->status;
        $languange->save();

        toast(__('Created Successfully'),'success')->width('350');
        return redirect()->route('admin.languange.index');
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
        $languange = Languange::findOrFail($id);
        return view('admin.languange.edit', compact('languange'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminLanguangeUpdateRequest $request, string $id)
    {
        $languange = Languange::findOrFail($id);
        $languange->name = $request->name;
        $languange->lang = $request->lang;
        $languange->slug = $request->slug;
        $languange->default = $request->default;
        $languange->status = $request->status;
        $languange->save();

        toast(__('Updated Successfully'),'success')->width('350');
        return redirect()->route('admin.languange.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $languange = Languange::findOrFail($id);
            if($languange->lang === 'en') {
                return response(['status' => 'error', 'message'=>__('Can\t Delete This One!')]);
            }
            $languange->delete();
            return response(['status'=>'success', 'message'=>__('Deleted Successfully!')]);
        } catch (\Throwable $th) {
            return response(['status'=>'error', 'message'=>__('something went wrong')]);
        }
    }
}
