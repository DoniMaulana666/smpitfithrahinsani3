<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Posts\Models\Post;
use Modules\Categories\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class PostsController extends Controller
{
    public function index()
    {
        $x['title']           = "Post";
        $x['data']            = Post::join('categories', 'categories.id', '=', 'posts.category_id')->get();
        $x['categories']      = Category::get();
        // dd($x['data']);
        return view('posts::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'      => ['required'],
            'post_title'      => ['required', 'string', 'max:255'],
            'post_description'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $post = Post::create([
                'category_id'           => $request->category_id,
                'post_title'            => $request->post_title,
                'post_description'      => $request->post_description
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $post->post_title . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $post->post_title . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $post = Post::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data post by id',
            'data'      => $post
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $post = Post::find($request->id);
            $post->update([
                'name'  => $request->name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $post->name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $post->name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $post = Post::find($request->id);
            $post->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $post->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $post->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
