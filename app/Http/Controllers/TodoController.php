<?php

namespace App\Http\Controllers;
//イルミネートファイルはここらしい。ないけど。→vender > laravel > framework > src > Illuminate
use Illuminate\Http\Request;
use App\Todo;
use Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // $todoにはTodoクラスのインスタンスが格納されている
    private $todo;
    
    //初期値の設定　__constructの引数で送られたTodoを取得して$instanceClassに格納
    //$this->todo（$Todoを）インスタンス化した際に$instanceClassを代入することで＄Todoの値を変更している
    public function __construct(Todo $instanceClass)
    {
        $this->middleware('auth');
        $this->todo = $instanceClass;
        // dd($this->todo);
    }

    public function index()
    {
        $todos = $this->todo->getByUserId(Auth::id());
        // dd($this->todo);//App/Todo
        // dd($todos);//App/Todo
        // CollectionインスタンスにItemが配列で格納されて返ってきてる
        //all()がget()でも同じ値？
        // $todos = $this->todo->all();
        //Collectionインスタンス
        // dd($todos);
        // exit;
        
        //todo.indexのnameをもつのはここ、なのでURIのtodoがたぶんポイント？？
        //todoフォルダのindex.blade.phpへの遷移なら納得、、
        return view('todo.index', compact('todos'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
        // view関数の戻り値は
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Request $requestはファイル上部にあるuse Illuminate\Http\Request;のこと、またそのインスタンス化で、POSTされた情報を取得している。
    public function store(Request $request)
    {
        // Formで送信したPOSTをRequestで取得している。
        //$input = array2[["_token" => "hoge"],["title" => "huga"]つまり連想配列
        $input = $request->all();
        // dd($request->all());//結果はトークンとタイトル
        // dd($this->todo->fill($input));
        $input['user_id'] = Auth::id();
        // ログインしているユーザーを Auth::id() という形で取得を可能にするために追記
        // dd($input);

        
        $this->todo->fill($input)->save();
        //fillメソッドの戻り値をｄｄ
        //fillで何が変わっているか
        //save()でINSERT文を実行している。
        return redirect()->route('todo.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // todo{todo}の{todo}のところはGetで渡ったカラム名（パラメータ）で、その値を$idで取得している。
    public function edit($id)
    {
        // ここで$idで渡ってきた値を素にDBへ検索をかけて指定のデータのみを取得できるようにしている
        $todo = $this->todo->find($id);
        // dd($this->todo->find($id));
        return view('todo.edit', compact('todo'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Request $requestはファイル上部にあるuse Illuminate\Http\Request;のこと、またそのインスタンス化で、POSTされた情報を取得している。
        $input = $request->all();
        //連想配列でメソッド・トークン・インスタンス。
        // dd($request);
        // exit;
        //fillで限定されたものをsave()で保存してるよ
        // dd($this->todo->find($id)->fill($input));
        // dd($this->todo->find($id));
        // $this->todo->find($id)->fill($input)->save();
        $todo = $this->todo->find($id);
        $todo->fill($input);
        $todo->save();
        //強制的に一覧に帰れと命令されてるよ
        return redirect()->route('todo.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $this->todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
}
