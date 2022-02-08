$(function() {
    $('#form_login').validate({
        errorClass: "is-invalid",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "**Email wajib diisi",
                email: "**Masukkan email yang valid"
            },
            password: {
                required: "**Password wajib diisi"
            }
        }
    });


    $('#form_regis').validate({
        errorClass: "is-invalid",
        rules: {
            nama: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm: {
                equalTo: "#id_password"
            }
        },
        messages: {
            nama: {
                required: "**Nama wajib diisi",
                minlength: "**Nama minimal 5 karakter"
            },
            email: {
                required: "**Email wajib diisi",
                email: "**Masukkan email yang valid",
                remote: "**Email sudah digunakan"
            },
            password: {
                required: "**Password wajib diisi",
                minlength: "**Password minimal 5 karakter"
            },
            confirm: {
                equalTo: "**Password tidak cocok"
            }
        }
    })
});