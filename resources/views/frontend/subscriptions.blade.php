@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')

<section class="bg-primary-alt header-inner o-hidden">
      <div class="container">
        <div class="row my-3">
        </div>
        <div class="row py-6 text-center justify-content-center align-items-center">
          <div class="col-xl-8 col-lg-10">
            <h1 class="display-4">Pricing Plans</h1>
            <p class="lead mb-0">Calculate your vehicle running costs now! Just follow these 3 simple steps:

</p>
          </div>
        </div>
      </div>
      <div class="decoration-wrapper d-none d-md-block">
       
      </div>
      <div class="divider">
       
      </div>
    </section>

    <section class="mt-n8 mt-md-n14">
      <div class="container">


        <div class="form-row row justify-content-center align-items-center">

        {{ html()->form('POST', route('frontend.subscriptions.months'))->open() }}

            <div class="col-12 col-md-10">
            
               <!-- Card -->
               <div class="card shadow-lg mb-6 mb-md-0">
               <div class="card-body">

                <!-- Preheading -->
                <div class="text-center mb-3">
                  <span class="badge badge-pill badge-primary-soft">
                    <span class="h6 text-uppercase">Silver</span>
                    </span>
                    {{ Form::hidden('category', 'Silver') }}
                </div>

                <!-- Price -->
                <div class="d-flex justify-content-center">
                  <span class="h2 mb-0 mt-2">Ksh 500</span>
                 <br/>
                  
                </div>

                <!-- Text -->
                <p class="text-center text-muted mb-5">
                 Per Year
                </p>

                <!-- List -->
                <div class="d-flex">
                  
                  <!-- Badge -->
                  <div class="badge badge-rounded-circle badge-success-soft mt-1 mr-4">
                    <i class="fe fe-check"></i>
                  </div>

                  <!-- Text -->
                  <p>
                    Vehicle Running cost calculation for one vehicle
                  </p>
                  
                   </div>
                   <div class="d-flex">
                  
                  <!-- Badge -->
                  <div class="badge badge-rounded-circle badge-success-soft mt-1 mr-4">
                    <i class="fe fe-check"></i>
                  </div>

                  <!-- Text -->
                  <p>
                    Vehicle Running Cost Calculator usage for five months
                  </p>
                  
                </div>
                <div class="d-flex">
                  
                  <!-- Badge -->
                  <div class="badge badge-rounded-circle badge-success-soft mt-1 mr-4">
                    <i class="fe fe-check"></i>
                  </div>

                  <!-- Text -->
                  <p class="mb-5">
                    5 months free support
                  </p>
                  
                </div>

                                                  <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group mb-0 clearfix">
                                                            {{ form_submit(__('labels.frontend.auth.save_button')) }}
                                                        </div><!--form-group-->
                                                    </div><!--col-->
                                                </div><!--row-->
                
              </div>
            </div>
             
            </div>

           {{ html()->form()->close() }}

           {{ html()->form('POST', route('frontend.subscriptions.yearly'))->open() }}

             <div class="col-12 col-md-10">
            
            <!-- Card -->
            <div class="card shadow-lg mb-6 mb-md-0">
              <div class="card-body">

                <!-- Preheading -->
                <div class="text-center mb-3">
                  <span class="badge badge-pill badge-primary-soft">
                    <span class="h6 text-uppercase">Gold</span>
                  </span>
                  {{ Form::hidden('category', 'Gold') }}

                </div>

                <!-- Price -->
                <div class="d-flex justify-content-center">
                  <span class="h2 mb-0 mt-2">Ksh 1000</span>
                 <br/>
                  
                </div>

                <!-- Text -->
                <p class="text-center text-muted mb-5">
                 Per Year
                </p>

                <!-- List -->
                <div class="d-flex">
                  
                  <!-- Badge -->
                  <div class="badge badge-rounded-circle badge-success-soft mt-1 mr-4">
                    <i class="fe fe-check"></i>
                  </div>

                  <!-- Text -->
                  <p>
                  Vehicle Running cost calculation for several vehicles
                  </p>
                  
                </div>
                <div class="d-flex">
                  
                  <!-- Badge -->
                  <div class="badge badge-rounded-circle badge-success-soft mt-1 mr-4">
                    <i class="fe fe-check"></i>
                  </div>

                  <!-- Text -->
                  <p>
                  Vehicle Running Cost Calculator usage for 1 year
                  </p>
                  
                </div>

                <div class="d-flex">
                  
                  <!-- Badge -->
                  <div class="badge badge-rounded-circle badge-success-soft mt-1 mr-4">
                    <i class="fe fe-check"></i>
                  </div>

                  <!-- Text -->
                  <p class="mb-5">
                    12 months free support
                  </p>
                  
                </div>
               
                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group mb-0 clearfix">
                                                            {{ form_submit(__('labels.frontend.auth.save_button')) }}
                                                        </div><!--form-group-->
                                                    </div><!--col-->
                                                </div><!--row-->
                
              </div>
            </div>
          
          </div>
          {{ html()->form()->close() }}

         


        </div> <!-- / .row -->

        
      </div> <!-- / .container -->
    </section>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush