<div id="top">
        <div class="container">
            <div class="col-md-2 offer" data-animate="fadeInDown">
                 <img src="imagem/sistema/extilos.png" alt="extilos logo" height="40" class="">
            </div>
            <div class="col-md-4" data-animate="fadeInDown">
            <ul class="nav nav-pills nav-justified">
                    <li><a href="register.html">Home</a>
                    </li>
                    <li><a href="register.html">Sobre</a>
                    </li>
                    <li><a href="contact.html">Cadastro</a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
            	<form class="" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Buscar</button>

                            </span>
                        </div>
                    </form>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>