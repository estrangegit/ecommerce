$(function() {
   var $cp = $('#ecommerce_ecommercebundle_utilisateursadresses_cp');

   $cp.change(function(){

       var $form = $(this).closest('form');
       var data = {};

       data[$cp.attr('name')] = $cp.val();

       $.ajax({
           url : $form.attr('action'),
           type: $form.attr('method'),
           data: data,
           beforeSend: function(){
               if($(".loading").length === 0){
                   $("form .ville").parent().append('<div class="loading"></div>')
               }
           },
           success: function(html) {
               $('#ecommerce_ecommercebundle_utilisateursadresses_ville').replaceWith(
                   $(html).find('#ecommerce_ecommercebundle_utilisateursadresses_ville')
               );
               $(".loading").remove();
           }
       })
   });
});