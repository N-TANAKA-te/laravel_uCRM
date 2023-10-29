<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InertiaTest;
use Inertia\Inertia;

class InertiaTestController extends Controller
{
    public function index()
    {
        // inertia::renderでカッコ内のviewファイルを呼び出す
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
        return Inertia::render('Inertia/Show', 
        [
        // dd($id);←ddを付けるとそこの箇所で処理を止めてlaravelでデバッグができる
            'id' => $id
        ]);

    }

    public function store(Request $request)
    {

    $request->validate([
        'title' => ['required', 'max:20'],
        'content' => ['required'],
    ]);

      $inertiaTest = new InertiaTest;
      $inertiaTest->title = $request->title;
      $inertiaTest->content = $request->content;
      $inertiaTest->save();

      return to_route('inertia.index')->with([
        'message' => '登録しました。'
      ]);
    }

}
