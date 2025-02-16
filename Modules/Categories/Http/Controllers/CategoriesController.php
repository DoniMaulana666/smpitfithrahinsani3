<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Categories\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function index()
    {
        $x['title']     = "Category";
        $x['data']      = Category::get();

        return view('categories::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_title'            => ['required', 'string', 'max:255'],
            'category_description'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $category = Category::create([
                'category_title'            => $request->category_title,
                'category_description'      => $request->category_description
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $category->category_title . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $category->category_title . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $category = Category::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data category by id',
            'data'      => $category
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_title'            => ['required', 'string', 'max:255'],
            'category_description'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $category = Category::find($request->id);
            $category->update([
                'category_title'  => $request->category_title,
                'category_description'  => $request->category_description
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $category->category_title . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $category->category_title . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $category = Category::find($request->id);
            $category->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $category->category_title . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $category->category_title . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
