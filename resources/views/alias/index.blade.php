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
                <md-card-title-text flex="100" layout="row" layout-align="center center">

                    <h1 class="md-title display-inline-block vertical-align-middle clickable" flex="nogrow">
                        <a href="/redirect/back" title="@t('Back')" class="clickable">
                            <i class="material-icons md-color-default">arrow_back</i>
                        </a>
                    </h1>

                    <h1 class="md-title display-inline-block vertical-align-middle" flex>
                        @t('Index of all existing alias mailboxes')
                    </h1>
                </md-card-title-text>
            </md-card-title>
            <md-card-content layout-wrap layout="row"  flex="100">

                @if($aAlias->count() == 0)
                    <h1 class="md-headline text-center mt-8" flex="100">
                        @t('You might want to create a new alias first')
                    </h1>
                @else

                <md-list ng-cloak  flex="100">

                    @foreach( $aAlias as $mAlias)
                        <md-divider></md-divider>
                        <md-list-item>
                            <p>{{$mAlias->source}}</p>

                            <md-menu class="md-secondary">
                                <md-button class="md-icon-button">
                                    <i class="material-icons md-color-default">toc</i>
                                </md-button>
                                <md-menu-content width="3">
                                    <md-menu-item>
                                        <a class="md-button" href="/alias/update/{{$mAlias->id}}">@t('Edit')</a>
                                    </md-menu-item>
                                    <md-menu-item>
                                        <a class="md-button" href="/alias/delete/{{$mAlias->id}}">@t('Delete')</a>
                                    </md-menu-item>
                                </md-menu-content>
                            </md-menu>
                        </md-list-item>
                    @endforeach

                </md-list>

                {{ $aAlias->links() }}
            @endif

            </md-card-content>
        </md-card>

        <div layout="row" flex="100" layout-align="end center" md-theme="green">
            <a href="/alias/create" md-theme="green" class="md-button md-fab md-green" aria-label="@t('Create new')">
                <i class="material-icons md-white">add</i>
            </a>
        </div>
    </md-content>

@endsection
