$( document ).ready(function() {

        jQuery("#menu-toggle").click(function(e) {
          e.preventDefault();
          jQuery("#wrapper").toggleClass("toggled");
      });
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          jQuery("#wrapper").toggleClass("toggled");
      }
		

    //Paging for Products List
   $('.customers_tbl').DataTable();
   $('.products_tbl').DataTable();
   $('.categories_tbl').DataTable();
   $('.orders_tbl').DataTable();
   $('.shipping_tbl').DataTable();
   $('.colours_tbl').DataTable();
   $('.sizes_tbl').DataTable();
   $('.weights_tbl').DataTable();
   $('.cat_assigned_tbl').DataTable();



});
