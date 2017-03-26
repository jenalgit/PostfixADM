<?php
/*
 * File: index.blade.php
 * Category: View
 * Author: MSG
 * Created: 11.03.17 14:08
 * Updated: -
 *
 * Description:
 *  -
 */


?>

@extends('layout.app')

@section('content')
    <md-content class="md-padding" layout="row" layout-wrap layout-align="start start">

        <md-card md-theme="default" flex="100">
            <md-card-title flex="100">
                <md-card-title-text flex="100" layout="row" layout-align="start start">

                    <h1 class="md-title display-inline-block vertical-align-middle clickable" flex="nogrow">
                        <a href="/" title="@t('Zurück')">
                            <i class="material-icons md-color-default">arrow_back</i>
                        </a>
                    </h1>

                    <h1 class="md-title display-inline-block vertical-align-middle">
                        @t('Übersicht aller verfügbaren Domains')
                    </h1>
                </md-card-title-text>
            </md-card-title>
            <md-card-content layout-wrap layout="row"  flex="100">

                @if($aDomain->count() == 0)
                    <br />
                    <br />
                    <br />
                    <br />
                    <h1 class="md-headline text-center">
                        @t('Es wurden noch keine Domains angelegt')
                    </h1>
                @else

                        <md-list ng-cloak  flex="100">

                        @foreach( $aDomain as $mDomain)
                                <md-divider></md-divider>
                            <md-list-item>
                                <p>{{$mDomain->name}}</p>

                                <md-menu class="md-secondary">
                                    <md-button class="md-icon-button">
                                        <i class="material-icons md-color-default">toc</i>
                                    </md-button>
                                    <md-menu-content width="3">
                                        <md-menu-item>
                                            <a class="md-button" href="/domain/update/{{$mDomain->id}}">@t('Bearbeiten')</a>
                                        </md-menu-item>
                                        <md-menu-item>
                                            <a class="md-button" href="/domain/delete/{{$mDomain->id}}">@t('Löschen')</a>
                                        </md-menu-item>
                                    </md-menu-content>
                                </md-menu>
                            </md-list-item>
                        @endforeach

                    </md-list>

                    {{ $aDomain->links() }}
                @endif

            </md-card-content>
        </md-card>

        <div layout="row" flex="100" layout-align="end center" md-theme="green">
            <a href="/domain/create" md-theme="green" class="md-button md-fab md-green" aria-label="@t('Neue anlegen')">
                <i class="material-icons md-white">add</i>
            </a>
        </div>
    </md-content>

@endsection
