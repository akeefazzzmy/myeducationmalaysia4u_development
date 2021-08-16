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
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#infoModal">
                Butiran Lanjut
            </button>
            {{-- <a href="#" class="btn btn-danger">Butiran Lanjut</a> --}}
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
            <button type="button" class="btn btn-danger buttonMaklumatNegara" data-toggle="modal" data-target="#negaraModal">
              Butiran Lanjut
            </button>
            {{-- <a href="{{ url('list-em') }}" class="btn btn-danger">Butiran Lanjut</a> --}}
          </div>
          <!-- Button trigger modal
          <div class="card-footer">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#negaraModal">
                Butiran Lanjut
              </button>-->
            {{-- <a href="#" class="btn btn-danger">Butiran Lanjut</a>
          </div>--}}
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="img-fluid" src="{{url('/storage/images/hubungi.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Hubungi</h4>
            <p class="card-text">Maklumat contact akan dipaparkan di sini</p>
          </div>
            <!-- Button trigger modal -->
          <div class="card-footer">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#contactModal">
                Butiran Lanjut
              </button>
            {{-- <a href="#" class="btn btn-danger">Butiran Lanjut</a> --}}
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img  class="img-fluid" src="{{url('/storage/images/notice.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Hebahan Terkini</h4>
            <p class="card-text">Maklumat mengenai hebahan terkini(hebahan umum)</p>
          </div>
         <!-- Button trigger modal -->
         <div class="card-footer">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newsModal">
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
          Butiran lanjut mengenai maklumat sistem
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  {{--------------------------------------------------- MODAL Maklumat Negara ---------------------------------------------------}}

  <div class="modal fade" id="negaraModal" tabindex="-1" role="dialog" aria-labelledby="negaraModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="negaraModalTitle">Senarai Education Malaysia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <div class="container">
              <label>Education Malaysia</label>
              <select class="form-control em">
                  <option selected disabled></option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="container">
              <label>Negara di bawah liputan</label>
              <p class="negaraLiputan"><p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------- --}}
  
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
          Butiran-butiran lanjut mengenai contacts
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
          Butiran-butiran tentang hebahan terkini (hebahan umum)
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>

$('.em').on('change', function()
{
  var em = $('.em').val();
  $('.negaraLiputan').empty();  
  $.get( '{{route("welcome.populateEM")}}', {'kodEM':em}, function(list)
  {
    $.each(list.liputan, function()
    {
      console.log(this.negara.Keterangan);
      var namaNegara = this.negara.Keterangan;      
      for(var i = 1; i <=namaNegara; i++)
      {
        namaNegara.push(i);
      }      
      var p = '<p>'+namaNegara+'</p>';
      $('.negaraLiputan').append(p);
    });
  });
});

</script>
