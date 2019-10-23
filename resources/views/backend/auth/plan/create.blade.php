@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.user.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.plans.management')
                            <small class="text-muted">@lang('labels.backend.access.plans.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.plan.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.plan.name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.plan.description'))->class('col-md-2 form-control-label')->for('description') }}

                            <div class="col-md-10">
                                {{ html()->text('Description')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.plan.description'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.plan.price'))->class('col-md-2 form-control-label')->for('price') }}

                            <div class="col-md-10">
                            {!! Form::number('price', 'value',  ['class' => 'form-control', 'required' => 'true', 'maxlength' => '25', 'placeholder' => '00.0' ]) !!}

                            </div><!--col-->
                        </div><!--form-group-->











                        <div class="form-group row">

                            {{ html()->label(__('validation.attributes.backend.access.plan.invoice_period'))->class('col-md-2 form-control-label')->for('invoice_period') }}

                            <div class="col-md-10">

                            {!! Form::number('invoice_period', 'value',  ['class' => 'form-control', 'required' => 'true', 'maxlength' => '10', 'placeholder' => '0' ]) !!}
        
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.plan.invoice_interval'))->class('col-md-2 form-control-label')->for('invoice_interval') }}

                            <div class="col-md-10">
                                {{ html()->text('invoice_interval')
                                    ->class('form-control')
                                    ->placeholder(__('Month'))
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.plan.trial_period'))->class('col-md-2 form-control-label')->for('trial_period') }}

                            <div class="col-md-10">
                            {!! Form::number('trial_period', 'value',  ['class' => 'form-control', 'required' => 'true', 'maxlength' => '10', 'placeholder' => '0' ]) !!}

                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.plan.trial_interval'))->class('col-md-2 form-control-label')->for('trial_interval') }}

                            <div class="col-md-10">
                                {{ html()->text('trial_interval')
                                    ->class('form-control')
                                    ->placeholder(__('Day'))
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.plan.sort_order'))->class('col-md-2 form-control-label')->for('sort_order') }}

                            <div class="col-md-10">
                            {!! Form::number('sort_order', 'value',  ['class' => 'form-control', 'required' => 'true', 'maxlength' => '10', 'placeholder' => '0' ]) !!}

                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
