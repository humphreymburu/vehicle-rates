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
                    {{ html()->form('POST', route('frontend.vehicle.post'))->open() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
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
                <select name="category" class="form-control" style="width:250px">
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
                            <label for="country">Select Tyre Type:</label>
                <select name="country" class="form-control" style="width:250px">
                    <option value="">--- Select Tyre Type ---</option>
                    @foreach ($tyres as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="state">Tyre Costs:</label>
                <select name="state" class="form-control"style="width:250px">
                <option>--Costs--</option>
                </select>
         
                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                {{ html()->label(__('validation.attributes.frontend.parking_cost'))->for('parking_cost') }}

{{ html()->text('parking_cost')
    ->class('form-control')
    ->placeholder(__('validation.attributes.frontend.parking_cost'))
    ->attribute('maxlength', 150)
    ->value(93500)
    ->required()}}
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="subscription">Subscription Category:</label>
                <select name="subscription" class="form-control" style="width:250px">
                    <option value="">--- Select Category ---</option>
                    @foreach ($member_cat as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                                </div>
                                </div>


                                <div class="col-md-4">
                                <div class="form-group">
                                <label for="subs">Subscription Costs:</label>
                <select name="subs" class="form-control"style="width:250px">
                <option>--Subscription Cost--</option>
                </select>
                                </div>
                                </div>


                        </div><!--row-->

                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                               
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                               
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