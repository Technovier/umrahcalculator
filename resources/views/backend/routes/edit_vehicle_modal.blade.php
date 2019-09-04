<div class="modal fade" id="Modal{{$vehicaldetail->id}}" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Routes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">

                <form action="{{route('admin.updateroute',$vehicaldetail->id)}}" METHOD="post">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Route Name</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>

                                        <td>
                                            <input style="text-transform: capitalize;" type="text" placeholder="Enter Route Here" value="{{$vehicaldetail->route}}" name="route_name" class="form-control" required>
                                        </td>



                                    </tr>


                                    </tbody>

                                </table>



                            </div><!--row-->
                        </div><!--col-->
                    </div><!--row-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"> Update</button>
            </div>
        </div>
        </form>

    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("#Modal{{$vehicaldetail->id}}").modal({
            show: false,
            backdrop: 'static'
        });

    });
</script>

