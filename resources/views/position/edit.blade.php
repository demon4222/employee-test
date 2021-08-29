@extends('adminlte::page')

@section('content')
    <div class="container">
        <div>
            <h1>Positions</h1>
        </div>
        <x-adminlte-card title="Edit position">
            <form action="{{route('positions.update', $position)}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <x-adminlte-input name="name" label="Name" placeholder="placeholder" id="text-input"
                                      fgroup-class="col-md-6" value="{{$position->name}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark"></div>
                        </x-slot>
                    </x-adminlte-input>
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Created at:</b> {{$position->created_at}}</p>
                            <p><b>Updated at:</b> {{$position->updated_at}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Admin created ID:</b> {{$position->created_by}}</p>
                            <p><b>Admin updated ID:</b> {{$position->updated_by}}</p>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <x-adminlte-button label="Cancel" theme="secondary"/>
                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"/>
                </div>
            </form>
        </x-adminlte-card>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#text-input').on('keypress', function (e) {
                let length = $(this).val().length + 1;
                if (length > 256) {
                    e.preventDefault();
                } else {
                    $('.input-group-text').html(length + '/256');
                }
            })
        })
    </script>
@stop
