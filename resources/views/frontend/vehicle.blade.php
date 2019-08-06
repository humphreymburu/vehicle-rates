@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-8 align-self-center">

       <h4 align="center"><strong> Vehicle Running Cost Calculator</strong></h4>
       <br/>
      
       @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="card-body" style="
    width: 850px  !important;
">
                    {{ html()->form('POST', route('frontend.vehicle.show'))->open() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   


                                        <label for="Purchase Cost"></label>


{{ html()->label(__('validation.attributes.frontend.purchase_cost'))->for('purchase_cost') }}

{{ html()->text('purchase_cost')
    ->class('form-control')
    ->placeholder(__('validation.attributes.frontend.purchase_cost'))
    ->attribute('maxlength', 191)
    ->required()}}
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-md-4">
                                <div class="form-group">
                                        <label for="category">Car Category:</label>
                <select name="category" class="form-control" style="width:250px">
                    <option value="">--- Select Car Category ---</option>
                    @foreach ($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="category">Engine Capacity:</label>
                <select name="capacity" class="form-control" style="width:250px">
                    <option value="">--- Select Capacity ---</option>
                    @foreach ($capacities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                                </div>
                            </div>

                        </div><!--row-->

                        <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                            <label for="oils">Oil Costs:</label>
<select name='oils' class="form-control"style="width:250px" >
                                    
                                </select>
                
            </div>
            </div>
            <div class="col-12 col-md-6">
            <div class="form-group">
            <label for="drives">Drive</label>
        <select name='drives' class="drive form-control" style="width:250px" >
        <option value="0" disabled="true" selected="true">-- Select Drive--</option>
        </select>


      


        </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-4">
        <div class="form-group">
        <label for="services">Services</label>
        <select name='services' class="form-control"style="width:250px" >
        </select>
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col-md-4">
                                <div class="form-group">
                                
                                <label for="repairs">Repairs</label>
        <select name='repairs' class="form-control"style="width:250px" >
        </select>
                                </div>
                                </div>


                                <div class="col-md-4">
                                <div class="form-group">
          <label for="tyres">Tyres</label>
        <select name='tyres' class="form-control"style="width:250px" >
        </select>
                                </div>
                                </div>


                        </div><!--row-->

                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                <label for="subscription">Subscription Category:</label>
                <select name="subscription" class="form-control" style="width:250px">
                    <option value="">--- Select Category ---</option>
                    @foreach ($member_cat as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="subs">Subscription Costs:</label>
                                
                   
                   
                <select name='subs' class="form-control"style="width:250px" >
                    
                </select>




                                </div><!--form-group-->
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                               
                                </div><!--form-group-->
                            </div>
                            
                            <!--col-->
                        </div><!--row-->

                        @if(config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.auth.save_button')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                
                            </div>
                        </div><!--/ .col -->
                    </div><!-- / .row -->

                </div><!-- card-body -->
        </div><!--col-->
    </div><!--row-->
@endsection