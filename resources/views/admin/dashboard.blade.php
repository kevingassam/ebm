@extends('admin.fixe')
@section('titre',"Dashboard")

@section('body')
    <!--start main content-->
    <main class="page-content">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
            <div class="col">
                <div class="card radius-10 border-0 border-start border-primary border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">Total des articles (blog)</p>
                                <h4 class="mb-0 text-primary">{{ DB::table('blogs')->count() }}</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-primary text-white">
                                <i class="bi bi-book-half"></i>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4.5px;">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-0 border-start border-success border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">Total des projets</p>
                                <h4 class="mb-0 text-success">{{ DB::table('projets')->count() }}</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-house-add"></i>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4.5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%;"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-0 border-start border-danger border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">Total des services</p>
                                <h4 class="mb-0 text-danger">{{ DB::table('services')->count() }}</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-danger text-white">
                                <i class="bi bi-houses"></i>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4.5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->



        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header bg-transparent">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <h6 class="mb-0 fw-bold">
                        Statistiques des vistes ( {{ $year }} )
                      </h6>
                    </div>
                    <div class="dropdown ms-auto">
                      <input type="month" name="year" value="{{ $year }}" id="select_date" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                     <div id="chart1" data-values="@json($visitsPerMonth)"></div>
                </div>
              </div>
            </div>

         </div><!--end row-->

    </main>
    <!--end main content-->
@endsection

@section('scripts')
<script src="/admin/plugins/apex/apexcharts.min.js"></script>
<script src="/admin/js/index.js"></script>
<script>
    //select_date
    $("#select_date").change(function() {
        var date = $(this).val();
        var year = date.split('-')[0];
        window.location.href = '/dashboard?year=' + year;
    });
</script>
@endsection

