<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use XSLTProcessor;

class GestionXmlController extends Controller
{
    public function index(){
        /*$xmlString = simplexml_load_file(public_path('xml/descript.rap'));
        $modelWizardRaps = $xmlString->xpath("//Model/Wizards/Wizard[contains(.,'RAP.evaluate')]/parent::Wizards/parent::Model");
        $pageWizardRaps = $xmlString->xpath("//Page/Wizards/Wizard[contains(.,'RAP.evaluate')]/parent::Wizards/parent::Page");
        $codelineWizardRaps = $xmlString->xpath("//CodeLine/Wizards/Wizard[contains(.,'RAP.evaluate')]/parent::Wizards/parent::CodeLine");
        $codelineConstRaps = $xmlString->xpath("//CodeLine/Consts/Const[contains(.,'RAP.evaluate')]/parent::Consts/parent::CodeLine");
        $pageInfoSqlRaps = $xmlString->xpath("//Page/InfoLines/InfoSQL[contains(.,'RAP.evaluate')]/parent::InfoLines/parent::Page");
        $modelWizardActions = $xmlString->xpath("//Model/Wizards/Wizard[contains(.,'ACTION:doEvaluate')]/parent::Wizards/parent::Model");
        $pageWizardActions = $xmlString->xpath("//Page/Wizards/Wizard[contains(.,'ACTION:doEvaluate')]/parent::Wizards/parent::Page");
        $codelineWizardActions = $xmlString->xpath("//Codeline/Wizards/Wizard[contains(.,'ACTION:doEvaluate')]/parent::Wizards/parent::Codeline");
        $codelineConstActions = $xmlString->xpath("//CodeLine/Consts/Const[contains(.,'ACTION:doEvaluate')]/parent::Consts/parent::CodeLine");
        $pageInfoSqlActions = $xmlString->xpath("//Page/InfoLines/InfoSQL[contains(.,'ACTION:doEvaluate')]/parent::InfoLines/parent::Page");
        unset($xmlString);
        $xmlString = simplexml_load_file(public_path('xml/states.rap'));
        $stateWizardRaps = $xmlString->xpath("//State/Wizards/Wizard[contains(.,'RAP.evaluate')]/parent::Wizards/parent::State");
        $stateWizardActions = $xmlString->xpath("//State/Wizards/Wizard[contains(.,'ACTION:doEvaluate')]/parent::Wizards/parent::State");
        unset($xmlString);*/
        #dd(str_replace(preg_split('/(RAP.evaluate.*?;)/',(string)$codelineConstRaps[0]->Consts->Const[0]),'',(string)$codelineConstRaps[0]->Consts->Const[0]));
        $xml = new DOMDocument;
        $xml->load(public_path('xml/affaire.xml'));

        $xsl = new DOMDocument;
        $xsl->load(public_path('xml/affaire.xsl'));

        // Configure the transformer
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsl);
        dd($proc->transformToXML($xml));
        return view('gestionXml.index', compact('modelWizardRaps','pageWizardRaps','codelineWizardRaps','codelineConstRaps','pageInfoSqlRaps','modelWizardActions','pageWizardActions','codelineWizardActions','codelineConstActions','pageInfoSqlActions','stateWizardRaps','stateWizardActions'));
    }

    public static function filter($start,$end,$s){
        return str_replace(preg_split("/($start.*?$end)/",$s),'',$s);
    }

}
