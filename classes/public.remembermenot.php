<?php

if (!class_exists('remembermenotpublic')) {
    class remembermenotpublic
    {
        public function __construct()
        {

            // Add the hook into the login_form
            add_action('login_form', array(&$this, 'start_login_form_cache'), 99);
            // Reset any attempt to set the remember option
            add_action('login_head', array(&$this, 'reset_remember_option'), 99);
        }

        public function remembermenotpublic()
        {
            $this->__construct();
        }

        public function reset_remember_option()
        {

            // Remove the rememberme post value
            if (isset($_POST['rememberme'])) {
                unset($_POST['rememberme']);
            }
        }

        public function start_login_form_cache()
        {
            ob_start(array(&$this, 'process_login_form_cache'));
        }

        public function process_login_form_cache($content)
        {
            $content = preg_replace('/<p class="forgetmenot">(.*)<\/p>/', '', $content);

            return $content;
        }
    }
}

$remembermenotpublic = new remembermenotpublic();
