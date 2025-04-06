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
            console.log(responseData);  
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