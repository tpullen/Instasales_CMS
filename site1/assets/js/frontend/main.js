


function showPersonal() {
   document.getElementById('personal').style.display = "block";
   document.getElementById('delivery').style.display = "none";
   document.getElementById('card').style.display = "none";
}

function showDelivery() {
   document.getElementById('delivery').style.display = "block";
   document.getElementById('personal').style.display = "none";
   document.getElementById('card').style.display = "none";
}

function showCard() {
   document.getElementById('card').style.display = "block";
   document.getElementById('personal').style.display = "none";
   document.getElementById('delivery').style.display = "none";
}



/*if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} */

$(document).ready(function(){
  $(".popup-box").hide;
  $(".add-to-cart").click(function(){
      $(".popup-box").show('slow').delay(3000).hide('slow');
  });

  $('#add-cart-form').submit(function (e) {
    var form = this;
    e.preventDefault();
    setTimeout(function () {
        form.submit();
    }, 1000);
  }); 

});


$(document).ready(function(){

  // Order delivery
  if (window.location.pathname == "/Orders") {
    cart_total = document.getElementById("order-total").textContent;
    var delivery = $("#shipping option:selected").val();

    var order_total = +cart_total + +delivery;

    document.getElementById("order-total").textContent = order_total.toFixed(2);

    $('#shipping').change(function() {
      var delivery = $("#shipping option:selected").val();

      var order_total = +cart_total + +delivery;

      document.getElementById("order-total").textContent = order_total.toFixed(2);
    });
  }
  
  //Paging for Products List
  jQuery("div.pagination").jPages({
      containerID  : "product-list",
      perPage      : 12, 
      previous: false,
      next: false,
      minHeight:false,
      callback:function(pages){
      	jQuery('html').animate({scrollTop:0}, 'slow');//IE, FF
        jQuery('body').animate({scrollTop:0}, 'slow');//chrome, don't know if safary works

        if (pages.count == 1){
          jQuery("div.pagination").hide();
        }else{
          jQuery("div.pagination").show();
        }
      }
  });

  if($('.order-id').text()=='N/A'){
    document.getElementsByClassName("order-table order-id");
    $('.order-table').hide();
    $('.no-orders').text('You have no current orders');
  }else{
    $('.order-table').show();
    $('.no-orders').hide();
  }


});

