@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{--    {{ html()->form('get', route('admin.save_route'))->class('form-horizontal')->open() }}--}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Routes Management')
                        <small class="text-muted">@lang('Create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('Route Name'))->class('col-md-2 form-control-label')->for('Route_name') }}


                        <div class="col-md-10">
                            {{ html()->text('Route_name')
                                ->class('form-control')
                                ->placeholder(__('Enter Route Here'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->


                </div><!--col-->
            </div><!--row-->



        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(URL::to('/admin/Vehicals_Routes'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
