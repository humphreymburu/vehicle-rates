@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
   
   
   
<div class="container-fluid p-0">

<div class="row">

<div class="col-md-6 col-xl-4 d-flex">
    <div class="flex-fill card">
      <div class="py-4 card-body">
        <div class="media">
          <div class="media-body">
            <div class="title">Total Running Cost Per KM</div>
            <p class="mb-0">Ksh {{ $running_cost }} </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-6 col-xl-4 d-flex">
    <div class="flex-fill card">
      <div class="py-4 card-body">
        <div class="media">
          <div class="media-body">
            <div class="title">Operating Cost Per KM</div>
            <p class="mb-0">Ksh {{ $operating_costs }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="col-md-6 col-xl-4 d-flex">
    <div class="flex-fill card">
      <div class="py-4 card-body">
        <div class="media">
          <div class="media-body">
            <div class="title">Fixed Cost Per KM</div>
            <p class="mb-0">Ksh {{ $fixed_costs_km }} </p>
          </div>
        </div>
      </div>
    </div>
  </div>

 

  

</div>



<div class="row">

  

  <div class="col-12 col-lg-8 d-flex">
      <div class="card flex-fill w-100">
          <div class="card-header">
            <span class="badge badge-primary float-right">PDF</span>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-borderless" style="padding: .2rem 1 important;">
                <thead>
                <tr>
                <th scope="col">5</th>
                <th scope="col"><h4>FIXED COSTS</h4></th>
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
                <td><p>Total Fixed Cost</p></td>
                <td>{{$fixed_cost}}</td>
                <td></td>
                <td></td>
              </tr>

              <tr class="main_total">
                <th scope="row"></th>
                <td><p><strong>Fixed Cost Per KM</strong><p></td>
                <td>{{$fixed_costs_km}}</td>
                <td></td>
                <td></td>
              </tr>

              <tr class="space_table">
                <th scope="row"></th>
                <td><p><strong></strong><p></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>


              <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col"><h4>OPERATING COST</h4></th>
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
                  <td>Tyres and Tubes</td>
                  <td>{{$tyres_cost}}</td>
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
                <tr class="main_total">
                  <th scope="row"></th>
                  <td><p><strong>Operating Cost Per KM</strong></p></td>
                  <td>{{$operating_costs}}</td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

  <div class="col-12 col-lg-4 d-flex">
                <div class="card flex-fill w-100">
                  <div class="card-header">
                    <span class="badge badge-info float-right">Today</span>
                    <h5 class="card-title mb-0">AA Rates</h5>
                  </div>

                  <div class="px-4 pt-2 card-body">
                 <p>The AA Rates tables are simple to use and easy to understand. They have been designed in a manner that best accommodates most permutations of user needs.
<br>
The AA rates are produced on a standard schedule format which comprises of to main components:-</p>

<ul>
<li>Fixed costs
<br>
These are costs that have to be incurred whether the vehicle is moving or not. They include insurance, depreciation, licensing, etc.</li>

<li>Operating Costs <br/>
  These are those costs that vary directly with the number of kilometers traveled. They include fuel, service and tyres.
</li>
</ul>
The total running cost is obtained by summing the two costs.</p>
                </div>
              </div>

  </div>
  
  


</div>
   
   

@endsection