@extends('backend.layouts.app')

@section('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.create'))

@section('content')


    {{ html()->form('get', route('admin.hotel.room_save'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Create Hotels')
                        <small class="text-muted">@lang('labels.backend.access.roles.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('Type_id'))->class('col-md-2 form-control-label')->for('type_id') }}

                        <div class="col-md-10">
                            <select name="type_id" id="" class="form-control">
                                @foreach($roomtype as $rt)
                                    <option value="{{$rt->id}}">{{$rt->type_name}}</option>
                                @endforeach

                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <input type="text" name="hotel_id" value="{{request()->hotel_id}}" style="display: none;">

                    <div class="form-group row">
                        {{ html()->label(__('Price:'))->class('col-md-2 form-control-label')->for('hotel') }}

                        <div class="col-md-10">
                            {{ html()->text('price')
                                ->class('form-control')
                                ->placeholder(__('Enter Price   '))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->



                </div><!--col-->
            </div><!--row-->



        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.hotel.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
