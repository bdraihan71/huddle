@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Edit Weekly Leave</h4>
                </div>
            </div>

            @if($leave == null)
                <div class="row">
                    <div class="col-12 card-box">
                        <hr>
                        <h2 class="page-title text-center">There are no weekly day offs, please <a href="/create/weekly">select new day offs</a>.</h2>
                        <hr>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="card-box col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4>Select Days</h4>
                            </div>
                        </div>

                        <br>
                        <form action="/edit/weekly/{{auth()->user()->id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2">
                                    <label for="day_1" class="form-label-control">First Day</label>
                                </div>
                                <div class="col-4">
                                    <select name="day_1" class="form-control">
                                        <option value="{{$leave->day_1}}">{{$leave->day_1}}</option>
                                        @foreach($days as $day)
                                            <option value="{{$day}}">{{$day}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="day_2" class="form-label-control">Second Day</label>
                                </div>
                                <div class="col-4">
                                    <select name="day_2" class="form-control">
                                        <option value="{{$leave->day_2}}">{{$leave->day_2}}</option>
                                        @foreach($days as $day)
                                            <option value="{{$day}}">{{$day}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Select Range</h4>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2">
                                    <label for="start" class="form-label-control">Select Start Date</label>
                                </div>
                                <div class="col-4">
                                    <input type="date" name="start" min="{{$start}}" class="form-control">
                                </div>
                                <div class="col-2">
                                    <label for="start" class="form-label-control">Select End Date</label>
                                </div>
                                <div class="col-4">
                                    <input type="date" name="end" min="{{$end}}" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2">
                                    <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection