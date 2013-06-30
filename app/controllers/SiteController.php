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
        return View::make('resume',$this->viewData);
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

    private function prepareViewData($data){
        return $this->viewData = array_merge($data, array(
            'data'=>$this->getXMLData(app_path().'/data/data.xml')
        ));
    }

    public function contactForm(){
        $validator = Validator::make(
            array(
                'name' => Input::get("name"),
                'email' => Input::get("email"),
                'message' => Input::get("message")
            ),
            array(
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            )
        );

        if ($validator->fails())
        {
            $data = array(
                "status"=>400,
                "data"=>$validator->messages()->first()
            );
            return $data;
        } else {
            $data = array(
                "name"=>Input::get("name"),
                "email"=>Input::get("email"),
                "message_text"=>Input::get("message"),
            );
            Mail::later(10,'emails.welcome', $data, function($message)
            {
                $message->to('jason@creativeacceleration.com', 'Jason Chaney')->subject('JaosnChaney.com Contact Form Submission');
            });
            return array("status"=>200,"data"=>"Thanks! I'll get right back to you.");
        }
    }
}