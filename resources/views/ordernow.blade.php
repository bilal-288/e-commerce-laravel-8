@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
    <table class="table">
    <tbody>
      <tr>
        <td>Amount</td>
        <td>{{$total}}</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>$ 0</td>
      </tr>
      <tr>
        <td>Delivery</td>
        <td>$ 10</td>
        
      </tr>
      <tr>
        <td>Total Aount</td>
        <td>$ {{$total+10}}</td>
      </tr>
    </tbody>
  </table>

  <div>
  <form action="{{route('order.place')}}" method="POST">
    @csrf
  <div class="form-group">
    <textarea name="address" placeholder="Enter your address" class="form-control" required></textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Payment Method</label><br><br>
    <input type="radio" value="cash" name="payment" required><span>online payment</span><br><br>
    <input type="radio" value="cash" name="payment" required><span>EMI payment</span><br><br>
    <input type="radio" value="cash" name="payment" required><span>payment on Delivery</span><br><br>
  </div>
 
  <button class="btn btn-success" type="submit" class="btn btn-default">Order Now</button>
</form>
  </div>
    </div>


</div>
@endsection