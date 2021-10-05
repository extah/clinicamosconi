$("#form-register").validate({
    rules: {

        nombre: {
            required: true,
            minlength: 3,
            maxlength: 30 
        },
        apellido: {
            required: true,
            minlength: 3,
            maxlength: 50 
        },
        email: {
            required: true,
            email: true
        },
        telefono: {
            required: true,
            number: true,
            min: 10,
            max: 10
        },
        dni: {
            required: true,
            number: true,
            min: 8,
            max: 8
        },
        password : {
            minlength: 5,
            maxlength: 16,
            required: true
        },
        confirmpassword : {
            minlength: 5,
            maxlength: 16,
            required: true,
            equalTo : "#password"
        }

    }
});

$("#registrarse").click(function(){
    if($("#form-register").valid() == false) {
        return
    }
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let email = $("#email").val();
    let telefono = $("#telefono").val();
    let dni = $("#dni").val();
    let password = $("#password").val();
    let confirmpassword = $("#confirmpassword").val();
})