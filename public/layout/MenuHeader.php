<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/menus.css" type="text/css">    
   
</header>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button type="button" id="sidebarCollapse" class="btn btn-toolbar">
            <i class="fa fa-align-justify"></i><span></span>
        </button>

        <!--<a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="TelaPrincipal.php">Início</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../../resources/config/Logout.php">Sair</a>
                </li>                            
            </ul>
        </div>
    </nav>  
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min_1.js"></script>
     <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
