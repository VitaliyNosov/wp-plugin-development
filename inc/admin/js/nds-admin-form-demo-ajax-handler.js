jQuery( document ).ready( function( $ ) {

        // add file

        $("input[type=file]").change(function (e) {
            $(this).parents(".uploadFile").find(".filename").text(e.target.files[0].name);
        });

        // add file
 
            // $.ajax({
            //     type: 'POST',
            //     url: 'action_ajax_form.php',
            //     data: new FormData(this),
            //     success: (data) => {
            //         $('#jobModal').html(data);
            //         $( window ).resize();
            //     }
            // });
    
            // e.preventDefault();


        "use strict";
	/**
         * The file is enqueued from inc/admin/class-admin.php.
	 */        
        $( '#nds_add_user_meta_ajax_form' ).submit( function( event ) {

            
            
            event.preventDefault(); // Prevent the default form submit.            
            
            // serialize the form data
            var ajax_form_data = $("#nds_add_user_meta_ajax_form").serialize();
            
            //add our own ajax check as X-Requested-With is not always reliable
            ajax_form_data = ajax_form_data+'&ajaxrequest=true&submit=Submit+Form';
            
            $.ajax({
                url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
                type:   'post',                
                data:   ajax_form_data
            })
            
            .done( function( response ) { // response from the PHP action
                $(" #nds_form_feedback ").html( "<h2>The request was successful </h2><br>" + response );
            })
            
            // something went wrong  
            .fail( function() {
                $(" #nds_form_feedback ").html( "<h2>Something went wrong.</h2><br>" );                  
            })
        
            // after all this time?
            .always( function() {
                event.target.reset();
            });
        
       });


        
});

