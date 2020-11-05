const mix = require('laravel-mix');

mix
.js('resources/js/app.js', 'public/dashboard')
// .sass('resources/sass/app.scss', 'public/css')
.combine([
    'public/dashboard/plugins/jquery/jquery.min.js',
    'public/dashboard/plugins/jquery-ui/jquery-ui.min.js',
    'public/dashboard/plugins/custom.js',
    'public/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js',
    // 'public/dashboard/plugins/chart.js/Chart.min.js',
    // 'public/dashboard/plugins/sparklines/sparkline.js',
    // 'public/dashboard/plugins/jqvmap/jquery.vmap.min.js',
    // 'public/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js',
    // 'public/dashboard/plugins/jquery-knob/jquery.knob.min.js',
    // 'public/dashboard/plugins/moment/moment.min.js',
    // 'public/dashboard/plugins/daterangepicker/daterangepicker.js',
    // 'public/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    // 'public/dashboard/plugins/summernote/summernote-bs4.min.js',
    // 'public/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'public/dashboard/dist/js/adminlte.js',
    // 'public/dashboard/dist/js/pages/dashboard.js'
],   'public/dashboard/script.js')
.combine([
    'public/dashboard/sans.css',
    'public/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'public/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'public/dashboard/plugins/jqvmap/jqvmap.min.css',
    'public/dashboard/dist/css/adminlte.min.css',
    'public/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'public/dashboard/plugins/daterangepicker/daterangepicker.css',
    'public/dashboard/plugins/summernote/summernote-bs4.css',
    'public/dashboard/pageLoader.css'
],   'public/dashboard/style.css');