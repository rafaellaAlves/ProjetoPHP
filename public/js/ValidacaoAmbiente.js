 $(document).ready(function () {

            $("#form-ambiente").validate({
                // FAZ A VALIDAÇÃO EM TEMPO REAL"
                onkeyup: function (element) {
                    this.element(element);
                },
                onfocusout: function (element) {
                    this.element(element);
                },
                rules: {
                    ambiente: {
                        required: true,
                        minlength: 2,
                        maxlength: 40
                    },
                    mensagem: {
                        rangelength: [50, 1050],
                    }
                },
                messages: {
                    ambiente: {
                        required: "O ambiente não pode ficar vazio",
                        minlength: "Digite no mínimo 2 caracteres",
                        maxlength: "No maxímo 40 caracteres permitidos"
                    },
                    mensagem: {
                        required: "D",
                        minlength: "Mínimo de caracteres permitidos 50",
                        maxlength: "Maxímo de caracteres permitidos 1050"
                    },
                }
            });
        });