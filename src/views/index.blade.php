@extends('crudgen::main')

@section(('css-especifico'))
    <style>
        .landpage-image{
            background-image: url(/crudgen/img/bg_crud.jpg) !important;
            background-repeat: no-repeat !important;
            height: 100%;
        //background-attachment: fixed !important;

            -webkit-background-size: 100% !important;
            -moz-background-size: 100% !important;
            -o-background-size: 100% !important;
            background-size: 100% !important;
            -webkit-background-size: cover !important;
            -moz-background-size: cover !important;
            -o-background-size: cover !important;
            background-size: cover !important;
        }
    </style>
@stop

@section('content')
    <div class="ui vertical masthead aligned segment landpage-image">

        <div class="ui container">
            <div class="ui large secondary pointing menu">
                <a class="active item">Fill the fields to generate the CRUD files</a>
                <div class="right item">
                    <a href="{{ url('/generate') }}" class="ui positive basic button">Start Generating</a>
                </div>
            </div>
        </div><br>

        <div class="ui container">
            <h1 class="ui header"></h1>
            <form class="ui form">
                <h4 class="ui dividing header">General Data</h4><br>
                <div class="two fields">
                    <div class="field">
                        <label>Page Name (UpperCamelCase)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted browser icon"></i>
                            <input type="text" name="pageName" placeholder="Eg.: SamplePage">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Module Name (UpperCamelCase)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted sitemap icon"></i>
                            <input type="text" name="moduleName" placeholder="Eg.: InProcess">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label>Object on Singular (Letter Case)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted hand pointer icon"></i>
                            <input type="text" name="objSingular" placeholder="Eg.: Sample Page">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Object on Plural (Letter Case)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted hand peace icon"></i>
                            <input type="text" name="objPlural" placeholder="Eg.: Sample Pages">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label>The nomenclature of name field on model (lowercase)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted info icon"></i>
                            <input type="text" name="nameField" placeholder="Eg.: name">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Table Name (lower_case)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted database icon"></i>
                            <input type="text" name="tableName" placeholder="Eg.: inp_sample_pages">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label>Breadcrumbs Parent Name (lowercase)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted fork icon"></i>
                            <input type="text" name="breadParent" placeholder="Eg.: inprocess">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Can Export XLS File?</label>
                        <div class="ui toggle checkbox" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required style="margin-top: 0.5em;">
                            <input type="checkbox" name="exportXLS">
                            <label>Can this page export a XLS of itens list?</label>
                        </div>
                    </div>
                </div>
            </form>
        </div><br><br>

        <div class="ui container">
            <h1 class="ui header"></h1>
            <form class="ui form">
                <h4 class="ui dividing header">File Paths</h4><br>
                <div class="two fields">
                    <div class="field">
                        <label>Model</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted browser icon"></i>
                            <input type="text" name="pageName" placeholder="Eg.: SamplePage">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>View</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted sitemap icon"></i>
                            <input type="text" name="moduleName" placeholder="Eg.: InProcess">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label>JavaScript</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted hand pointer icon"></i>
                            <input type="text" name="objSingular" placeholder="Eg.: Sample Page">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Controller</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted hand peace icon"></i>
                            <input type="text" name="objPlural" placeholder="Eg.: Sample Pages">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label>The nomenclature of name field on model (lowercase)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted info icon"></i>
                            <input type="text" name="nameField" placeholder="Eg.: name">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Table Name (lower_case)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted database icon"></i>
                            <input type="text" name="tableName" placeholder="Eg.: inp_sample_pages">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label>Breadcrumbs Parent Name (lowercase)</label>
                        <div class="ui fluid corner labeled left icon input" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required>
                            <i class="circular inverted fork icon"></i>
                            <input type="text" name="breadParent" placeholder="Eg.: inprocess">
                            <div class="ui corner label">
                                <i class="asterisk icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Can Export XLS File?</label>
                        <div class="ui toggle checkbox" data-content="Você precisa escolher em qual cidade você está, para poder continuar." data-variation="wide inverted" required style="margin-top: 0.5em;">
                            <input type="checkbox" name="exportXLS">
                            <label>Can this page export a XLS of itens list?</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop