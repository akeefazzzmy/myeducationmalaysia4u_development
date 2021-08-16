<style>
  /* @-webkit-keyframes fade {
  0%   { opacity: 0; }
  100% { opacity: 1; }
}
@-moz-keyframes fade {
  0%   { opacity: 0; }
  100% { opacity: 1; }
}
@-o-keyframes fade {
  0%   { opacity: 0; }
  100% { opacity: 1; }
}
@keyframes fade {
  0%   { opacity: 0; }
  100% { opacity: 1; }
} */
/* .pengumuman {
 animation-name: fade;
 animation-duration: 6s; 
 animation-fill-mode: forwards; 
} */

</style>

<div style="padding-top:3%; padding-bottom:1%; text-align: center" class="container-fluid">
<div style="padding-top:0%"class="container-fluid">
  <div class="row">
    <div class="col-8">
      {{-- <img src="{{url('/storage/images/myeducationmalaysia4u1.jpeg')}}" width="600px" height="150px" class="img-fluid"> --}}
      {{-- <img src="{{url('/storage/images/1.jpg')}}" width="600px" height="150px" class="img-fluid"> --}}
      @include('layouts.welcome.img-container3')
    </div>
    <div class="col-4" style="background-color:#ffffff">
      <div class="pengumuman w-100 p-4" style="background-color: 	#FFA500; border: 1px solid; padding: 10px; box-shadow: 5px 10px #888888; border-radius: none">
          {{-- <h1 style="color:rgb(0, 0, 0); text-align:left">Pengumuman</h1> --}}
          {{-- <div class="dropdown-divider"></div> --}}
          <marquee behavior="scroll" direction="up" scrollamount="3">
            <p style="color:rgb(0, 0, 0)">KENYATAAN MEDIA OPERASI KEMENTERIAN PENGAJIAN TINGGI (KPT) SEPANJANG TEMPOH PERINTAH KAWALAN PERGERAKAN (PKP)<br></p>            
            <p style="color:rgb(0, 0, 0)">Senarai Pejabat KPT Yang Beroperasi (dikemaskini pada 27 Mei 2021)<br></p>            
            <p style="color:rgb(0, 0, 0)">Senarai Pejabat KPT Yang Beroperasi Dalam Tempoh PKP 3.0<br></p>
            <p style="color:rgb(0, 0, 0)">Waktu Operasi Kaunter KPT Sepanjang Tempoh PKP<br></p>
            <p style="color:rgb(0, 0, 0)">Operasi Pejabat KPT Seluruh Negara 12 MEI 2021<br></p>
            <p style="color:rgb(0, 0, 0)">Penutupan Sementara Operasi KPT </p>
          </marquee>
          <div class="dropdown-divider"></div>
          <p style="text-align:center"><a href="#" style="color:rgb(0, 0, 0)">Lihat Semua >></a></p>
      </div>
    </div>
  </div>
</div>
</div>