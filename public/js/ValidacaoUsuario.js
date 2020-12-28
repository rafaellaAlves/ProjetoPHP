


$(document).ready(function () {
//           
            $("#form-usuario").validate({
                // FAZ A VALIDAÇÃO EM TEMPO REAL"
                onkeyup: function (element) {
                    this.element(element);
                },
                onfocusout: function (element) {
                    this.element(element);
                },
                rules: {
                    nome: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        email: true,
                        minlength: 20
                    },
                    login: {
                        required: true,
                        minlength: 8,
                        maxlength: 15
                    },
                    senha: {
                        required: true,
                        minlength: 6,
                        maxlength: 10
                    },
                    mensagem: {
                        rangelength: [50, 1050],
                    }
                },
                messages: {
                    nome: {
                        required: "O nome completo do usuário não pode ficar vazio",
                        minlength: "Digite no mínimo 3 caracteres",
                        maxlength: "No maxímo 50 caracteres permitidos"

                    },
                    email: {
                        required: "Digite um email válido"

                    },
                    login: {
                        required: "O nome de usuário não pode ficar vazio!",
                        minlength: "Digite no mínimo 8 caracteres",
                        maxlength: "No máxímo 15 caracteres permitidos"
                    },
                    senha: {
                        required: "A senha não pode ficar vazia!",
                        minlength: "Digite no mínimo 6 caracteres",
                        maxlength: "No máxímo 10 caracteres permitidos"
                    },
                    mensagem: {
                        required: "D",
                        minlength: "Mínimo de caracteres permitidos 50",
                        maxlength: "Maxímo de caracteres permitidos 1050"
                    },
                }
            });

        });