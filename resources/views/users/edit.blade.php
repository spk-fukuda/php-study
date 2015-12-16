@extends('app')

@section('content')
    <h2 class="page-header">人編集</h2>

    {!! Form::open(array('action' => array('UserController@postEdit', $user->id))) !!}
    <div class="form-group">
        {!! Form::label('name','名前') !!}
        {!! Form::text('name',$user->name,['required', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','メアド') !!}
        {!! Form::email('email',$user->email,['required', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','パスワード') !!}
        {!! Form::password('password',null, ['required', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('登録',['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection