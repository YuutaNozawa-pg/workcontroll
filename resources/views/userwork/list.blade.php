@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ url('/userwork/index') }}">
                @csrf

                @for ($i = 0; $i < 14; $i++)
                    <input type="submit" name="id" value="{{ $i }}">
                @endfor
            </form>
        </div>
    </div>
</div>
@endsection