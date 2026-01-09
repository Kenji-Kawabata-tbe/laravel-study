<?php
// コントローラー作成コマンド
// sail artisan make:controller EventController -r

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // 登録画面表示
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // 登録処理
    public function store(Request $request)
    {
        $title = $request->get('title');
        //Log::debug('イベント名: '. $request->get('title'));
        Log::debug('イベント名: '. $title);
        // これだとブラウザをリロードするとログがまた書き込まれる
        // POSTメソッドによってアクセスしたページは再読み込みすると再度同じ入力内容を送信してしまう
        // ECサイトの購入ページやオンラインバンクの入出金とかだと致命的
        // return view('events.create');
        // なのでリダイレクトさせる
        // return to_route('events.create');
        // returnにフラッシュメッセージで完了メッセージを出す
        //   フラッシュメッセージ
        //      次のリクエストまで有効な一時的なセッション
        //      次のリクエスト処理後に自動削除される
        //   次のリクエストで使える一時的なデータ(success)をセッションに入れてevents.createにリダイレクト
        return to_route('events.create')->with('success', $title. 'を登録しました');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
