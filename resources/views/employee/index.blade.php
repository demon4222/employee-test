@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-md-6">
                <h1>Employees</h1>
            </div>
            <div class="col-md-6">
                <a href="{{route('employees.create')}}" class="btn btn-outline-success float-right">Add Employee</a>
            </div>
        </div>
        <table class="table" id="employees-table">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Position</th>
                <th>Date of employment</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
    <div id="deleteModal" class="modal fade" role="dialog" data-toggle="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('employees.list') !!}',
                columns: [
                    {data: 'photo', name: 'photo', orderable: false, searchable: false},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'position', name: 'position'},
                    {data: 'date_of_employment', name: 'date_of_employment'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'email', name: 'email'},
                    {data: 'salary', name: 'salary'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });

        let $modal = $('#deleteModal');

        $('#employees-table').on('click', '.deleteButton' ,function(e){
            e.preventDefault();
            $modal.data('id', $(e.target).data('id'));
            $modal.modal('show');
        });

        $('#deleteModal').on('click', '#ok_button', function (e) {
            let id = $('#deleteModal').data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: '/employees/' + id,
                success: function(){
                    $modal.modal('hide');
                    $('#employees-table').DataTable().ajax.reload();
                },
            })
        });
    </script>
@stop
