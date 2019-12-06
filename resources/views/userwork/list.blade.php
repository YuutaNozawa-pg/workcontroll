@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ url('/userwork/index') }}">
                @csrf

                @for ($i = 1; $i < 13; $i++)
                    <div class="list-group">
                        <button name="month" value="{{ $i }}" class="list-group-item list-group-item-action">
                            {{ $year }}/{{ $i }}
                        </button>
                    </div>
                @endfor
            </form>
        </div>
    </div>
</div>
@endsection