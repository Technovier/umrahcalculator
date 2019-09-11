@extends('backend.layouts.app')

@section('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('content')

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
            <form action="{{route('admin.hotel.room.updatesmall')}}">
            <div class="row mt-4">
                <div class="col">
                    <input type="text" name="room_id" value="{{$Room->id}}" style="display: none">
                    <div class="form-group row">

                        {{ html()->label(__('Price'))
                            ->class('col-md-2 form-control-label')
                            ->for('price') }}

                        <div class="col-md-10">

                            {{ html()->text('price')
                                ->class('form-control')
                                ->placeholder($Room->price)
                                ->value($Room->price)
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Room Type'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}
                        <div class="col-md-10">
                            <select name="roomtype" id="" class="form-control">

                                @foreach($Roomtype as $rt)
                                    @if($Room->room_type==$rt->id)
                                        <option value="{{$rt->id}}" selected>{{$rt->type_name}}</option>
                                        @else
                                        <option value="{{$rt->id}}">{{$rt->type_name}}</option>
                                        @endif

                                @endforeach
                            </select>
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
                 <button class="btn btn-success  btn-sm">Update</button>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
        </form>
    </div><!--card-->
    @endsection