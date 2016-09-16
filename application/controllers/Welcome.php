<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 
                            'mug' => $record['mug'], 'href' => $record['where'], 
                            'what' => $record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}
        
        public function random()
        {
            $this->data['pagebody'] = 'homepage';
            $source = $this->quotes->all();
            $author = array();
            
            $count = sizeof($source);
            $authorNum = rand(0, $count - 1);
            $record = $source[$authorNum];
            array_push($author,array ('who' => $record['who'], 
                            'mug' => $record['mug'], 'href' => $record['where'], 
                            'what' => $record['what']));
            $this->data['authors'] = $author;
            $this->render();
        }

}
