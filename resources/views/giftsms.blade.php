@extends('layouts.app')

@section('content')


  <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gift Sms
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <form role="form" method="post" action="{{ route('giftsms.store') }}">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label>Friend's Email</label>
                                    <input class="form-control" name="email" placeholder="Friend Email">
                                </div>
                              
                                 <div class="form-group">
                                    <label>Credit To Send</label>
                                    <input class="form-control" name="unit" placeholder="Credit to Send">
                                </div>
                                 <div class="form-group">
                                    <label>Account Balance</label>
                                    <input class="form-control" value="{{ $balance->unit }}" readonly>
                                </div>
                                  </div>
                                </div>
                                                                       
                              
                               
                                <button type="submit" class="btn btn-default">Transfer Now</button>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gift Sms Record
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($giftsms) @php($i=1) @foreach($giftsms as $sms)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$sms->fromUser->name}}</td>
                                    <td>{{$sms->toUser->name}}</td>
                                    <td>{{$sms->unit}}</td>
                                </tr>
                                @php($i++) @endforeach @endisset
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@endsection