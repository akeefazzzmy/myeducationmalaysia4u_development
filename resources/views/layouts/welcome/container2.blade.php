<div style="padding-top:3%; padding-bottom:1%; text-align: center">
<label><h4>MAKLUMAT TAMBAHAN</h4></label>
<!-- Page Content -->
  <div class="card">

    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img  class="img-fluid" src="{{url('/storage/images/sistem.jpg')}}" alt="">
          <div class="card-body">
            <h6 class="card-title"><b>{{ config('app.name') }}</b></h6>
            {{-- <p class="card-text">Maklumat berkaitan Sistem</p> --}}
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
            <h6 class="card-title"><b>Education Malaysia</b></h6>
            {{-- <p class="card-text">Maklumat berkaitan</p> --}}
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
            <h6 class="card-title"><b>Hubungi</b></h6>
            {{-- <p class="card-text">Maklumat contact akan dipaparkan di sini</p> --}}
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
            <h6 class="card-title"><b>Hebahan Umum</b></h6>
            {{-- <p class="card-text">Maklumat mengenai hebahan terkini(hebahan umum)</p> --}}
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
</div>


  <!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalTitle">{{ config('app.name') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p style="text-align:justify">{{ config('app.name') }} merupakan sebuah sistem untuk mengurus data-data pelajar Malaysia yang menyambung pengajian peringkat tinggi di luar negara</p>
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
          <h5 class="modal-title" id="negaraModalTitle">Education Malaysia</h5>
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
                  <option>EMA : Education Malaysia Australia</option>
                  <option>EMB : Education Malaysia Beijing</option>
                  <option>EMD : Education Malaysia Dubai</option>
                  <option>EMI : Education Malaysia Indonesia</option>
                  <option>EMJ : Education Malaysia Jordan</option>
                  <option>EML : Education Malaysia London</option>
                  <option>EMM : Education Malaysia Mesir</option>
                  <option>EMW : Education Malaysia Washington</option>
                  <option>EMC : Education Malaysia Chicago</option>
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
          <h5 class="modal-title" id="newsModalTitle">Hebahan Umum</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p style="text-align:justify">Lockdown penuh untuk Fasa Pertama di seluruh negara bermula 1 hingga 14 Jun 2021</p><br>
          <p style="text-align:justify">Pengoperasian Institusi Pendidikan Tinggi Semasa Tempoh Perintah Kawalan Pergerakan (1 Jun 2021 Hingga 14 Jun 2021) </p><br>
          <p style="text-align:justify">Pergerakan Pelajar Institusi Pendidikan Tinggi (IPT) Pulang Sempena Cuti Perayaan Aidilfitri 2021 </p><br>
          <p style="text-align:justify">Pelanjutan Tarikh Tutup Permohonan UPUOnline Kemasukan Ke Institusi Pendidikan Tinggi Awam Dan Institusi Latihan Kemahiran Awam Bagi Sesi Akademik 2021/2022 </p><br>
          <p style="text-align:justify">Program Kebolehpasaran Graduan Industri 4.0: Kolaborasi Bersama Kementerian Pengajian Tinggi Dan Malaysia Technology Development Corporation </p><br>
          <p style="text-align:right"><a href="#">Lihat Semua</a></p>
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
