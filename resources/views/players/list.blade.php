@extends('wta')

@section('content')
    <h2 class="page-header">WTA Players</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Nationality</th>
            <th>URL</th>
        </tr>
        </thead>

        <tbody>
        @foreach($players as $player)
            <tr>
                <td>{{ $player->name }}</td>
                <td>{{ $player->national }}</td>
                <td>{{ $player->url }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection