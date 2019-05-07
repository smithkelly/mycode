@extends('layouts.app')
@section('content')

<form id="payform" role="form" method="post" action="{{ route('pay') }}" onload="submit();">
    {{ csrf_field() }}
        
        <input type="hidden" name="email" value="{{auth()->user()->email}}"> {{-- required --}}
        <input type="hidden" name="orderID" value="{{$purchaseId}}">
        <input type="hidden" name="amount" value="{{$amount}}"> {{-- required in kobo --}}
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="metadata" value="{{ json_encode(['purchaseId' => $purchaseId]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
        <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}                                       
    </form>

       @endsection

       @push('scripts')
 <script type="text/javascript">
     $(document).ready(function(){
$('#payform').submit();
     })   
    </script>

       @endpush