/**
 * Created by Julio Guajardo on 24/07/2016.
 */

$(document).ready(function(){
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');

        //alert(id);

        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID',id);
        var data = form.serialize();
        //alert(data);

        bootbox.confirm(message, function(res){
           if(res == true)
           {
               $.post(url, data,function(result)
               {
                    alert(result.remove);

                    if(result.removed == 1)
                    {
                        alert("entre a result");
                        row.fadeOut();
                        $('message').removeClass('hidden');
                        var totalComuna = $('#total').text();
                        if($.isNumeric(totalComuna))
                        {
                            $('#total').text(totalComuna - 1);
                        }
                        else
                        {
                            $('#total').text(result.countComuna);
                        }
                    }
               });
           }
        });

    });
});