@extends('backend.layouts.backend-master')

@section('title', 'All User')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List</h4>
            </div>
            <div class="card-body">
                <div class="filter">
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <select class="form-control filter_data" id="filter-status">
                                <option value="">-- Select Status --</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="allDataTable">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- View Modal -->
                        <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">View</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="modalBody">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Read Data
        $('#allDataTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: "{{ route('backend.all.user') }}",
                "data":function(e){
                    e.status = $('#filter-status').val();
                },
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
        // Filter Data
        $(document).on('change', '.filter_data', function(e){
            e.preventDefault();
            $('#allDataTable').DataTable().ajax.reload();
        })

        // Change Status Data
        $(document).on('click', '.statusBtn', function () {
            var id = $(this).data('id');
            var url = "{{ route('backend.user.status', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#allDataTable').DataTable().ajax.reload();
                },
            });
        });


        // View Data
        $(document).on('click', '.viewBtn', function () {
            var id = $(this).data('id');
            var url = "{{ route('backend.user.view', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#modalBody').html(response);
                },
            });
        });
    })
</script>
@endsection
