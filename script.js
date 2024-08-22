let navbar = document.querySelector('.header .navbar');


var swiper = new Swiper(".reviews-slider",{
    spaceBetween: 20,
    autoHeight:true,
    grabCursor:true,
    breakpoints: {
        640:{
            slidesPerView: 1,
        },
        768:{
            slidesPerView: 2,
        },
        1024:{
            slidesPerView: 3,
        },
    },
});


$(document).ready(function() {

    // Send product details to the server
    $("#addItemBtn").click(function(e) {
      e.preventDefault(); // Prevent form submission
    
      // Get the closest form element
      var $form = $(this).closest(".form-submit");
    
      // Gather the product details
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
      var pqty = $form.find(".pqty").val();
    
      // Send data using AJAX
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          console.log(response); // Log the response for debugging
          $("#message").html(response); // Display the response
          window.scrollTo(0, 0); // Scroll to top
          load_cart_item_number(); // Update the cart item number
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error: " + status + error); // Log any error
        }
      });
    });
    
    // Load the total number of items added to the cart and display in the navbar
    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response); // Update the cart item number
        }
      });
    }
    
    // Initial call to load the cart item number
    load_cart_item_number();
    });
    


  