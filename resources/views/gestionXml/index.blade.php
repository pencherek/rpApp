@extends('gestionXml.gestionXml')
@inject('GestionXml', 'App\Http\Controllers\GestionXmlController')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
        .content table td:last-child {
            word-break: break-word;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <h1>descript.rap</h1>
        <div class="card-content">
            <div class="content">
                @if(sizeof($modelWizardRaps)>0)
                    <table id="modelWizardRaps" class="table is-hoverable table-sm table-dark">
                    <tr>
                        <th scope="col">Model id</th>
                        <th scope="col">Wizard caption</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($modelWizardRaps as $modelWizardRap)
                        @foreach($modelWizardRap->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'RAP.evaluate'))
                                <tr>
                                    <td>{{$modelWizardRap['id']}}</td>
                                    <td>{{$wizard['caption']}}</td>
                                    <td>{{$GestionXml::filter('RAP.evaluate','}',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($pageWizardRaps)>0)
                    <table id="pageWizardRaps" class="table is-hoverable">
                    <tr>
                        <th scope="col">Page id</th>
                        <th scope="col">Wizard caption</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($pageWizardRaps as $pageWizardRap)
                        @foreach($pageWizardRap->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'RAP.evaluate'))
                                <tr>
                                    <td>{{$pageWizardRap['id']}}</td>
                                    <td>{{$wizard['caption']}}</td>
                                    <td>{{$GestionXml::filter('RAP.evaluate','}',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($codelineWizardRaps)>0)
                    <table id="codelineWizardRaps" class="table is-hoverable">
                    <tr>
                        <th scope="col">Codeline id</th>
                        <th scope="col">Wizard title</th>
                        <th scope="col">Wizard label</th>
                        <th scope="col">Wizard icon</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($codelineWizardRaps as $codelineWizardRap)
                        @foreach($codelineWizardRap->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'RAP.evaluate'))
                                <tr>
                                    <td>{{$codelineWizardRap['id']}}</td>
                                    <td>{{$wizard['title']}}</td>
                                    <td>{{$wizard['label']}}</td>
                                    <td>{{$wizard['icon']}}</td>
                                    <td>{{$GestionXml::filter('RAP.evaluate','}',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($codelineConstRaps)>0)
                    <table id="codelineConstRaps" class="table is-hoverable">
                    <tr>
                        <th scope="col">Codeline id</th>
                        <th scope="col">Const id</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($codelineConstRaps as $codelineConstRap)
                        @foreach($codelineConstRap->Consts->Const as $const)
                            @if(str_contains($const,'RAP.evaluate'))
                                <tr>
                                    <td>{{$codelineConstRap['id']}}</td>
                                    <td>{{$const['id']}}</td>
                                    <td>{{$GestionXml::filter('RAP.evaluate','}',(string)$const)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($pageInfoSqlRaps)>0)
                    <table id="pageInfoSqlRaps" class="table is-hoverable">
                    <tr>
                        <th scope="col">Page id</th>
                        <th scope="col">InfoSQL caption</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($pageInfoSqlRaps as $pageInfoSqlRap)
                        @foreach($pageInfoSqlRap->InfoLines->InfoSQL as $infoSql)
                            @if(str_contains($infoSql,'RAP.evaluate'))
                                <tr>
                                    <td>{{$pageInfoSqlRap['id']}}</td>
                                    <td>{{$infoSql['caption']}}</td>
                                    <td>{{$infoSql}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($modelWizardActions)>0)
                    <table id="modelWizardActions" class="table is-hoverable">
                    <tr>
                        <th scope="col">Model id</th>
                        <th scope="col">Wizard caption</th>
                        <th scope="col">ACTION:doEvaluate</th>
                    </tr>
                    @foreach($modelWizardActions as $modelWizardAction)
                        @foreach($modelWizardAction->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'ACTION:doEvaluate'))
                                <tr>
                                    <td>{{$modelWizardAction['id']}}</td>
                                    <td>{{$wizard['caption']}}</td>
                                    <td>{{$GestionXml::filter('ACTION:doEvaluate',';',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($pageWizardActions)>0)
                    <table id="pageWizardActions" class="table is-hoverable">
                    <tr>
                        <th scope="col">Page id</th>
                        <th scope="col">Wizard caption</th>
                        <th scope="col">ACTION:doEvaluate</th>
                    </tr>
                    @foreach($pageWizardActions as $pageWizardAction)
                        @foreach($pageWizardAction->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'ACTION:doEvaluate'))
                                <tr>
                                    <td>{{$pageWizardAction['id']}}</td>
                                    <td>{{$wizard['caption']}}</td>
                                    <td>{{$GestionXml::filter('ACTION:doEvaluate',';',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($codelineWizardActions)>0)
                    <table id="codelineWizardActions" class="table is-hoverable">
                    <tr>
                        <th scope="col">Codeline id</th>
                        <th scope="col">Wizard title</th>
                        <th scope="col">Wizard label</th>
                        <th scope="col">Wizard icon</th>
                        <th scope="col">ACTION:doEvaluate</th>
                    </tr>
                    @foreach($codelineWizardActions as $codelineWizardAction)
                        @foreach($codelineWizardAction->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'ACTION:doEvaluate'))
                                <tr>
                                    <td>{{$codelineWizardAction['id']}}</td>
                                    <td>{{$wizard['title']}}</td>
                                    <td>{{$wizard['label']}}</td>
                                    <td>{{$wizard['icon']}}</td>
                                    <td>{{$GestionXml::filter('ACTION:doEvaluate',';',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($codelineConstActions)>0)
                    <table id="codelineConstActions" class="table is-hoverable">
                    <tr>
                        <th scope="col">Codeline id</th>
                        <th scope="col">Const id</th>
                        <th scope="col">ACTION:doEvaluate</th>
                    </tr>
                    @foreach($codelineConstActions as $codelineConstAction)
                        @foreach($codelineConstAction->Consts->Const as $const)
                            @if(str_contains($const,'ACTION:doEvaluate'))
                                <tr>
                                    <td>{{$codelineConstAction['id']}}</td>
                                    <td>{{$const['id']}}</td>
                                    <td>{{$GestionXml::filter('ACTION:doEvaluate',';',(string)$const)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($pageInfoSqlActions)>0)
                    <table id="pageInfoSqlActions" class="table is-hoverable">
                    <tr>
                        <th scope="col">Page id</th>
                        <th scope="col">InfoSQL caption</th>
                        <th scope="col">ACTION:doEvaluate</th>
                    </tr>
                    @foreach($pageInfoSqlActions as $pageInfoSqlAction)
                        @foreach($pageInfoSqlAction->InfoLines->InfoSQL as $infoSql)
                            @if(str_contains($infoSql,'ACTION:doEvaluate'))
                                <tr>
                                    <td>{{$pageInfoSqlAction['id']}}</td>
                                    <td>{{$infoSql['caption']}}</td>
                                    <td>{{$infoSql}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <h1>states.rap</h1>
        <div class="card-content">
            <div class="content">
                @if(sizeof($stateWizardRaps)>0)
                    <table id="stateWizardRaps" class="table is-hoverable table-sm table-dark">
                    <tr>
                        <th scope="col">State id</th>
                        <th scope="col">Wizard caption</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($stateWizardRaps as $stateWizardRap)
                        @foreach($stateWizardRap->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'RAP.evaluate'))
                                <tr>
                                    <td>{{$stateWizardRap['id']}}</td>
                                    <td>{{$wizard['caption']}}</td>
                                    <td>{{$GestionXml::filter('RAP.evaluate','}',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
                @if(sizeof($stateWizardActions)>0)
                    <table id="stateWizardActions" class="table is-hoverable table-sm table-dark">
                    <tr>
                        <th scope="col">State id</th>
                        <th scope="col">Wizard caption</th>
                        <th scope="col">RAP:Evaluate</th>
                    </tr>
                    @foreach($stateWizardActions as $stateWizardAction)
                        @foreach($stateWizardAction->Wizards->Wizard as $wizard)
                            @if(str_contains($wizard,'RAP.evaluate'))
                                <tr>
                                    <td>{{$stateWizardAction['id']}}</td>
                                    <td>{{$wizard['caption']}}</td>
                                    <td>{{$GestionXml::filter('RAP.evaluate','}',(string)$wizard)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection