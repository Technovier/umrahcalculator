@extends('backend.layouts.app')

@section('title', app_name() )

{{--@section('breadcrumb-links')--}}
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
{{--@endsection--}}

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0" >
                        {{ __('Visa Rate') }} <small class="text-muted"></small>
                    </h4>

                </div><!--col-->
                <div style="margin-left: 920px;">
                    <strong>Last Updated at:</strong>
                    <?php use Carbon\Carbon;

                    echo Carbon::parse(DB::table('visa_rates')->value('updated_at'))->format('M d Y h:i A');
                    ?>
                </div>
            </div>
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
                <form action="{{route('admin.Update_visa_rate')}}">
                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-striped">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Adult</th>
                                        <th>Child</th>
                                        <th>Infant</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                          @foreach($users as $user)
                                            <td>
                                                <input type="number" step="any" placeholder="Enter Visa Rate" value="{{$user->adult}}" name="adult" class="form-control" required>
                                            </td>
                                                <td>
                                                    <input type="number" step="any" placeholder="Enter Visa Rate" value="{{$user->child}}" name="child" class="form-control" required>
                                                </td>
                                                <td>
                                            <input type="number" value="{{$user->infant}}" name="infant"  placeholder="Enter Visa Rate" class="form-control" required>
                                                </td>

                                            @endforeach

                                        <td><button type="submit" class="btn btn-success"> Update</button></td>
                                    </tr>

                                    </tbody>


                                </table>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </form>


            </div><!--card-->
@endsection
