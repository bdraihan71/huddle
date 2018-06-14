@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Leave Request Form</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    <form class="form-horizontal" role="form" action="/request/{{auth()->user()->id}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Leave Type</label>
                                            <div class="col-10">
                                                <select class="form-control" name="type">
                                                    @for($i = 0; $i < count($types); $i = $i + 2)
                                                        <option value="{{$types[$i+1]}}">{{$types[$i]}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="subject">Request Subject</label>
                                            <div class="col-10">
                                                <input type="text" name="subject" class="form-control" placeholder="Request Subject">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="body">Request Body</label>
                                            <div class="col-10">
                                                <textarea name="body" class="form-control" rows="5" placeholder="Request Body"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Leave Date Range</label>
                                            <div class="col-sm-8">
                                                <div class="input-daterange input-group" id="date-range">
                                                    <input type="text" class="form-control" name="start" placeholder="From"/>
                                                    <input type="text" class="form-control" name="end" placeholder="To"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-11"></div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection