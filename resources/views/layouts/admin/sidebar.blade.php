<style>

#a-ku:hover{
    background-color :#e0f3ff;
    display:block;
    color:#343a40;
    border-radius:5px;

};
.merah{
  background-color: red;
}
</style>
<div class="app-sidebar sidebar-shadow merah" style="background: linear-gradient(180deg, #12C3CE 0%, #D7E8E9 100%); box-shadow: 10px 0px 10px rgba(0, 0, 0, 0.25);">
    <div class="app-header__logo">
        <img src="/images/logoa.png" alt="" width="170px">
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
            <center>
         
            <li class="app-sidebar__heading"> <img style="width: 100px; height: 100px; display: block; margin: auto;" class="rounded-circle" src="{{asset('assets/images/1.png')}}" alt=""></li>
            <li class="app-sidebar__heading">{{auth()->user()->name}}</li>

                <a  id="a-ku" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button type="button" class="btn">
                    Logout

                    </button>
                </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            </center>

                <li>
                    <a href="{{route('home')}}" class="mb-2">
                        <i class="metismenu-icon pe-7s-home"></i>
                        <b>Beranda</b>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.profil')}}" class="mb-2 {{(request()->is('admin/profil*')) ? 'mm-active' : ''}} ">
                        <i class="metismenu-icon pe-7s-user"></i>
                        <b>Profil</b>
                    </a>
                </li>

                <li>
                    <a href="#" class="mb-2">
                        <i class="metismenu-icon pe-7s-bookmarks"></i>
                        <b>Data Guru</b>
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                        <a href="">
                          <b>Tambah Data Guru</b>
                            <i class="metismenu-icon"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <b>Daftar Guru</b>
                            <i class="metismenu-icon pe-7s-monitor"></i>
                        </a>
                    </li>

                </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>    
<div class="app-main__outer">

