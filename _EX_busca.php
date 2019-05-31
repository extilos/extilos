

    <div id="all">
        <div id="content">
            <div class="container-full box">
                    <small>Procurar: </small><br>
                    <input id="album" value="album" type="checkbox" checked>Albuns |
                    <input id="pessoa" value="pessoa" type="checkbox" checked>Pessoas |
                    <input id="pagina" value="pagina" type="checkbox" checked>Páginas |
                    <input id="torre" value="torre" type="checkbox" checked>Torre
                    <div class="clearfix" id="search">
                        <input type="text" class="form-control" id="buscador" name="buscador" placeholder="Buscar">
                    <button type="submit" class="btn btn-sm btn-block btn-default btn-secondary"><i class="fa fa-search"></i>buscar</button>
                    <hr>
                    <div id="resultadoBusca"></div>
            </div>

            </div>
            <!-- /.container -->
        </div>
        
        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">© 2018 eXtilos.com</p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->
    </div>
    <script src="/extilos/aplicativo/js/jquery-1.11.0.min.js"></script>
<script src="/extilos/aplicativo/js/bootstrap.min.js"></script>
<script src="/extilos/aplicativo/js/jquery.cookie.js"></script>
<script src="/extilos/aplicativo/js/waypoints.min.js"></script>
<script src="/extilos/aplicativo/js/modernizr.js"></script>
<script src="/extilos/aplicativo/js/bootstrap-hover-dropdown.js"></script>
<script src="/extilos/aplicativo/js/owl.carousel.min.js"></script>
<script src="/extilos/aplicativo/js/front.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
                $("#buscador").on('keyup focusout',function(){
                    var buscador = $("#buscador").val();
                    var album = $("#album").is(':checked');
                    var pessoa = $("#pessoa").is(':checked');
                    var pagina = $("#pagina").is(':checked')
                    var torre = $("#torre").is(':checked')
                    $.ajax({
                        url: 'functions/buscador.php',
                        type: 'POST',
                        data: {nomeBusca:buscador, album:album},

                        success: function(data)
                        {
                            $("#resultadoBusca").html(data);
                        },
                        error: function(){
                            $("#resultadoBusca").html("Erro ao enviar...");
                        }
                    })
                });
            });
    </script>
