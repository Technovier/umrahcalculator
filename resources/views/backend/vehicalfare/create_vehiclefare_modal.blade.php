<div class="modal fade" id="Modal" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">

                <form action="{{route('admin.save_fare')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Route</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td>
                                <?php $routes=\App\Models\route::all() ; ?>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Route</option>
                                @foreach($routes as $route)
                                            <option value="{{$route->id}}">{{$route->route}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td>
                                <input type="text"  placeholder="Enter Vehical Name" name="vehical_id" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                        <td>
                                <input type="number" class="form-control" name="fare" placeholder="Enter Fare Here" required>
                            </td>
                        </tr>





                        </tbody>
                    </table>




            </div>









            <div class="modal-footer">
                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </div>
        </form>

    </div>
</div>



