@extends('layouts.app')

@section('content')
            <form action="/scheduler" method="get">
            <br><br><br><br>
            <div class="container-fluid">
                <div class="row scheduler-header">
                    <div class="col-4">
                        <h3 class="page-title-scheduler text-uppercase font-weight-bold"><small class="text-white">Scheduler for</small> <br> {{date("D d M", strtotime($days[0][1])).' to '.date("D d M", strtotime($days[6][1]))}}</h3>
                    </div>
                    <div class="col-3 my-4">
                        <div class="row">
                            <div class="col-6">
                                <h5>Select date range</h5>
                            </div>
                            <div class="col-6">
                                <select name="date" class="form-control">
                                    <option value="{{date("d M", strtotime($days[0][1]))}}">{{date("d M", strtotime($days[0][1])).' to '.date("d M", strtotime($days[6][1]))}}</option>
                                    @foreach($dates as $date)
                                        @if($days[0][1] != date("Y-m-d", strtotime($date[0])))
                                            <option value="{{$date[0]}}">{{date("d M", strtotime($date[0])).' to '.date("d M", strtotime($date[1]))}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
                        <br>
                        <div class="col-3 mt-4 mb-0">
                            <div class="row">
                                <div class="col-5">
                                    <h5>Select a branch</h5>
                                </div>
                                <div class="col-7">
                                    <select name="branch" class="form-control">
                                        @if ($b == null)
                                            <option value="">All</option>
                                        @else
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                        @endif
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                        <option value="">All</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endif
                    <div class="col-2 mt-4">
                        <button class="btn btn-primary huddle-brown-btn-schedule" type="submit">Submit</button>
                    </div>
                </div>
                </div>    
            </form>

<<<<<<< HEAD
            <div class="bg-white scheduler">
                <div class="header page-title-schedule text-uppercase font-weight-bold">
                    <div class="row pt-3">
                        <div class="col-md text-center">Name</div>
                        @foreach($days as $day)
                            <div class="col-md">
                                {{date("D d M", strtotime($day[1]))}}
                                
                                {{date("Y", strtotime($day[1]))}}
                            </div>
                        @endforeach
                        <div class="col-md-1 text-center">Action</div>
                    </div><!-- row -->
                    <hr>
                </div>
                
                 <div class="table">
                     @foreach($users as $user)
                        <form action="/scheduler/{{$user->id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md text-center my-auto font-weight-bold" id="{{$user->id}}">{{$user->name}}</div>
                                @foreach($schedules[$loop->index] as $schedule)
                                <input type="hidden" name="date[]" value="{{$days[$loop->index][1]}}">
                                    <div class="col-md">
                                        @if (App\Leave::where('user_id', $user->id)->where('start', '<=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('end', '>=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('is_approved', 1)->first() != null)
                                            <div class="text-center btn btn-outline-danger h-100 w-100">
                                                <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
                                                <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
                                                <input type="hidden" value="" name="end[]">
                                                <input type="hidden" value="" name="start[]">
                                                <input type="hidden" name="s_id[]" value="0">
                                                <h6>{{App\Leave::where('user_id', $user->id)->where('start', '<=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('end', '>=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('is_approved', 1)->first()->leavetype->name}}</h6>
                                            </div>
                                        @elseif ($schedule == 'false')
                                            <input type="hidden" name="s_id[]" value="0">
                                            @include('templates.schedule-default-form')
                                        @elseif (is_string($schedule))
                                            <div class="text-center btn btn-outline-danger h-100 w-100">
                                                <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
                                                <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
                                                <input type="hidden" value="" name="end[]">
                                                <input type="hidden" value="" name="start[]">
                                                <input type="hidden" name="s_id[]" value="0">
                                                <h6>{{ucfirst($schedule)}}</h6>
                                            </div>
                                        @else
                                            @if ($schedule->date != $days[$loop->index][1])
=======
            <div class="row">
                <div class="bg-white scheduler">
                    <div class="header page-title-schedule text-uppercase">
                        <div class="row pt-3">
                            <div class="col-md-1 text-center">Name</div>
                            @foreach($days as $day)
                                <div class="col-md">
                                    {{date("D d M", strtotime($day[1]))}}
                                    
                                    {{date("Y", strtotime($day[1]))}}
                                </div>
                            @endforeach
                        </div><!-- row -->
                        <hr>
                    </div>
                    
                     <div class="table">
                         @foreach($users as $user)
                            <form action="/scheduler/{{$user->id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-1 text-center" id="{{$user->id}}">{{$user->name}}
                                        <button type="submit" class="btn btn-success btn-rounded">Save</button>
                                    </div>
                                    @foreach($schedules[$loop->index] as $schedule)
                                    <input type="hidden" name="date[]" value="{{$days[$loop->index][1]}}">
                                        <div class="col-md">
                                            @if (App\Leave::where('user_id', $user->id)->where('start', '<=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('end', '>=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('is_approved', 1)->first() != null)
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
                                                    <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
                                                    <input type="hidden" value="" name="end[]">
                                                    <input type="hidden" value="" name="start[]">
                                                    <input type="hidden" name="s_id[]" value="0">
                                                    <h6>{{App\Leave::where('user_id', $user->id)->where('start', '<=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('end', '>=', $leaveDate->copy()->addDays($loop->index)->format('Y-m-d'))->where('is_approved', 1)->first()->leavetype->name}}</h6>
                                                </div>
                                            @elseif ($schedule == 'false')
>>>>>>> caa08ce52d43dda553b2dbc932ddda4be5d80e2b
                                                <input type="hidden" name="s_id[]" value="0">
                                                @include('templates.schedule-default-form')
                                            @elseif (is_string($schedule))
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
                                                    <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
                                                    <input type="hidden" value="" name="end[]">
                                                    <input type="hidden" value="" name="start[]">
                                                    <input type="hidden" name="s_id[]" value="0">
                                                    <h6>{{ucfirst($schedule)}}</h6>
                                                </div>
                                            @else
                                                @if ($schedule->date != $days[$loop->index][1])
                                                    <input type="hidden" name="s_id[]" value="0">
                                                    @include('templates.schedule-form')
                                                @else
                                                    <input type="hidden" name="s_id[]" value="{{$schedule->id}}">
                                                    @include('templates.schedule-form')
                                                @endif
                                            @endif
<<<<<<< HEAD
                                        @endif
                                    </div>
                                @endforeach
                                <div class="col-md-1 text-center my-auto">
                                    <button type="submit" class="btn btn-success px-3 font-weight-bold">Save</button>
=======
                                        </div>
                                    @endforeach
>>>>>>> caa08ce52d43dda553b2dbc932ddda4be5d80e2b
                                </div>
                            </form>
                            <hr>
                         @endforeach
                    </div>
                </div>
            </div>
@endsection