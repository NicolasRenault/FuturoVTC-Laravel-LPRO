@extends('layouts.master')
@section('css')
    <link href="{{ asset('css/addons/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/addons/datatables-select.min.css') }}" rel="stylesheet">
@endsection
@section('bodyContent')
<div class="container">
    <a type="button" href="/createEmploye">Ajouter un employé</a>
    <table id="HRtable" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Matricule</th>
                <th class="th-sm">Nom</th>
                <th class="th-sm">Prenom</th>
                <th class="th-sm">Poste</th>
                <th class="th-sm">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employe)
            <tr>
                <td>{{$employe['matricule']}}</td>
                <td>{{$employe['nomEmploye']}}</td>
                <td>{{$employe['prenomEmploye']}}</td>
                <td>
                    @foreach($roles as $role)
                        @if($role['typeRole'] == $employe['typeRole'])
                            {{ $role['libelleRole'] }}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{route("initUpdateEmploye", $employe['idEmploye'])}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{route("initDeleteEmploye", $employe['idEmploye'])}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Poste</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/addons/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/addons/datatables-select.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#HRtable').DataTable();
            $('#HRtable_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#HRtable_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search");
                $this.removeClass('form-control-sm');
            });
            $('#HRtable_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#HRtable_wrapper .dataTables_filter').addClass('md-form');
            $('#HRtable_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#HRtable_wrapper select').addClass('mdb-select');
            $('#HRtable_wrapper .mdb-select').materialSelect();
            $('#HRtable_wrapper .dataTables_filter').find('label').remove();
        });
    </script>
@endsection
