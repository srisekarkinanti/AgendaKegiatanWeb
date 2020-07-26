<?php 
class Template {
		var $template_data = array();
		
		function set($content_area, $value)
		{
			$this->template_data[$content_area] = $value;
		}
	
		function load($template = '', $name ='', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			
			$this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('layouts/'.$template, $this->template_data);
		}
}

 ?>