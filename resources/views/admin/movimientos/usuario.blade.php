@extends('admin.layouts.master')

@section('content')

<section class="section">
    
    <div class="d-flex col-12">
        <div class="col-6">
            <div class="card author-box card-primary">
                <div class="card-body">
                  <div class="author-box- m-0">
                    <div class="author-box-name">
                      <a href="#">{{$usuario->nombre}} {{$usuario->apellido}}</a>
                    </div>
                    <div class="author-box-job">{{$usuario->empresa}}</div>
                    <div class="author-box-description">
                      <p class="m-0">{{$usuario->direccion}},</p>
                      <p class="m-0">{{$usuario->departamento}}, {{$usuario->pais}}</p>
                      <p class="m-0">{{$usuario->telefono}}</p>
                      <p class="m-0">{{$usuario->email}}</p>
                    </div>
                    <div class="mb-2 mt-3"><div class="text-small font-weight-bold">Redes Sociales</div></div>
                    <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon mr-1 btn-github">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <div class="w-100 d-sm-none"></div>
                    <div class="float-right mt-sm-0 mt-3">
                      <a href="#" class="btn">Ver Usuario <i class="fas fa-chevron-right"></i></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card author-box card-primary">
                <div class="card-body">
                  <div class="author-box- m-0">
                    <div class="author-box-name">
                      <a href="#">Movimientos del usuario</a>
                    </div>
                    <div class="author-box-job">{{$usuario->nombre}} {{$usuario->apellido}}</div>
                    <div class="author-box-description">
                        <table class="table table-hover">
                            <tbody>
                              <tr class="m-0 p-0">
                                <th scope="row">Pagadas</th>
                                <td>18</td>
                              </tr>
                              <tr>
                                <th scope="row">No Pagadas / Vencidas</th>
                                <td>2</td>
                              </tr>
                              <tr>
                                <th scope="row">Borradores</th>
                                <td colspan="2">1</td>
                              </tr>
                              <tr>
                                <th scope="row">Canceladas</th>
                                <td colspan="2">4</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>



        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              
            </div>
        </div>

        
    </div>

    
    
</section>


@endsection



        {{-- <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-stats">
                <div class="card-stats-title">Estadísticas -
                  <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">Siempre</a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                      <li class="dropdown-title">Seleccionar filtro</li>
                      <li><a href="#" class="dropdown-item">Esta semana</a></li>
                      <li><a href="#" class="dropdown-item">Este mes</a></li>
                      <li><a href="#" class="dropdown-item">Este año</a></li>
                      <li><a href="#" class="dropdown-item">Siempre</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-stats-items">
                  <div class="card-stats-item">
                    <div class="card-stats-item-count">24</div>
                    <div class="card-stats-item-label">En fecha</div>
                  </div>
                  <div class="card-stats-item">
                    <div class="card-stats-item-count">12</div>
                    <div class="card-stats-item-label">Por vencer</div>
                  </div>
                  <div class="card-stats-item">
                    <div class="card-stats-item-count">23</div>
                    <div class="card-stats-item-label">Vencidas</div>
                  </div>
                </div>
              </div>
              <div class="d-flex col-12 m-0 p-0 text-center">
                <div class="col-6 m-0 p-0">
                    <div class="card-wrap">
                        <div class="card-header">
                          <h4>Transacciones</h4>
                        </div>
                        <div class="card-body">
                          59
                        </div>
                    </div>
                </div>
                <div class="col-6 m-0 p-0">
                    <div class="card-wrap">
                        <div class="card-header">
                          <h4>Balance</h4>
                        </div>
                        <div class="card-body">
                          $18.702
                        </div>
                    </div>
                </div>
                
              </div>
              
            </div>
        </div> --}}