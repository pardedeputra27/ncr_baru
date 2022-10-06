
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index(){
    echo 'Controller Test';
  }

  public function waktu() // ini percobaan waktu dan ip
  {
    date_default_timezone_set('Asia/Jakarta');
    echo $this->input->ip_address();
    echo $this->session->userdata(SessionApp)['UserID'];
    echo "<br>";
    echo date('Y-m-d G:i:s');
  }
  public function getNcrBy()
  {
   print_r($this->N_model->getNcrByNoNc('123')) ;
  }
  public function email_user() // ini untuk email user
  {
    $data = $this->N_model->get_email_ncr('DDD');
    echo $data['nc_no'];
  }

  public function email(){ // ini untuk email
    $nc_no = '123/COBA/NCR';
    $data_message['ncr']   = $this->N_model->getNcrByNoNc($nc_no);
   // print_r($data_message);
    $this->load->view('mail/view_email_ncr', $data_message);
  }


  public function library(){// ini test library

    $this->load->library('NCRMail');
    $this->ncrmail->test();

  }
  public function calendar(){
    $this->load->library('calendar');

    $data = array(
            3  => 'http://example.com/news/article/2006/06/03/',
            7  => 'http://example.com/news/article/2006/06/07/',
            13 => 'http://example.com/news/article/2006/06/13/',
            26 => 'http://example.com/news/article/2006/06/26/'
    );
    
    echo $this->calendar->generate('','',$data);
    }

     public function get_time_ago( $time )
    {
        $time_difference = time() - $time;

        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }

    }
    function time_elapsed_string($datetime, $full = false) {
      $now = new DateTime;
      $ago = new DateTime($datetime);
      $diff = $now->diff($ago);
  
      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;
  
      $string = array(
          'y' => 'year',
          'm' => 'month',
          'w' => 'week',
          'd' => 'day',
          'h' => 'hour',
          'i' => 'minute',
          's' => 'second',
      );
      foreach ($string as $k => &$v) {
          if ($diff->$k) {
              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
          } else {
              unset($string[$k]);
          }
      }
  
      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' ago' : 'just now';
  }

    public function coba_time_ego(){

      echo $this->get_time_ago( time()-5 ).'<br>';
      echo $this->get_time_ago( time()-60 ).'<br>';
      echo $this->get_time_ago( time()-3600 ).'<br>';
      echo $this->get_time_ago( time()-86400 ).'<br>';
      echo $this->get_time_ago( time()-2592000 ).'<br>';
      echo $this->get_time_ago( time()-31104000 ).'<br>';
      echo "---".'<br>';
      echo $this->get_time_ago( strtotime("2013-12-01") );

    }
    public function coba_time_ego2(){

      echo $this->time_elapsed_string('2021-05-01 00:22:35');
      echo '<br>';
      echo $this->time_elapsed_string('@1367367755'); # timestamp input
      echo '<br>';
      echo $this->time_elapsed_string('2013-05-01 00:22:35', true);

    }

  
}
