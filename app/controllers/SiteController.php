<?php

class SiteController extends BaseController {

    public function __construct()
    {
        $this->viewData = array();
    }

	public function index()
	{
        $this->prepareViewData(array('title'=>'Jason Chaney'));
		return View::make('hello',$this->viewData);
	}

    public function resume(){
        return View::make('hello',$this->viewData);
    }


    /*
    | Get XML Data as Object
    | @param string The path to the XML file
    | @return SimpleXMLElement
    */

    private function getXMLData($path){
        if (file_exists($path)) {
            return simplexml_load_file($path);
        } else {
            exit('Failed to open '.$path);
        }
    }

    /*
    | Sets controller data to pass to view
    | @param array Additional data to set on array
    | @return array
    */

    private function prepareViewData(){
        return $this->viewData = array_merge($array1, $array2);$this->viewData = array(
            'data'=>$this->getXMLData('../data/data.xml')
        );
    }

}