@extends('layouts.app')

@section('content')
    <form action="/userwork" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary float-right">作成</button>
    </form>
    <ul class="list-group mt-5">
        @foreach ($userWorkList as $userWork)
            <li class="list-group-item"><a href="/userwork/{{ $userWork->id }}">{{ $userWork->date->format('Y年m月') }}</a></li>
        @endforeach
    </ul>
@endsection