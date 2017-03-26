
@extends('layout.app', [
    'scripts' => [
        '/assets/js/installer.min.js'
    ]
])


@section('content')
<md-content class="md-padding" layout-xs="column" layout="row" layout-align="center start"
            layout-wrap ng-controller="installerSetup as vm" ng-init="vm.parse('{{json_encode(old())}}')">

    @include('installer.header')

    @if($errors->count() > 0)
        <div flex-xs flex-gt-xs="100" layout="row" class="mb-16">
            <md-card md-theme="red" flex>
                <md-card-content layout="row">
                    <div flex="nogrow" class="pr-16">
                        <i class="material-icons md-color-white large" style="color: white;">warning</i>
                    </div>
                    <div flex>
                        <span class="md-headline">@t('Ups.. so gehts nicht')</span>
                        <p>
                            @t('Bitte überprüfe deine Angaben noch einmal und versuche es erneut.')
                        </p>
                    </div>
                </md-card-content>
            </md-card>
        </div>
    @endif

    @if(isset($matrix))
        @if(count($matrix) == 0)
            <div flex-xs flex-gt-xs="100" layout="row" class="mb-16">
                <md-card md-theme="light-blue" flex>
                    <md-card-content layout="row">
                        <div flex="nogrow" class="pr-16">
                            <i class="material-icons md-color-white large" style="color: white;">info</i>
                        </div>
                        <div flex>
                            <span class="md-headline">@t('Keine Tabellen gefunden')</span>
                            <p>
                                @t('Es konnten keine Tabellen zum mappen gefunden werden.')
                                <br />
                                @t('Bitte legen zunächt die Tabellen an oder überspringen Sie diesen Schritt um die Tabellen automatisch zu erstellen.')
                            </p>
                        </div>
                    </md-card-content>
                </md-card>
            </div>
        @endif
    @endif


    <form method="POST" action="/installer/database" flex="100" layout="row" ng-submit="vm.generateDomainMap()">

        {{ csrf_field() }}
        <input type="hidden" name="mapping" ng-model="vm.json_map" value="[[vm.json_map]]" />

        @if(isset($matrix))
            @if(count($matrix) == 0)
                <div flex="100">
                    <md-card-actions layout="row" layout-align="end center" class="pt-16">
                        <button class="md-button md-primary md-raised md-primary" href="">@t('Tabellen anlegen')</button>
                    </md-card-actions>
                </div>
            @else
                <div flex-xs flex-gt-xs="100" layout="row">
                    <md-card md-theme="default" flex>
                        <md-card-content>
                            @include('installer.database-mapping-mailbox')
                        </md-card-content>
                        <md-card-content>
                            @include('installer.database-mapping-alias')
                        </md-card-content>
                        <md-card-content>
                            @include('installer.database-mapping-domain')
                        </md-card-content>

                        <md-card-actions layout="row" layout-align="end center" class="p-16">
                            <button class="md-button md-primary md-raised md-primary">@t('Mapping übernehmen')</button>
                        </md-card-actions>
                    </md-card>
                </div>
            @endif
        @endif
    </form>



</md-content>
@endsection
