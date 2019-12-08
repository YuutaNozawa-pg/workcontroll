@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form-action" method="POST" action="{{ url('userwork/update') }}">
                @csrf
                <input type="hidden" name="year" value="{{ $current->year }}">
                <button name="month" value="{{ $current->month }}" class="btn btn-outline-primary" type="submit" >更新</button>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-timesheet">一括入力</button>
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
                                <input type="hidden" name="day[]" value="{{ $i }}">
                                <td>{{ $current->month }}/{{ $i }}</td>
                                @if (count($userWorks) != 0) 
                                    <input type="hidden" name="id[]" value="{{ $userWorks[$i - 1]['id'] }}">
                                    <td><input name="start_time[]" class="input-start form-control" type="text" value="{{ $userWorks[$i - 1 ]['start_time'] }}"></td>
                                    <td><input name="end_time[]" class="input-end form-control" type="text" value="{{ $userWorks[$i - 1 ]['end_time'] }}"></td>
                                    <td><input name="break_time[]" class="input-break form-control" type="text" value="{{ $userWorks[$i - 1 ]['break_time'] }}"></td>
                                    <td><input name="over_time[]" class="input-over form-control" type="text" value="{{ $userWorks[$i - 1 ]['over_time'] }}"></td>
                                @else
                                    <td><input name="start_time[]" class="input-start form-control" type="text" value=""></td>
                                    <td><input name="end_time[]" class="input-end form-control" type="text" value=""></td>
                                    <td><input name="break_time[]" class="input-break form-control" type="text" value=""></td>
                                    <td><input name="over_time[]" class="input-over form-control" type="text" value=""></td>
                                @endif
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </form>

            <div class="modal fade" id="modal-timesheet" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hiddden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>一括入力出来ます</h4>
                        </div>
                        <div class="modal-body">
                            <ul style="list-style: none;">
                                <li>出勤<input class="bulk-input-start" type="text"></li>
                                <li>退勤<input class="bulk-input-end" type="text"></li>
                                <li>休憩<input class="bulk-input-break" type="text"></li>
                                <li>残業<input class="bulk-input-over" type="text"></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="bulk-input-button btn btn-outline-primary" data-dismiss="modal">一括更新する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
window.onload = function() {
    bulkInput();

    function bulkInput() {
        $('.bulk-input-button').on('click', function() {
            const startTime = $('.bulk-input-start').val();
            const endTime = $('.bulk-input-end').val();
            const breakTime = $('.bulk-input-break').val();
            const overTime = $('.bulk-input-over').val();

            setEachTime('.input-start', startTime);
            setEachTime('.input-end', endTime);
            setEachTime('.input-break', breakTime);
            setEachTime('.input-over', overTime);
            
            console.log($('.form-action').attr('action', '/userwork/create'));
            
        });
    }
    function setEachTime(objectName, time)
    {
        $(objectName).each(function() {
            $(this).val(time);
        });

    }
};
</script>