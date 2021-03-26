<?php

trait logging {

    protected $options = array(

        // path of the log txt files
        'path'           => '../application/logs',

        // reference: http://php.net/manual/en/function.chmod.php
        // Read and write for owner, read for everybody else
        'filePermission' => 0644,

    );

    //The syslog protocol - Severities - RFC 5424, section 6.2.1 table 2.
    // https://tools.ietf.org/html/rfc5424

    protected $level = array(

        0 => 'ALERT',             // action must be taken immediately
        1 => 'ERROR',             // error conditions
        2 => 'WARNING',           //warning conditions
        3 => 'INFORMATIONAL',     // informational messages
        4 => 'DEBUG'

    );

     
    // alias functions

    public function alert($log_msg){
        $this->write_log($log_msg, 0);
    }

    public function error($log_msg){
        $this->write_log($log_msg, 1);
    }

    public function warning($log_msg){
        $this->write_log($log_msg, 2);
    }

    public function informational($log_msg){
        $this->write_log($log_msg, 3);
    }
    
    public function debug($log_msg){
        $this->write_log($log_msg, 4);
    }

    // write the log entry
    public function write_log($log_msg, $sev_level) {

        //  get severity level name
        if (isset($this->level[$sev_level])) {
            $sev_level = $sev_level.' '.$this->level[$sev_level];
        }

        // if file handler doesn't exist, then open logfile
        if (!isset($this->fh) || !is_resource($this->fh)) {
            $this->open_log();
        }
        
        // set the timezone to asia/colombo
        date_default_timezone_set('Asia/Colombo');
        $time = date('Y-m-d H:i:s');
        
        // Get the caller function
        $caller = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        
        // Create new log entry
        $entry = $time."\t\t".$caller."\t\t\t\t".$log_msg."\t\t".$sev_level.PHP_EOL;
    
        // write entry to the txt
        flock($this->fh, LOCK_EX);
        fwrite($this->fh, $entry) or 
            die('Cannot write to the log file'.$this->file);
        flock($this->fh, LOCK_UN);
        
        
    }


    // open logfile
    private function open_log() {
        
        // get logfile path
        $this->path = rtrim($this->options['path'], '\\/');
     
        // set logfile name
        $this->file = $this->path.'/'.date('Y-m-d').'.txt';

       // create a log file, if it does not exist
        if (!file_exists($this->file)) {
        
            $this->fh = fopen($this->file, 'w')
                or die('Cannot open log file to write.'.$this->file);
            fclose($this->fh);

            //change permissions if it's not writtable
            if (!is_writable($this->file)) {
                chmod($this->file, $this->options['filePermission']);
            }

        }

        // if file exist, open then appenddd
        $this->fh = fopen($this->file, 'a')
            or die('Cannot open log file to append.'.$this->file);
    }

    // close logfile
    public function __destruct(){
        if ($this->fh) {
            fclose($this->fh);
        }
    }


}