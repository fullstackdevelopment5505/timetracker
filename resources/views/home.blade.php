@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3">activity</label>
                        <div class="col-md-6">
                            <select id="activity" class="form-control">
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">start?</label>
                        <div class="col-md-6">
                            <button class="btn btn-success" id="start_btn">start activity</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">finish?</label>
                        <div class="col-md-6">
                            <button class="btn btn-danger" id="finish_btn">finish activity</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var current = 0;

        $('#start_btn').click(function () {
            var activity_id = $('#activity').val();

            $.ajax({
                type: "post",
                url: "{{ url('timesheet') }}",
                data: {
                    activity_id: activity_id
                },
                success: function (data) {
                    console.log("success", data)
                },
                error: function (status, data) {
                    console.log("status", status)
                    console.log("error", data)
                }
            })
        });

        $('#finish_btn').click(function () {
            var activity_id = $('#activity').val();

            $.ajax({
                type: "put",
                url: `{{ url('timesheet') }}/${current}`,
                data: {
                    activity_id: activity_id
                },
                success: function (data) {
                    console.log("success", data)
                },
                error: function (data) {
                    console.log("error", data)
                }
            })
        });
        
    })

</script>
@endsection
