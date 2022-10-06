<?php

class ExportBIRT {

    var $report_type;
    var $doc_name;
    var $doc_format;
    var $header_content;
    var $header_content_element;
    var $header_disposition;
    var $header_disposition_elements;
    var $reports_params;
    var $location;

    public function __construct($params) {
        $this->doc_format = $params['doc_format'];
        $this->doc_name = $params['doc_name'];
        $this->report_type = $params['report_type'];
        $this->reports_params = $params['reports_params'];
        $this->setDocProperty($params['doc_format']);
        $this->location = getcwd();
    }

    public function setDocProperty($doc_format = "") {
        if ($doc_format !== "" || $doc_format != null)
            $this->doc_format = $doc_format;

        $this->header_content_elements = array(
            "doc" => "application/msword",
            "xls" => "application/vnd.ms-excel",
            "pdf" => "application/pdf"
        );

        $this->header_disposition_elements = array(
            "doc" => "inline",
            "pdf" => "attachment",
            "xls" => "inline"
        );

        if ($this->doc_format !== 'html') {
            $this->header_content = $this->header_content_elements[$this->doc_format];
            $this->header_disposition = $this->header_disposition_elements[$this->doc_format];
        }
    }

    public function set_report_params($task) {
        // 
        if($this->report_type == 'ncr'){
                $task->setParameterValue("id_ncr", new java("java.lang.Integer", $this->reports_params));               
        }else if($this->report_type == 'car'){
                $task->setParameterValue("id_car", new java("java.lang.Integer", $this->reports_params));         
        }
    }


    public function ExportDocumentInPDF() {
        header("Content-type: $this->header_content");
        header("Content-Disposition: $this->header_disposition; filename=$this->doc_name" . ".$this->doc_format");

        define("JAVA_HOSTS", "127.0.0.1:8080");
        define("JAVA_SERVLET", "/JavaBridge/JavaBridge.phpjavabridge");
        
        require_once ($this->location."/java/Java.inc");

        $ctx = java_context()->getServletContext();
        $birtReportEngine = java("org.eclipse.birt.php.birtengine.BirtEngine")->getBirtEngine($ctx);
        java_context()->onShutdown(java("org.eclipse.birt.php.birtengine.BirtEngine")->getShutdownHook());
        try {
                $report = $birtReportEngine->openReportDesign($this->location."/assets/reports/$this->report_type.rptdesign");
                $task = $birtReportEngine->createRunAndRenderTask($report);
                
                $this->set_report_params($task);
                
                $taskOptions = new java("org.eclipse.birt.report.engine.api.RenderOption");
                $outputStream = new java("java.io.ByteArrayOutputStream");
                $taskOptions->setOutputStream($outputStream);
    
                $taskOptions->setOption("pdfRenderOption.pageOverflow", "pdfRenderOption.fitToPage");
                $taskOptions->setOutputFormat("pdf");
    
                $task->setRenderOption($taskOptions);
                $task->run();
                $task->close();
                echo java_values($outputStream->toByteArray());
        } catch (JavaException $e) {
            echo "Error happens while generate report, please contact <b>IT Department</b>".$e;
        }
    }

      public function ExportReportInHTML() {

        if (!(get_cfg_var('java.web_inf_dir'))) {
            define("JAVA_HOSTS", "127.0.0.1:8080");
            define("JAVA_SERVLET", "/JavaBridge/JavaBridge.phpjavabridge");
        }
        $imageURLPrefix =BaseURL. "assets/reports/sessionChartImages/";
        require_once ($this->location.'/java/Java.inc');

        $ctx = java_context()->getServletContext();
        $birtReportEngine = java("org.eclipse.birt.php.birtengine.BirtEngine")->getBirtEngine($ctx);
        java_context()->onShutdown(java("org.eclipse.birt.php.birtengine.BirtEngine")->getShutdownHook());

        try {
            $report = $birtReportEngine->openReportDesign($this->location. "/assets/reports/$this->report_type.rptdesign");
            $task = $birtReportEngine->createRunAndRenderTask($report);

            $this->set_report_params($task);
         
            $taskOptions = new java("org.eclipse.birt.report.engine.api.HTMLRenderOption");
            $outputStream = new java("java.io.ByteArrayOutputStream");
            $taskOptions->setOutputStream($outputStream);
            $taskOptions->setEmbeddable(true);
            $taskOptions->setOutputFormat("html");
            $ih = new java("org.eclipse.birt.report.engine.api.HTMLServerImageHandler");
            $taskOptions->setImageHandler($ih);
            $taskOptions->setEnableAgentStyleEngine(true);
            $taskOptions->setBaseImageURL($imageURLPrefix . session_id());
            $taskOptions->setImageDirectory($this->location."/assets/reports/sessionChartImages/" . session_id());
            $task->setRenderOption($taskOptions);
            $task->run();
            $task->close();
            echo $outputStream;
        } catch (JavaException $e) {
            echo "Error happens while generate report, please contact <b>IT Department</b>".$e;
        }
    }
    


    
    // public function ExportDocument() {
    //     header("Content-type: $this->header_content");
    //     header("Content-Disposition: $this->header_disposition; filename=$this->doc_name" . ".$this->doc_format");

    //     define("JAVA_HOSTS", "127.0.0.1:8080");
    //     define("JAVA_SERVLET", "/JavaBridge/JavaBridge.phpjavabridge");
        
    //     require_once ($this->location."java/Java.inc");

    //     $ctx = java_context()->getServletContext();
    //     $birtReportEngine = java("org.eclipse.birt.php.birtengine.BirtEngine")->getBirtEngine($ctx);
    //     java_context()->onShutdown(java("org.eclipse.birt.php.birtengine.BirtEngine")->getShutdownHook());
    //     try {
    //             $report = $birtReportEngine->openReportDesign($this->location."/assets/reports/$this->report_type.rptdesign");
    //             $task = $birtReportEngine->createRunAndRenderTask($report);
                
    //             $this->set_report_params($task);
                
    //             $taskOptions = new java("org.eclipse.birt.report.engine.api.RenderOption");
    //             $outputStream = new java("java.io.ByteArrayOutputStream");
    //             $taskOptions->setOutputStream($outputStream);
    
    //             if ($this->doc_format == "pdf"){
    //                 $taskOptions->setOption("pdfRenderOption.pageOverflow", "pdfRenderOption.fitToPage");
    //             }else if ($this->doc_format == "xls"){
    //                 $taskOptions->setOption("IRenderOption.EMITTER_ID", "org.uguess.birt.report.engine.emitter.xls");
    //             }else if ($this->doc_format == "pptx"){
    //                 $taskOptions->setOption("IRenderOption.EMITTER_ID", "org.eclipse.birt.report.engine.emitter.pptx");
    //             }
    //             $taskOptions->setOutputFormat("$this->doc_format");
    
    //             $task->setRenderOption($taskOptions);
    //             $task->run();
    //             $task->close();
    //             echo java_values($outputStream->toByteArray());
    //     } catch (JavaException $e) {
    //         echo "Error happens while generate report, please contact <b>IT Department</b>".$e;
    //     }
    // }
    
    // public function ExportDocumentToSystem() {
    //     header("Content-type: $this->header_content");
    //     header("Content-Disposition: $this->header_disposition; filename=$this->doc_name" . ".$this->doc_format");

    //     define("JAVA_HOSTS", "127.0.0.1:8080");
    //     define("JAVA_SERVLET", "/JavaBridge/JavaBridge.phpjavabridge");
        
    //     require_once ($this->location."/java/Java.inc");

    //     $ctx = java_context()->getServletContext();
    //     $birtReportEngine = java("org.eclipse.birt.php.birtengine.BirtEngine")->getBirtEngine($ctx);
    //     java_context()->onShutdown(java("org.eclipse.birt.php.birtengine.BirtEngine")->getShutdownHook());
    //     try {
    //             $report = $birtReportEngine->openReportDesign($this->location."/assets/reports/$this->report_type.rptdesign");
    //             $task = $birtReportEngine->createRunAndRenderTask($report);
                
    //             $this->set_report_params($task);
                
    //             $taskOptions = new java("org.eclipse.birt.report.engine.api.RenderOption");
    //             $outputStream = new java("java.io.ByteArrayOutputStream");
    //             $taskOptions->setOutputStream($outputStream);
    
    //             if ($this->doc_format == "pdf"){
    //                 $taskOptions->setOption("pdfRenderOption.pageOverflow", "pdfRenderOption.fitToPage");
    //             }else if ($this->doc_format == "xls"){
    //                 $taskOptions->setOption("IRenderOption.EMITTER_ID", "org.uguess.birt.report.engine.emitter.xls");
    //             }else if ($this->doc_format == "pptx"){
    //                 $taskOptions->setOption("IRenderOption.EMITTER_ID", "org.eclipse.birt.report.engine.emitter.pptx");
    //             }
    //             $taskOptions->setOutputFormat("$this->doc_format");
    //             $taskOptions->setOutputFileName(base_url()."reports/export/".$this->doc_name.".".$this->doc_format);
    
    //             $task->setRenderOption($taskOptions);
    //             $task->run();
    //             $task->close();
    //     } catch (JavaException $e) {
    //         echo "Error happens while generate report, please contact <b>IT Department</b>".$e;
    //     }
    // }



    public function display_docStatus() {
        echo "document name         : $this->doc_name<br/>";
        echo "document format       : $this->doc_format<br/>";
        echo "report name           : $this->report_type<br/>";
        echo "header content        : $this->header_content<br/>";
        echo "header disposition    : $this->header_disposition<br/>";
    }

}
