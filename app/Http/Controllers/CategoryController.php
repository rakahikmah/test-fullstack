<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // $category = Categories::all();
        $category = Categories::paginate(5);
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);

        $categories = Categories::create([
            'name' => $request->name
        ]);

        if ($categories) {
            return redirect()
                ->route('category.index')
                ->with([
                    'success' => 'New Category add data has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('category.edit', compact('category'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);

        $categories = Categories::findOrFail($id);

        $categories->update([
            'name' => $request->name
        ]);

        if ($categories) {
            return redirect()
                ->route('category.index')
                ->with([
                    'success' => 'Category Update Data has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }


    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        if ($category) {
            return redirect()
                ->route('category.index')
                ->with([
                    'success' => 'Category has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('category.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }

}
