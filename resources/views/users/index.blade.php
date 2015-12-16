@extends('app')

@section('content')
    <h2 class="page-header">人一覧</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>名前</th>
            <th>メアド</th>
            <th>作成日時</th>
            <th>更新日時</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    {!! Form::open(array('method'=>'get','action' => array('UserController@getEdit',$user->id))) !!}
                    {!! Form::submit('編集',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(array('action' => array('UserController@postDelete',$user->id))) !!}
                    {!! Form::submit('削除',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection