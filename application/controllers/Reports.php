<?php

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
       
    public function export_report() {
        
        $report_type = $this->input->get('report_type');

        if($report_type=='car'){
            $doc_format = $this->input->get('doc_format');
            $report_params = $this->input->get('id_car');
            $doc_name = 'Corrective Action Request';
        }elseif($report_type=='ncr'){
            $doc_format = $this->input->get('doc_format');
            $report_params = $this->input->get('id_ncr');
            $doc_name = 'Non Conformity Report';
        }
       
    
        $params = array('doc_format' => $doc_format, 'doc_name' => $doc_name, 'report_type' => $report_type, 'reports_params' => $report_params);
        
        $this->load->library('ExportBIRT', $params);
        $this->exportbirt->setDocProperty($doc_format);
        if($doc_format == "html"){
            $this->exportbirt->ExportReportInHTML();
        }elseif ($doc_format == "pdf") {
                $this->exportbirt->ExportDocumentInPDF();
                echo '<script>window.print()</script>';
        }else{
            echo "document Fortmat Not Supported";
        }

  
        
    }
    
}
