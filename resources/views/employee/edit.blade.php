@extends('adminlte::page')

@section('plugins.BsCustomFileInput', true)

@section('content')
    <div class="container">
        <div>
            <h1>Employees</h1>
        </div>
        <x-adminlte-card title="Add employee">
            <form action="{{route('employees.update', $employee)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div>
                    <x-adminlte-input-file name="image" igroup-size="sm" label="Photo" legend="File format jpg, png up to 5mb, the minimum size of 300x300px"
                                           fgroup-class="col-md-6" value="a">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                    <x-adminlte-input name="full_name" label="Name" placeholder="Full name" id="text-input"
                                      fgroup-class="col-md-6" value="{{$employee->full_name}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark" id="str_len">{{strlen($employee->full_name)}}/256</div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-input name="phone_number" label="Phone" placeholder="" id="phone-input"
                                      fgroup-class="col-md-6" value="{{$employee->phone_number}}">
                    </x-adminlte-input>
                    <x-adminlte-input name="email" label="Email" placeholder=""
                                      fgroup-class="col-md-6" value="{{$employee->email}}">
                    </x-adminlte-input>
                    <x-adminlte-select name="position_id" label="Position" fgroup-class="col-md-6">
                        @foreach($positions as $id => $position)
                            <option value="{{$id}}" selected="{{$employee->position_id}}">{{$position}}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-input name="salary" label="Salary, $" placeholder=""
                                      fgroup-class="col-md-6" value="{{$employee->salary}}">
                    </x-adminlte-input>
                    <x-adminlte-select name="head_id" label="Head" fgroup-class="col-md-6">
                        <option value="">No head</option>
                        @foreach($heads as $id => $head)
                            <option value="{{$id}}" {{$employee->head_id == $id ? 'selected' : ''}}>{{$head}}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-input-date name="date_of_employment" placeholder="Choose a date..." fgroup-class="col-md-6" label="Date of employment"
                                           value="{{\Carbon\Carbon::parse($employee->date_of_employment)->format('d.m.Y')}}">
                    </x-adminlte-input-date>
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
        $('.datetimepicker').datetimepicker({
            format: 'DD.MM.YYYY',
            separator: ' @ ',
        });

        $(function () {
            $('#text-input').on('keypress', function (e) {
                let length = $(this).val().length + 1;
                if (length > 256) {
                    e.preventDefault();
                } else {
                    $('#str_len').html(length + '/256');
                }
            })
        })
    </script>
@stop
