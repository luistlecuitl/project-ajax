$(document).ready(function(){
    console.log('Jquery');

    $('#task-result').hide();       

    $('#search').keyup(function(e){
        if($('#search').val()){
            let busqueda = $('#search').val();
                $.ajax({
                    url:'task-busqueda.php',
                    type: 'POST',
                    data: {search: busqueda},
                    success: function(response){
                        let task = JSON.parse(response);
                        let template = '';

                        task.forEach(task=> {
                            template += `<li>
                            ${task.name}
                            </li>`                
                        });

                        $('#container').html(template);
                        $('#task-result').show();
                    }
                });
            }        
    });

    $('#task-form').submit(function(e){
        const postdata = {
            name: $('#name').val(),
            description: $('#description').val(), 
        };
        $.post('task-add.php', postdata, function(response){
            console.log(response);

            $('#task-form').trigger('reset');
        })
        //console.log(postdata);
        e.preventDefault();
    });

    
});