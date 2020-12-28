$(document).ready(function () {            
        
        $("#form-dispositivo").validate({
            // FAZ A VALIDAÇÃO EM TEMPO REAL"
            onkeyup: function(element) {
                this.element(element);
            },
            onfocusout: function(element) {
                this.element(element);
            },
            rules: {
                dispositivo: {
                    required: true,
                    minlength: 2,
                    maxlength: 20
                },  
                ipv4: {
                    
                    minlength: 7,
                    maxlength: 16
                },  
                ipv6: {
                    minlength: 16,
                    maxlength: 40
                },  
                
                mensagem: {
                    rangelength: [50, 1050],
                }
            },
            messages: {
                dispositivo: {
                    required: "O nome do dispositivo não pode ficar vazio",
                    minlength: "Digite no mínimo 2 caracteres",
                    maxlength: "No máxímo 20 caracteres permitidos"
                },
                ipv4: {
                    minlength: "Digite no mínimo 7 caracteres",
                    maxlength: "No máxímo 16 caracteres permitidos"
                    
                },
                ipv6: {
                    minlength: "Digite no mínimo 16 caracteres",
                    maxlength: "No máxímo 40 caracteres permitidos"
                    
                },
                mensagem: {
                    required: "D",
                    minlength: "Mínimo de caracteres permitidos 50",
                    maxlength: "Maxímo de caracteres permitidos 1050"
                },
            }
        });
        });

