@extends('layouts.app')

@section('content')
<body >
        <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
        <div class="container">
            <div class="row justify-content-center">
                   
                        <div class="" style="font-family: 'Courgette', cursive;">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        @if(Auth::user()->hasRole('admin'))
                        <div class="card-deck text-center" style="margin-top:9%">
                            <div class="card" style="border: 1px solid">
                                <img src="https://static.elmundo.sv/wp-content/uploads/2016/07/Presupuesto-Asamblea.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Presupuesto</h5>
                                <p class="card-text">Crea tu presupuesto para que no gastes más de la cuenta</p>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                            <div class="card" style="border: 1px solid">
                                <img src="https://cnbguatemala.org/images/thumb/5/55/Organizadores_de_informaci%C3%B3n_-_ilustraci%C3%B3n_1.png/430px-Organizadores_de_informaci%C3%B3n_-_ilustraci%C3%B3n_1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Informacion</h5>
                                <p class="card-text">Para mas informacion de la pagina utiliza el boton para saber mas.</p>
                                </div>
                                <div class="card-footer">
        
                                </div>
                            </div>
                            <div class="card" style="border: 1px solid">
                                <img src="http://www.intipacharadio.com/wp-content/uploads/2017/12/iletisim-700x339.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <br><br><br>
                                <h5 class="card-title">Contacto</h5>
                                <p class="card-text">Para conocer nuestros contactos porfavor ingresa en la siguiente pagina </p>
                                </div>
                                <div class="card-footer">
        
                                </div>
                            </div>
                            </div>
                        @endif
                        @if(Auth::user()->hasRole('user'))
                        <div class="card-deck text-center" style="margin-top:9%">
                            <div class="card" style="border: 1px solid">
                                <img src="https://static.elmundo.sv/wp-content/uploads/2016/07/Presupuesto-Asamblea.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Presupuesto</h5>
                                <p class="card-text">Crea tu presupuesto para que no gastes más de la cuenta</p>
                                </div>
                                <div class="card-footer">
                                <center><small class="text-muted"> <br> <a href="{{ route('/presupuesto')}}" class="btn btn-primary">crear presupuesto</a></small></center>
                                </div>
                            </div>
                            <div class="card" style="border: 1px solid">
                                <img src="https://cnbguatemala.org/images/thumb/5/55/Organizadores_de_informaci%C3%B3n_-_ilustraci%C3%B3n_1.png/430px-Organizadores_de_informaci%C3%B3n_-_ilustraci%C3%B3n_1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Informacion</h5>
                                <p class="card-text">Para mas informacion de la pagina utiliza el boton para saber mas.</p>
                                </div>
                                <div class="card-footer">
                                <center><small class="text-muted"> <br> <a href="{{ route('/info')}}" class="btn btn-primary">Mas</a></small></center>
                                </div>
                            </div>
                            <div class="card" style="border: 1px solid">
                                <img src="http://www.intipacharadio.com/wp-content/uploads/2017/12/iletisim-700x339.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <br><br><br>
                                <h5 class="card-title">Contacto</h5>
                                <p class="card-text">Para conocer nuestros contactos porfavor ingresa en la siguiente pagina </p>
                                </div>
                                <div class="card-footer">
                                <center><small class="text-muted"> <br> <a href="{{ route('/mas')}}" class="btn btn-primary">Contactos</a></small></center>
                                </div>
                            </div>
                            </div>
                        @endif
                        @if(Auth::user()->hasRole('invitado'))
                        <div class="card-deck text-center" style="margin-top:9%">
                            <div class="card" style="border: 1px solid">
                                <img src="https://static.elmundo.sv/wp-content/uploads/2016/07/Presupuesto-Asamblea.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Presupuesto</h5>
                                <p class="card-text">Crea tu presupuesto para que no gastes más de la cuenta</p>
                                </div>
                              
                            </div>
                            <div class="card" style="border: 1px solid">
                                <img src="https://cnbguatemala.org/images/thumb/5/55/Organizadores_de_informaci%C3%B3n_-_ilustraci%C3%B3n_1.png/430px-Organizadores_de_informaci%C3%B3n_-_ilustraci%C3%B3n_1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Informacion</h5>
                                <p class="card-text">Para mas informacion de la pagina utiliza el boton para saber mas.</p>
                                </div>
                                <div class="card-footer">
                                <center><small class="text-muted"> <br> <a href="{{ route('/info')}}" class="btn btn-primary">Mas</a></small></center>
                                </div>
                            </div>
                            <div class="card" style="border: 1px solid">
                                <img src="http://www.intipacharadio.com/wp-content/uploads/2017/12/iletisim-700x339.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                <br><br><br>
                                <h5 class="card-title">Contacto</h5>
                                <p class="card-text">Para conocer nuestros contactos porfavor ingresa en la siguiente pagina </p>
                                </div>
                                <div class="card-footer">
                                <center><small class="text-muted"> <br> <a href="{{ route('/mas')}}" class="btn btn-primary">Contactos</a></small></center>
                                </div>
                            </div>
                            </div>
                        @endif
                        </div>
                    <br>
                  <div>
                 
        
                  </div>
        
        
                </div>
            </div>
        </div>
@endsection
