@extends('layouts.app')

@section('content')


  <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Group Sms
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form role="form" method="post" action="{{ route('groupsms.store') }}">
                                        {{ csrf_field() }}

                                         <div class="form-group">
                                            <label>From</label>
                                            <input class="form-control" name="from" placeholder="From">
                                        </div>


                                        <div class="form-group">
                                            <label>Enter Phone Numbers</label>
                                            <input class="form-control" name="phone" placeholder="Enter Phone's">
                                        </div>
                                        
                                        
                                        <!--<div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>-->
                                       <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" rows="9"></textarea>
                                        </div>
                                          </div>
                                        </div>
                                                                               
                                      
                                       
                                        <button type="submit" class="btn btn-default">Send</button>
                                       
                                    </form>
                                </div>
@endsection