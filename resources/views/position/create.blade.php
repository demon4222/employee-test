@extends('adminlte::page')

@section('content')
    <div class="container">
        <div>
            <h1>Positions</h1>
        </div>
        <x-adminlte-card title="Add position">
            <form action="{{route('positions.store')}}" method="POST">
                @csrf
                <div>
                    <x-adminlte-input name="name" label="Name" placeholder="placeholder" id="text-input"
                                      fgroup-class="col-md-6">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark"></div>
                        </x-slot>
                    </x-adminlte-input>
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
