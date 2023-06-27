@extends('admin.layouts.master')

@section('content')

<body>
    <div id="app">  
        <!-- Main Content -->
        <div class="">
          <section class="section">
            <div class="section-header d-flex justify-content-between align-items-center">
              <h1 class="mr-auto">Dashboard</h1>
              
            </div>
            <div class="row">
              <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Clientes</h4>
                    </div>
                    <div class="card-body">
                      {{$clienteCount}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Proveedores</h4>
                    </div>
                    <div class="card-body">
                      {{$proveedoresCount}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-secondary">
                    <i class="far fa-circle"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Movimientos</h4>
                    </div>
                    <div class="card-body">
                      {{ $totalTransacciones}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Vigentes</h4>
                    </div>
                    <div class="card-body">
                      36
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Por vencer</h4>
                    </div>
                    <div class="card-body">
                      3
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Vencidos</h4>
                    </div>
                    <div class="card-body">
                      6
                    </div>
                  </div>
                </div>
              </div>                  
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Estadísticas</h4>
                    <div class="card-header-action">
                      <div class="btn-group">
                        <a href="#" class="btn btn-primary">Semana</a>
                        <a href="#" class="btn">Mes</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart" height="182"></canvas>
                    <div class="statistic-details mt-sm-4">
                      <div class="statistic-details-item">
                        <div class="detail-value">${{$cobradoHoy}}</div>
                        <div class="detail-name">Ingresos hoy</div>
                      </div>
                      <div class="statistic-details-item">
                        <div class="detail-value">${{$ingresosSemana}}</div>
                        <div class="detail-name">Ingresos esta semana</div>
                      </div>
                      <div class="statistic-details-item">
                        <div class="detail-value">${{$ingresosMes}}</div>
                        <div class="detail-name">Ingresos este mes</div>
                      </div>
                      <div class="statistic-details-item">
                        <div class="detail-value">${{$ingresosAño}}</div>
                        <div class="detail-name">Ingresos este año</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Últimos Movimientos</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr class="text-center">
                            <th>Id</th>
                            <th>Nombre del Cliente</th>
                            <th>Tipo</th>
                            <th>Concepto de Movimiento</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th class="col-2 text-right"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($movimientos as $movimiento)
                            <tr class="text-center">
                              <td>{{ $movimiento->id }}</td>
                              <td>{{ $movimiento->nombre_cliente }}</td>
                              <td>
                                @if ($movimiento->tipo === 'Cobro')
                                  <span class="text-success font-weight-bold">Ingreso</span>
                                @else
                                  <span class="text-danger font-weight-bold">Egreso</span>
                                @endif
                              </td>
                              <td>{{ $movimiento->concepto }}</td>
                              <td>{{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y') }}</td>
                              <td>${{ number_format($movimiento->monto, 0, ',', '.') }}</td>
                              <td class="col-2 text-right">
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Editar">
                                  <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Eliminar" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Eliminar')">
                                  <i class="fas fa-trash"></i>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card-header-action text-right mr-4">
                  <a href="{{ route('admin.movimientos.transactions') }}" class="btn btn-primary">Ver Todos</a>
                </div>
              </div>
            </div>
            
          </section>
        </div>


        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="https://nauval.in/">Maton</a>
          </div>
          <div class="footer-right">
            
          </div>
        </footer>
      </div>
    </div>

    
  
    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    
    <!-- JS Libraies -->
    <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index-0.js"></script>
    
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
  </html>

@endsection

