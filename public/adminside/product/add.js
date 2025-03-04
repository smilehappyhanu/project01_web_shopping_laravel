$(function(){
    $(".product_tag_select2").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
    $(".product_category_select2").select2({
        placeholder: "Select a product category",
        allowClear: true
    })
});