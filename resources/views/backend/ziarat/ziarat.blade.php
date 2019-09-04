@extends('backend.layouts.app')

@section('title', app_name() )

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0" >
                        {{ __('Ziarat') }} <small class="text-muted"></small>
                    </h4>
                </div><!--col-->


<div style="margin-left: 920px;">
            <strong>Last Updated at:</strong>
        <?php use Carbon\Carbon;
            echo Carbon::parse(DB::table('ziarat')->value('updated_at'))->format('M d Y h:i A');

                ?>
</div>
            </div>
                <form action="{{route('admin.Update_Ziarat')}}">
                <div class="row mt-4">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input placeholder="Enter Ziarat Price" type="number"  step="any" value="{{$users}}" name="Ziarat_Price" class="form-control" required>
                                    </td>
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
