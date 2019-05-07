@extends('layouts.app')

@section('content')


  <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Individual Sms
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="{{ route('message.store') }}">
                                        {{ csrf_field() }}
                                        
                                        <!--<div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>-->
                                         <div class="form-group">
                                            <label>Sender ID</label>
                                            <input class="form-control" name="from" placeholder="From">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Phone Number</label>
                                            <input class="form-control" name="phone" placeholder="Enter Phone">
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" rows="9"></textarea>
                                        </div>
                                          </div>
                                        </div>
                                                                               
                                      
                                       
                                      <button type="submit" class="btn btn-default">Send</button>
                                       
                                    </form>
                                <div class="col-lg-12">
            <!--<div class="panel panel-default">
                <div class="panel-heading">
                    Sent Sms
                <!--</div>
                 /.panel-heading -->
               <!-- <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($single_sms) @php($i=1) @foreach($single_sms as $sms)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$sms->fromUser->name}}</td>
                                    <td>{{$sms->toUser->name}}</td>
                                    <td>{{$sms->phone}}</td>
                                </tr>
                                @php($i++) @endforeach @endisset
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
           <!-- </div>
        </div>
    </div>-->
                                </div>
             
@endsection