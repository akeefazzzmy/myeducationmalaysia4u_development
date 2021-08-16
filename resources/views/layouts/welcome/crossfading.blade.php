  <!-- Page Content -->
  <div class="container">

    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img  class="img-fluid" src="{{url('/storage/images/sistem.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Maklumat Sistem</h4>
            <p class="card-text">Maklumat berkaitan Sistem</p>
          </div>
          <!-- Button trigger modal -->
          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoModal">
                Butiran Lanjut MS
            </button>
            {{-- <a href="#" class="btn btn-primary">Butiran Lanjut</a> --}}
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="img-fluid" src="{{url('/storage/images/map.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Maklumat Negara</h4>
            <p class="card-text">Maklumat berkaitan negara</p>
          </div>
         <div class="card-footer">
            <a href="{{ url('list-em') }}" class="btn btn-primary">Butiran Lanjut</a>
          </div>
          <!-- Button trigger modal
          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#negaraModal">
                Butiran Lanjut
              </button>-->
            {{-- <a href="#" class="btn btn-primary">Butiran Lanjut</a>
          </div>--}}
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="img-fluid" src="{{url('/storage/images/hubungi.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Hubungi</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
            <!-- Button trigger modal -->
          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactModal">
                Butiran Lanjut
              </button>
            {{-- <a href="#" class="btn btn-primary">Butiran Lanjut</a> --}}
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img  class="img-fluid" src="{{url('/storage/images/notice.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Hebahan Terkini</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
         <!-- Button trigger modal -->
         <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal">
                Butiran Lanjut
              </button>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  <!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalTitle">Maklumat Sistem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Modal untuk Maklumat Sistem
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalTitle">Hubungi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newsModalTitle">Hebahan Terkini</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
