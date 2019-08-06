@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-8 align-self-center">

       <h4 align="center"><strong> Vehicle Running Cost</strong></h4>
       <br/>
      
       @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="table-responsive">

<table class="table table-borderless" style="padding: .2rem 1 important;">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">FIXED COSTS</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td>Depreciation</td>
      <td>{{$depreciation_amount}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Interest on Capital </td>
      <td>{{$interest_total}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Comprehensive Insurance</td>
      <td>{{$insurance_amount}}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <th scope="row"></th>
      <td>Motor Club Subscription </td>
      <td>{{$subscription_cost}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Parking/Fines Cleaning, etc</td>
      <td>{{$parking_cost}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Liscences</td>
      <td>{{$liscence_cost}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td><p><strong>Total Fixed Cost</strong></p></td>
      <td>{{$fixed_cost}}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">OPERATING COST</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tr>
      <th scope="row"></th>
      <td>Fuel</td>
      <td>{{$fuel}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Oil</td>
      <td>{{$oil_cost}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Servicing </td>
      <td>{{$services_cost}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Repairs and Replacements</td>
      <td>{{$repairs_cost}}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <th scope="row"></th>
      <td>Tyres and Tubes </td>
      <td>{{$tyres_cost}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td><p><strong>Operating Cost Per Km</strong></p></td>
      <td>{{$operating_costs}}</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>



</div>
@endsection