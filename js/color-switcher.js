jQuery(document).ready(function($) {
    $('#color-select').change(function() {
        var selectedColor = $(this).val();
        
        // Use AJAX to fetch product variations for the selected color and update product image and price
        $.ajax({
            url: ajax_url,
            type: 'POST',
            data: {
                action: 'update_product_variation',
                selectedColor: selectedColor,
            },
            success: function(response) {
                // Update product image and price here
            }
        });
    });
});
