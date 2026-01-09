<?php
// コントローラー作成コマンド
// sail artisan make:controller RequestSampleController

namespace App\Http\Controllers;

//リクエスト専用クラス
use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
        return view('form');
    }

    //現在の HTTP リクエストを $request に入れる　URLクエリパラメーター
    public function queryStrings(Request $request)
    {
        #$keyword ='未設定';
        #if ($request->has('keyword')) {
        #    $keyword = $request->keyword;
        #}
        //送信データからkeyword(form.blade.phpのlabel)を取り出して$keywordに代入する
        $keyword = $request->get('keyword', '未設定');
        return 'キーワードは「'.$keyword.'」です';
    }

    public function profile($id)
    {
        return 'ID: '. $id;
    }

    public function productsArchive(Request $request, $category, $year)
    {
        return 'category: '. $category.'<br>year: '. $year. '<br>page: '. $request->get('page', 1);
    }

    public function routeLink()
    {
        $url = route('profile', ['id' =>1, 'photos' => 'yes']);
        return 'プロフィールページのURLは'. $url;
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->get('email') === 'user@example.com' && $request->get('password') === '12345678') {
            return 'ログイン成功';
        }
        return 'ログイン失敗';
    }

}
