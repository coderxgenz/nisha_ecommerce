$(document).ready(function() { 
    //Add to cart 
    $('#add_to_cart_btn').on('click', function(e) {
        e.preventDefault();
        let form = $('#add_to_cart_form')[0];
        let form_data = new FormData(form);  
         let url = $(this).data('url'); 
         fetch(url, {
            method:"POST",
            headers:{
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            },
            body:form_data
         }).then(response => response.json())
         .then(responseData => {    
            $('#add_to_cart_btn').text("Added");
            $('#add_to_cart_btn').attr('disabled', true);
            $('#drawer_cart_section').html(responseData.drawer_cart);
            Swal.fire({
                title: "Success",
                text: "Item has been added to cart",
                icon: "success"
              });
         }).catch(error => console.error('Error:', error));
    });

   
});


function updateQuantity(element, product_id, product_size_id, product_color_id){
    let url = $("#update_qty_url").val();
    // let product_size_id = $("#product_size_id").val();
    // let product_color_id = $("#product_color_id").val();
    let product_quantity = $("#product_quantity_"+product_id+"_"+product_size_id+"_"+product_color_id).val(); 
 

    if (element == 'increase') {
      product_quantity = parseInt(product_quantity) + 1;
    }else if(element == 'decrease'){
      product_quantity = parseInt(product_quantity) - 1;
    }
    if(product_quantity >= 1){ 
    fetch(url, {
      method:"POST",
      headers:{
           'Content-Type': 'application/json',
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
      },
      body:JSON.stringify(
        {
          product_quantity:product_quantity,
          product_id:product_id,
          product_size_id:product_size_id,
          product_color_id:product_color_id
        }
      ), 
   }).then(response => response.json())
   .then(responseData => { 
    console.log(responseData);
  if(responseData.status == 'success' && responseData.message == 'quantity_increased'){
    $(".product_quantity_"+product_id+"_"+product_size_id+"_"+product_color_id).val(product_quantity); 
      Swal.fire({
        title: "Success",
        text: "Item quantity successfully updated.",
        icon: "success"
    });
  }else if(responseData.status == 'success' && responseData.message == 'product_not_in_cart'){
  }else if(responseData.status == 'failed' && responseData.message == 'product_quantity_exceeded'){
    $(".product_quantity_"+product_id+"_"+product_size_id+"_"+product_color_id).val(product_quantity-1);  
      Swal.fire({
        title: "Warning",
        text: `Stock not available more then ${product_quantity-1}.`,
        icon: "warning"
    });
  }
   }).catch(error => console.error('Error:', error));
  }
  }

