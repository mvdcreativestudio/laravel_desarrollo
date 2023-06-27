@extends('admin.layouts.master')


@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Panel de administración</h1>
        </div>
        

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total de pedidos</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalOrders }}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Ingresos totales</h4>
                    </div>
                    <div class="card-body">
                      {{$settings->currency_icon}}{{ $totalOrdersAmount }}
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pedidos hoy</h4>
                    </div>
                    <div class="card-body">
                      {{ $todaysOrder }}
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Ingresos hoy</h4>
                    </div>
                    <div class="card-body">
                        {{$settings->currency_icon}}{{ $todaysEarnings }}
                    </div>
                  </div>
                </div>  
            </div>    


            <div class="col-12">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Estadísticas de venta</h4>
                      <div class="card-header-action">
                        <div class="btn-group">
                          <a href="#" id="week-filter" class="btn btn-primary active">Semana</a>
                          <a href="#" id="month-filter" class="btn">Mes</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="dailySales" height="70" ></canvas>
                      <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted">
                                @if (is_numeric($todaysEarnings) && is_numeric($yesterdayEarnings))
                                    @if ($todaysEarnings > $yesterdayEarnings)
                                        <span class="text-primary"> 
                                            <i class="fas fa-caret-up"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{$todaysEarnings - $yesterdayEarnings}}
                                    @elseif ($todaysEarnings < $yesterdayEarnings)
                                        <span class="text-danger">
                                            <i class="fas fa-caret-down"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{abs($todaysEarnings - $yesterdayEarnings)}}
                                    @else 
                                        <span class="text-primary">
                                            <i class="fas fa-equals"></i>
                                        </span>
                                    @endif
                                @endif   
                            </span>
                            <div class="detail-value">{{$settings->currency_icon}}{{ $todaysEarnings }}</div>
                            <div class="detail-name">Ventas de hoy</div>
                        </div>

                        <div class="statistic-details-item">
                            <span class="text-muted">
                                @if (is_numeric($weekEarnings) && is_numeric($lastWeekEarnings))
                                    @if ($weekEarnings > $lastWeekEarnings)
                                        <span class="text-primary"> 
                                            <i class="fas fa-caret-up"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{$weekEarnings - $lastWeekEarnings}}
                                    @elseif ($weekEarnings < $lastWeekEarnings)
                                        <span class="text-danger">
                                            <i class="fas fa-caret-down"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{abs($weekEarnings - $lastWeekEarnings)}}
                                    @else 
                                        <span class="text-primary">
                                            <i class="fas fa-equals"></i>
                                        </span>
                                    @endif
                                @endif   
                            </span>
                            <div class="detail-value">{{$settings->currency_icon}}{{$weekEarnings}}</div>
                          <div class="detail-name">Ventas de esta semana</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted">
                                @if (is_numeric($monthEarnings) && is_numeric($lastMonthEarnings))
                                    @if ($monthEarnings > $lastMonthEarnings)
                                        <span class="text-primary"> 
                                            <i class="fas fa-caret-up"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{$monthEarnings - $lastMonthEarnings}}
                                    @elseif ($monthEarnings < $lastMonthEarnings)
                                        <span class="text-danger">
                                            <i class="fas fa-caret-down"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{abs($monthEarnings - $lastMonthEarnings)}}
                                    @else 
                                        <span class="text-primary">
                                            <i class="fas fa-equals"></i>
                                        </span>
                                    @endif
                                @endif   
                            </span>
                          <div class="detail-value">{{$settings->currency_icon}}{{$monthEarnings}}</div>
                          <div class="detail-name">Ventas este mes</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted">
                                @if (is_numeric($yearEarnings) && is_numeric($lastYearEarnings))
                                    @if ($yearEarnings > $lastYearEarnings)
                                        <span class="text-primary"> 
                                            <i class="fas fa-caret-up"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{$yearEarnings - $lastYearEarnings}}
                                    @elseif ($yearEarnings < $lastYearEarnings)
                                        <span class="text-danger">
                                            <i class="fas fa-caret-down"></i>
                                        </span>
                                        {{$settings->currency_icon}}{{abs($yearEarnings - $lastYearEarnings)}}
                                    @else 
                                        <span class="text-primary">
                                            <i class="fas fa-equals"></i>
                                        </span>
                                    @endif
                                @endif   
                            </span>
                          <div class="detail-value">{{$settings->currency_icon}}{{$yearEarnings}}</div>
                          <div class="detail-name">Ventas este año</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
            </div>
            
            
    </section>


 
@endsection

@push('scripts')
  <script>
    // Obtener el contexto del lienzo de la gráfica
    const ctx = document.getElementById('dailySales').getContext('2d');

    // Datos de las ventas por día (generados en el controlador)
    const salesData = {!! json_encode($salesData) !!};

    // Gráfica de ventas por día
    const dailySalesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['{{ Carbon\Carbon::today()->subDays(6)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(5)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(4)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(3)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(2)->format('j/n') }}', '{{ Carbon\Carbon::yesterday()->format('j/n') }}', '{{ Carbon\Carbon::today()->format('j/n') }}'],
            datasets: [{
                label: 'Ventas por día',
                data: salesData,
                borderWidth: 3,
                borderColor: 'rgba(104, 119, 239, 1)',
                backgroundColor: 'rgba(103, 119, 239, 1)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Manejar el evento click del botón "Month"
    const monthFilterBtn = document.getElementById('month-filter');
    monthFilterBtn.addEventListener('click', function() {
        // Datos hardcodeados para la gráfica de ventas mensuales
        const monthSalesData = [50, 80, 120, 90, 110, 70]; // Datos correspondientes a los meses
        const monthDateLabels = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic']; // Etiquetas de fecha correspondientes a los meses

        // Actualizar los datos y etiquetas de la gráfica
        dailySalesChart.data.labels = monthDateLabels;
        dailySalesChart.data.datasets[0].data = monthSalesData;
        dailySalesChart.update();

        // Alternar la clase "active" y "btn-primary"
        monthFilterBtn.classList.add('active');
        monthFilterBtn.classList.add('btn-primary');
        weekFilterBtn.classList.remove('active');
        weekFilterBtn.classList.remove('btn-primary');
    });

    // Manejar el evento click del botón "Week"
    const weekFilterBtn = document.getElementById('week-filter');
    weekFilterBtn.addEventListener('click', function() {
        // Actualizar los datos y etiquetas de la gráfica a los originales
        dailySalesChart.data.labels = ['{{ Carbon\Carbon::today()->subDays(6)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(5)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(4)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(3)->format('j/n') }}', '{{ Carbon\Carbon::today()->subDays(2)->format('j/n') }}', '{{ Carbon\Carbon::yesterday()->format('j/n') }}', '{{ Carbon\Carbon::today()->format('j/n') }}'];
        dailySalesChart.data.datasets[0].data = salesData;
        dailySalesChart.update();

        // Alternar la clase "active" y "btn-primary"
        weekFilterBtn.classList.add('active');
        weekFilterBtn.classList.add('btn-primary');
        monthFilterBtn.classList.remove('active');
        monthFilterBtn.classList.remove('btn-primary');
    });
  </script>


@endpush
