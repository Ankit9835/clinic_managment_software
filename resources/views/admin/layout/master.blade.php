@include('admin.layout.header')
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
        @include('admin.layout.topbar')  

            <div class="page-wrap">
              @include('admin.layout.sidebar')    
                <div class="main-content">
                   @yield('admin-content')
                </div>

 @include('admin.layout.chat')   

@include('admin.layout.footer')
         