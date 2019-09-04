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

                <form action="{{route('admin.createvehicle')}}" method="get">

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Vehicle Name</th>
                                        <th>Seating Capacity</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>

                                        <td>
                                            <input type="text"  placeholder="Enter Vehicle Name" name="vehical_name" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="number"  placeholder="Enter Vehicle Capacity" name="seating_capacity" class="form-control" required>
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
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </div>
            </form>

        </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("#Modal").modal({
            show: false,
            backdrop: 'static'
        });

    });
</script>


