$(document).ready(function () {         
        
        $("#form-modelo").validate({
            // FAZ A VALIDAÇÃO EM TEMPO REAL"
            onkeyup: function(element) {
                this.element(element);
            },
            onfocusout: function(element) {
                this.element(element);
            },
            rules: {
                modelo: {
                    required: true,
                    minlength: 2,
                    maxlength: 20
                },              
                mensagem: {
                    rangelength: [50, 1050],
                }
            },
            messages: {
                modelo: {
                    required: "O nome do modelo não pode ficar vazio",
                    minlength: "Digite no mínimo 2 caracteres",
                    maxlength: "No maxímo 20 caracteres permitidos"
                    
                },
                mensagem: {
                    required: "D",
                    minlength: "Mínimo de caracteres permitidos 50",
                    maxlength: "Maxímo de caracteres permitidos 1050"
                },
            }
        });
        });

