@extends ('layouts.app')
@section ('content')

<h2 class="mb-3">ToDo編集</h2>
<!-- PUTはPOSTと同じような働きをしてくれるが、POSTと違って処理が重複しても効果は同じになる。 -->
{!! Form::open(['route' => ['todo.update', $todo->id], 'method' => 'PUT']) !!}
  <div class="form-group">
  <!-- 第一引数でinputのtextボックスを指定、第二引数でname属性にtitleを指定、第三引数でvalueを記述 -->
  <!-- requiredで入力を必須条件に指定 -->
  {!! Form::input('text', 'title', $todo->title, ['required', 'class' => 'form-control']) !!}
  </div>
  <!-- []の中はそのメソッドに追記しているもの -->
  {!! Form::submit('更新', ['class' => 'btn btn-success float-right']) !!}
  {!! Form::close() !!}

@endsection