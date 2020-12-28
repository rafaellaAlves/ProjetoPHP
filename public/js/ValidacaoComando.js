 $(document).ready(function () {

            $("#form-comando").validate({
                // FAZ A VALIDAÇÃO EM TEMPO REAL"
                onkeyup: function (element) {
                    this.element(element);
                },
                onfocusout: function (element) {
                    this.element(element);
                },
                rules: {
                    titulo: {
                        required: true,
                        minlength: 3,
                        maxlength: 40
                    },
                    descricao: {
                        required: true,
                        minlength: 15,
                        maxlength: 255
                    },

                    mensagem: {
                        rangelength: [50, 1050],
                    }
                },
                messages: {
                    titulo: {
                        required: "O título não pode ficar vazio",
                        minlength: "Digite no mínimo 3 caracteres",
                        maxlength: "No máxímo 40 caracteres permitidos"
                    },
                    descricao: {
                        required: "A descrição do comando não pode ficar vazio",
                        minlength: "Digite no mínimo 15 caracteres",
                        maxlength: "No maxímo 255 caracteres permitidos"

                    },

                    mensagem: {
                        required: "D",
                        minlength: "Mínimo de caracteres permitidos 50",
                        maxlength: "Maxímo de caracteres permitidos 1050"
                    },
                }
            });
        });


