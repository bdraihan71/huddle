@extends('layouts.app')

@section('content')
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
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="body">Request Body</label>
                                            <div class="col-10">
                                                <textarea name="body" class="form-control" rows="5" placeholder="Request Body"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-2">
                                                <label for="start">Start Date</label>
                                            </div>
                                            <div class="col-4">
                                                <input type="date" name="start" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label for="end">End Date</label>
                                            </div>
                                            <div class="col-4">
                                                <input type="date" name="end" class="form-control">
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
@endsection