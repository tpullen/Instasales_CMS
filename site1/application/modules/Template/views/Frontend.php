  <?php $this->load->view('view_header')?>
  <body id="detail">
    <div id="wrap">
    <?php $this->load->view('view_navigation')?>
    <div class="container-wrap" id="product">
    <?php 
      if (!isset($module)){
        $module = $this->uri->segment(1);
      }
      if (!isset($view_file)){
        $view_file = $this->uri->segment(2);
      }
      if (($module!="") && ($view_file!="")){
        $path = $module."/".$view_file;
        $this->load->view($path);
      }
    ?>
    </div>
  <div class="footer-clear"></div>
  <?php $this->load->view('view_footer')?>