@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ url('userwork/update') }}">
                @csrf
                <button name="month" value="{{ $current->month }}" class="btn btn-outline-primary" type="submit" >更新</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>{{ $current->year }}</td>
                            <td>出勤</td>
                            <td>退勤</td>
                            <td>休憩</td>
                            <td>残業</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= $current->daysInMonth; $i++)
                        <tr class="form-group">
                            <td>{{ $current->month }}/{{ $i }}</td>
                            <td><input name="start_time[]" class="form-control" type="text" value=""></td>
                            <td><input name="end_time[]" class="form-control" type="text" value=""></td>
                            <td><input name="break_time[]" class="form-control" type="text" value=""></td>
                            <td><input name="over_time[]" class="form-control" type="text" value=""></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection