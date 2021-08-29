@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-md-6">
                <h1>Positions</h1>
            </div>
            <div class="col-md-6">
                <a href="{{route('positions.create')}}" class="btn btn-outline-success float-right">Add Position</a>
            </div>
        </div>
        <table class="table" id="positions-table">
            <thead>
            <tr>
                <th width="70%">Name</th>
                <th>Last update</th>
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
            let table = $('#positions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('positions.list') !!}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });

        let $modal = $('#deleteModal');

        $('#positions-table').on('click', '.deleteButton' ,function(e){
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
                url: '/positions/' + id,
                success: function(){
                    $modal.modal('hide');
                    $('#positions-table').DataTable().ajax.reload();
                },
            })
        });
    </script>
@stop
