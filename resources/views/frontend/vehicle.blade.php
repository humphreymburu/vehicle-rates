@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    <div class="row justify-content-center">
    <div class="col col-sm-8 align-self-center">
    <h1 text-align="center" class="header"><strong> Find Out Running Cost of Your Vehicle </strong></h1>
       <br/>

       <h4 class="header_three">Please enter your vehicle details</h4>

    </div>

    <div class="col-8 align-self-center">
      
    <div class="card">
                                
                                
    <div class="card-body" style="
    width: 850px  !important;
    ">



                    {{ html()->form('POST', route('frontend.vehicle.show'))->open() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label for="Purchase Cost" class="input-label"></label>
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
                                <label for="capacity">Engine Capacity:</label>
                <select name="capacity" class="form-control">
                    <option value="">Engine Capacity</option>
                    @foreach ($capacities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                                </div><!--form-group-->
                            </div><!--col-->

                    
                        </div><!--row-->

                        <div class="row">


                        <div class="col-md-6">
                            
                            <div class="form-group">
                            <label for="drives">Drive</label>
    <select name='drives' class="drive form-control">
    <option value="0" disabled="true" selected="true">DRIVE</option>
    </select>
                            
                            </div>
                        </div>


<div class="col-md-4">
<div class="form-group">

{{ html()->label(__('validation.attributes.frontend.registration_number'))->for('registration_number') }}

{{ html()->text('registration_number')
    ->class('form-control input-label')
    ->placeholder(__('validation.attributes.frontend.registration_number'))
    ->attribute('maxlength', 191)
    ->required()}}
</div><!--form-group-->
</div>
</div>







                        <div class="row">
                        <div class="col-md-4 hide">
                            <div class="form-group">
                            <label for="oils">Oil Costs:</label>
<select name='oils' class="form-control"style="width:250px" >
                                    
                                </select>
                
            </div>
            </div>
         
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-4 hide">
        <div class="form-group">
        <label for="services">Services</label>
        <select name='services' class="form-control">
        </select>
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col-md-4 hide">
                                <div class="form-group">
                                
                                <label for="repairs">Repairs</label>
        <select name='repairs' class="form-control">
        </select>
                                </div>
                                </div>


                                


                        </div><!--row-->


                        <div class="row">
                        <div class="col-md-4 hide">
                                <div class="form-group">
          <label for="tyres">Tyres</label>
        <select name='tyres' class="form-control"style="width:250px" >
        </select>
                                </div>
                                </div>


                                <div class="col-md-4 hide"></div>
                        </div>

                        <div class="row">
                       
                       
                        <div class="col-md-6">
                                <div class="form-group">
                                <label for="subscription">Motor Club Subscription</label>
                <select name="subscription" class="form-control">
                    <option value="">Motor Club Subscription</option>
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
                <option value="">Subscription Cost</option>
                </select>

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
                            <div class="col-sm-10">
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

</div> <!-- card-body -->
        </div><!--col-->
    </div><!--row-->
@endsection