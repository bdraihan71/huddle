@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Create Schedule</h4>
                </div>
            </div>

            <div class="row">
                <div class="card-box col-12">
                    <div class="row">
                        <div class="col-3">Name</div>
                        @foreach($days as $day)
                            <div class="col-1">{{$day[0].' '.$day[1]}}</div>
                        @endforeach
                        <div class="col-1"></div>
                    </div>
                    <hr>
                    @foreach($users as $user)
                    <form action="/scheduler/{{$user->id}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-3">{{$user->name}}</div>
                            
                            @foreach($schedules[$loop->index] as $schedule)
                                <div class="col-1">
                                    <input type="hidden" name="date[]" value="{{$days[$loop->index][1]}}">
                                    @if($schedule == 'day-off')
                                        <div class="text-center btn-danger">
                                            <input type="hidden" name="s_id[]" value="off">
                                            DAY OFF
                                        </div>
                                    @elseif($schedule == false)
                                        <input type="hidden" name="s_id[]" value="null">
                                        @include('templates.schedule-default-form')
                                    @else
                                        <input type="hidden" name="s_id[]" value="{{$schedule->id}}">
                                        @include('templates.schedule-form')
                                    @endif
                                </div>
                            @endforeach

                            <div class="col-1">
                                <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            </div>
                        </div>
                        <hr>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection