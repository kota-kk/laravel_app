<?php
//namespaceはソースコードの先頭で宣言、先にHTMLなどは使用しないこと
//例えば今回ならuse app/**とすることでappというネームを持った**を指定できる
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

//ModelとはMVC構造のMにあたり、テーブル名の単数形で命名する決まりがある。
//9行目はTodoモデルをtodosテーブルに保存させている
//12行目で$fillableに指定したカラムのみに値を代入させることができる
//ホワイトリストとも呼ばれ、ブラックリストとして逆の動きをする$guardedがある。
class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'user_id'];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }// 要検索案件
}
//つまりここではtodosテーブルにtodoを保存させているが、保存させるのはtitleカラムのみと指定している。

