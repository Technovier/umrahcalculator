<div class="modal fade" id="myModal{{$route->id}}" role="dialog">
    <div class="modal-dialog" role="document">

        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black">{{ $route->route }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('admin.vehicalfare.updatevehicalfare')}}" method="get">
                    @csrf
                    <input type="text" name="routeid" value="{{$route->id}}" style="display: none">



                    <div class="row" style="font-weight:bold">
                        <div class="col">
Vehicle

                        </div>

                        <div class="col">
       Price
                        </div>
                    </div>
                    <hr>
                    <?php use App\Models\vehicalfare;use App\Models\vehicle;$vehicle=vehicle::all();?>
                    @foreach($vehicle as $v)
                    <div class="row">
                        <div class="col" style="text-transform: capitalize">{{$v->name}}</div>
                        <div class="col">
@php($fare=vehicalfare::where('route_id',$route->id)->where('vehical_id',$v->id)->pluck('fare'))
                            @if(!$fare->isEmpty())
<input type="number" value="{{$fare[0]}}" required class="form-control" name="{{$v->id}}" placeholder="Enter fare">
                                @else
                                <input type="number"  required class="form-control" name="{{$v->id}}"   placeholder="Enter fare">

                            @endif
                        </div>
                    </div>
                    @endforeach








                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save changes</button>
                              </div>
                </form>

        </div>
    </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("#myModal{{$route->id}}").modal({
            show: false,
            backdrop: 'static'
        });

    });
</script>
