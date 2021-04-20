@extends('layouts.master')
@section('css')
    <style>
        .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        .grid-item {
            width: auto;
            height: auto;
            float: left;
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('bodyContent')

<div class="container">
    <form action="/updateEmploye" method="post" id="formEmploye">
        @csrf
        <div class="card w-75 mx-auto my-5 etape1">
            <h5 class="card-header primary-color white-text text-center py-4">
                <strong>Client</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <input type="hidden" id="idEmploye" name="idEmploye" value="@if (isset($employe)) {{$employe['idEmploye']}}@endif" />
                <div class="md-form md-bg">
                    <label for="nomEmploye">Nom</label>
                    <input type="text" id="nomEmploye" name="nomEmploye" class="form-control" value="@if (isset($employe)) {{$employe['nomEmploye']}} @endif" placeholder="Nom"/>
                </div>
                <div class="md-form md-bg">
                    <label for="prenomEmploye">Prenom</label>
                    <input type="text" id="prenomEmploye" name="prenomEmploye" class="form-control" value="@if (isset($employe)) {{$employe['prenomEmploye']}} @endif" placeholder="Prenom"/>
                </div>
                <div class="md-form md-bg">
                    <label for="matricule">Matricule</label>
                    <input type="text" id="matricule" name="matricule" class="form-control" value="@if (isset($employe)) {{$employe['matricule']}} @endif" placeholder="Matricule"/>
                </div>
                <div class="md-form md-bg">
                    <select name="role" id="role" class="form-control mdb-select md-form colorful-select dropdown-primary">
                        @foreach($roles as $role)
                            <option value="{{ $role['typeRole'] }}" @if (isset($employe) && ($employe['typeRole'] == $role['typeRole'])) selected @endif>{{ $role['libelleRole'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="wrapperPermis" class="w-100" data-toggle="buttons">
                    <label>Permis : </label>
                    <div class="grid">
                        @foreach (\App\Models\Permis::all() as $permi)
                            <div class="grid-item">
                                <label class="btn btn-md btn-primary active">
                                    <input type="checkbox" autocomplete="off" id="{{$permi['typePermis']}}" name="{{$permi['typePermis']}}" value="{{$permi['typePermis']}}"
                                    @if (isset($employe) && (\App\Models\Possede::where("idEmploye", $employe['idEmploye'])->where("typePermis", $permi['typePermis'])->exists())) checked @endif /> {{$permi['typePermis']}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="md-form md-bg">
                    <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect">Suivant</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/addons/masonry.pkgd.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.mdb-select').materialSelect();

            if ($('#role').val() == "CHF") {
                $("#wrapperPermis").show();
            } else {
                $("#wrapperPermis").hide();
                $("#wrapperPermis").addClass('d-none');
            }
        });

        $('#role').on('change', function() {
            if (this.value == "CHF") {
                $("#wrapperPermis").show();
                $("#wrapperPermis").removeClass('d-none');
            } else {
                $("#wrapperPermis").hide();
                $("#wrapperPermis").addClass('d-none');
            }
        });

        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 100,
            gutter: 10
        });
    </script>
@endsection

