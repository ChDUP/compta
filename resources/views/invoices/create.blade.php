@extends('layouts.app')

@section('title')
{{ ucfirst($user->firstname) }} {{ strtoupper($user->lastname) }}
@endsection

@section('subtitle')
Enregistrement d'une nouvelle facture
@endsection

@section('content')
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Nouvelle Facture</p>
                </header>

                <div class="card-content">
                    <form class="register-form" method="POST" action="/invoices" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="columns">
                            <div class="column is-6">
                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" data-start-date="2018-03-03" data-date-format="YYYY-MM-DD" data-show-footer="false" id="date" type="date" name="date" data-close-on-select="false" data-today-button="false" data-display-mode="inline" data-lang="fr" value="{{ old('date') }}" required autofocus>
                                            </p>

                                            @if ($errors->has('date'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('date') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Titre</label>
                                    </div>

                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" id="title" type="title" name="title" value="{{ old('title') }}"
                                                        required autofocus>
                                            </p>

                                            @if ($errors->has('title'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('title') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Montant</label>
                                    </div>

                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control has-icons-left">
                                                <input class="input" id="amount" type="amount" name="amount" value="{{ old('amount') }}" required autofocus>
                                                <span class="icon is-small is-left">
                                                    <i class="fa fa-euro"></i>
                                                </span>
                                            </p>

                                            @if ($errors->has('amount'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('amount') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Concerne</label>
                                    </div>

                                    <div class="field-body">
                                        <div class="select">
                                                <select name="company_id">
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>

                                            @if ($errors->has('company'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('company') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Facture</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="file">
                                            <label class="file-label">
                                            <input class="file-input" type="file" name="invoice">
                                            <span class="file-cta">
                                                <span class="file-icon">
                                                <i class="fa fa-upload"></i>
                                                </span>
                                                <span class="file-label">
                                                Choisissez un fichier
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label"></div>
                                    <div class="field-body">
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button type="submit" class="button is-success is-large is-fullwidth">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
