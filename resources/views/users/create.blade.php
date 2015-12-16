@extends('app')

@section('content')
    <h2 class="page-header">人作成</h2>

    {!! Form::open(array('action' => 'UserController@postCreate')) !!}
    <div class="form-group">
        {!! Form::label('name','名前') !!}
        {!! Form::text('name',null,array('required' => 'required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','メアド') !!}
        {!! Form::email('email',null,array('required' => 'required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','パスワード') !!}
        {!! Form::password('password',null, array('required' => "required", 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('登録',array('class' => 'btn btn-primary form-control')) !!}
    </div>
    {!! Form::close() !!}
@endsection