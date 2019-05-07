@extends('layouts.app')

@section('content')


  <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Buy Sms
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        
                                <form role="form" method="post" action="{{ route('purchase.process') }}">
                                {{ csrf_field() }}
                                        <div>

                                            <label>Sms Unit</label>
                                            <input name="unit" class="form-control" placeholder="500">
                                        </div><br>
                                                                               
                                      
                                       
                                        <button type="submit" class="btn btn-default">Buy Now</button>
                                       
                                    </form>
                                </div>
@endsection