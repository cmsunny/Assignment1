<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- <CSS Add> --}}
        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/ionicons.css') }}" rel="stylesheet" type="text/css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        </head>
        <body class="skin-black">
        
            

           <!-- include header -->
           @auth
                @include('layouts.partition.header')
           @endauth 

            <!-- include sidebar -->
            <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 607px;">
                @auth
                @include('layouts.partition.sidebar')
                @endauth
                <aside class="right-side">                
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Blank page
                            <small>it all starts here</small>
                        </h1>
                        
                    </section>
    
                    <!-- Main content -->
                    <section class="content">
                     
                        @yield('content')
                         {{-- modal --}}
                        
                    </section><!-- /.content -->
                </aside><!-- /.right-side -->
            </div>
            <div id="m_scroll_top" class="m-scroll-top">
                <i class="la la-arrow-up"></i>
            </div>
           
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
            <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
            <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
             <!-- jQuery 2.0.2 -->
            {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> --}}
            {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
            <!-- Bootstrap -->
            <script src="{{ asset('assets/Js/bootstrap.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('assets/Js/app.js') }}"></script>
            @stack('scripts')
        
    </body>
</html>
