$(document).ready(function(){

    $('#contact-form').submit(function(){

        event.preventDefault();

        var name = $('#name').val();

        var email = $('#email').val();

        //var phone = $('#InputPhone').val();

        var subject = $('#subject').val();

        var text = $('#message').val();
        
        //var gender = $('#Input').val();

        var submit = $('#btnSubmit').val();

        //console.log(name);
        //console.log(phone);
        //console.log(subject);
        //console.log(gender);
        
        $.ajax({

            url:'assets/php/phpmailer.php',
            type:'POST',
            data:{

                nameVar:name,
                emailVar:email,
                subjectVar:subject,
                textVar:text,
                submitVar:submit

            },
            dataType:'JSON',
            beforeSend:function(xhr){
                console.log("Before");
                $('#btnSubmit').html("Enviando...");

            },
            success:function(e){


                console.log("Success");
                
                //console.log(e['message'])
                //console.log(e['message']);




                //$('#formSubmit').html("Submit");
                //$("#info").html(e);
           
                //$("#info").html(e['nome']);
                var msg = (e['msg']);
                var signal = (e['signal']);

                var info = $('#info');

                console.log(msg);
                console.log(signal);


                if(signal == 'good'){

                    $('#msg').addClass('no-error');
                    $('#msg').html(e['msg']);
                    


                }else{

                    $('#msg').addClass('error');
                    $('#msg').html(e['msg']);
                    

                }
                

                /*
                if(e['signal'] == 'good'){

                    $('#info').html(e['msg']);

                }else{

                    $('#info').html(e['msg']);

                }
                */

            },
            complete:function(){

                console.log("Completed");

                $('#btnSubmit').html("Enviar");

                //$('#info').html(x);

                

            }



        })


    })



})