@extends('backend.layouts.app')

@section('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('content')
    {{ html()->modelForm($hotel, 'PATCH', route('admin.hotel.update', $hotel))->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Hotel Management')
                        <small class="text-muted">@lang('Edit Hotel')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <input type="text" name="hotel_id" value="{{$hotel->id}}" style="display: none;">
                    <div class="form-group row">

                        {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('name') }}

                        <div class="col-md-10">

                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.roles.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->



                    <div class="form-group row">
                        {{ html()->label(__('Location'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10">
                            <select name="hotellocation" id="" class="form-control">
                                @foreach($location as $l)
                                    @if($hotel->location_id==$l->id)
                                        <option value="{{$l->id}}" selected>{{$l->name}}</option>
                                        @else
                                        <option value="{{$l->id}}">{{$l->name}}</option>
                                    @endif

                                    @endforeach

                            </select>
                        </div><!--col-->
                    </div><!--form-group-->



                    <div class="form-group row">
                        {{ html()->label(__('Type'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10">
                            <select name="hoteltype" id="" class="form-control">
                                @foreach($hoteltype as $l)

                                    @if($hotel->type_id==$l->id)

                                        <option value="{{$l->id}}" selected>{{$l->type}}</option>
                                    @else
                                        <option value="{{$l->id}}">{{$l->type}}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div><!--col-->
                    </div><!--form-group-->







                    <div class="form-group row">
                        {{ html()->label(__('Distance'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10">
                            <input type="text" name="distance" class="form-control"  value="{{$hotel->distance}}">
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
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection
