
        function checagem(id) {
            if (id == 'customCheck') {
                document.getElementById("customCheck").checked = true;
                document.getElementById("customCheck2").checked = false;
            }
            if (id == 'customCheck2') {
                document.getElementById("customCheck2").checked = true;
                document.getElementById("customCheck").checked = false;
            }
        }