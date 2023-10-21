@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Installment Charges</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Installment Charges</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center"></h5>
            @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ url('admin/edit_installment_charges') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">For 3 Months ( in $ )</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="three_months_charge" value="{{ $installment_charges->three_months_charge }}" required>
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">For 2 Months ( in $ )</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="two_months_charge" value="{{ $installment_charges->two_months_charge }}" required>
                    </div>
                  </div>
                  <div class="text-center mb-5 mt-5">
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
               </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@include('backend.include.footer')