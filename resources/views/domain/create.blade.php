<?php
/*
 * File: create.blade.php
 * Category: View
 * Author: MSG
 * Created: 11.03.17 14:09
 * Updated: -
 *
 * Description:
 *  -
 */


?>
@extends('layout.app', [
    'scripts' => [
        '/assets/js/domain.min.js'
    ]
])

@section('content')
    <md-content class="md-padding" layout="row" layout-wrap layout-align="center center"
                ng-controller="domainCreate as vm">
        <div flex-xs flex-gt-xs="50" flex-gt-sm="50" flex-gt-md="25" flex-gt-lg="10" layout="row">

            <form role="form" name="authForm" method="POST" action="/domain/create" autocomplete="off" novalidate>
                {{ csrf_field() }}
                <md-card md-theme="default">
                    <md-card-title>
                        <md-card-title-text>
                            <span class="md-headline display-inline-block vertical-align-middle">
                                <a href="/domain" title="@t('Zurück')" class="clickable">
                                    <i class="material-icons md-color-default">arrow_back</i>
                                </a>
                                @t('Neue Domain anlegen')
                            </span>
                            <span class="md-subhead"></span>
                        </md-card-title-text>
                    </md-card-title>
                    <md-card-content>

                        <md-input-container class="md-block">
                            <label>Name der Domain</label>
                            <input id="name" type="text" ng-model="name" minlength="5" maxlength="100" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <div role="alert"><div>{{ $errors->first('name') }}</div></div>
                            @endif
                            <div ng-messages="authForm.name.$error" role="alert">
                                <div ng-message-exp="['required', 'minlength', 'maxlength']">
                                    @t('Der Name der Domain inklusive TLD muss mindestens 5 Zeichen lang sein.')
                                </div>
                            </div>
                        </md-input-container>

                    </md-card-content>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button type="submit">@t('Domain anlegen')</md-button>
                    </md-card-actions>
                </md-card>
            </form>
        </div>
    </md-content>

@endsection

