<style>
    @media all and (min-width: 992px)
    {
        .navbar .nav-item .dropdown-menu
        {
            display: none;
        }
        .navbar .nav-item:hover .nav-link
        {
        }
        .navbar .nav-item:hover .dropdown-menu
        {
            display: block;
        }
        .navbar .nav-item .dropdown-menu
        {
            margin-top:0;
        }
    }


    @-webkit-keyframes scale {
  0%   { transform: scale(0.5,0.5); }
  100% { transform: scale(1,1); }
}
@-moz-keyframes scale {
  0%   { transform: scale(0.5,0.5); }
  100% { transform: scale(1,1); }
}
@-o-keyframes scale {
  0%   { transform: scale(0.5,0.5); }
  100% { transform: scale(1,1); }
}
@keyframes scale {
  0%   { transform: scale(0.5,0.5); }
  100% { transform: scale(1,1); }
}

.navbarBody {
 animation-name: scale;
 animation-duration: 1s; 
 animation-fill-mode: forwards; 
}
</style>

<div class="container-fluid">
<div style="background-color:#9d0606">
<nav class="navbar navbar-expand-lg">
    {{-- <div class="container-fluid"> --}}
     <div class="collapse navbar-collapse" id="main_nav">
       <ul class="navbar-nav">
           <li class="nav-item active"><a class="nav-link navbarBody" style="color:rgb(255, 255, 255)" href="#"> LAMAN UTAMA </a></li>

           <li class="nav-item dropdown">
                <a class="nav-link navbarBody" style="color:rgb(255, 255, 255)" href="#" data-bs-toggle="dropdown">  MAKLUMAT KORPORAT  </a>
                <div class="dropdown-menu" style="box-shadow: 0 20px 20px 0 rgba(0,0,0,.2)">
                    <a class="dropdown-item" href="#">Pengenalan</a>
                    <a class="dropdown-item" href="#">Sejarah</a>
                    <a class="dropdown-item" href="#">Carta Organisasi</a>
                    {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Kementerian Pengajian Tinggi</a>
                </div>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link navbarBody" style="color:rgb(255, 255, 255)" href="#" data-bs-toggle="dropdown">  SOALAN LAZIM  </a>
                <div class="dropdown-menu" style="box-shadow: 0 20px 20px 0 rgba(0,0,0,.2)">
                    <a class="dropdown-item" href="#">SOALAN LAZIM 1</a>
                    <a class="dropdown-item" href="#">SOALAN LAZIM 2</a>
                    {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Kementerian Pengajian Tinggi</a>
                </div>
            </li>

           <li class="nav-item dropdown">
              <a class="nav-link navbarBody" style="color:rgb(255, 255, 255)" href="#" data-bs-toggle="dropdown">  HUBUNGI KAMI  </a>
               <div class="dropdown-menu" style="box-shadow: 0 20px 20px 0 rgba(0,0,0,.2)">
                <a class="dropdown-item" href="#">Direktori Bahagian Education Malaysia</a>
                <a class="dropdown-item" href="#">Direktori Education Malaysia</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Kementerian Pengajian Tinggi</a>
              </div>
           </li>
       </ul>
     </div> <!-- navbar-collapse.// -->
    {{-- </div> <!-- container-fluid.// --> --}}
   </nav>
</div>
</div>