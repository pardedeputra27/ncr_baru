<?php
    class Error extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->auth->is_has_session() === FALSE)
		{
			redirect(SSON_URL);
		}
    }


   public function error_403()
	{
		$this->load->view('errors/unauthorized');
	}

	public function error_not_allowed()
	{
		$this->load->view('errors/not_allowed');
	}


}
