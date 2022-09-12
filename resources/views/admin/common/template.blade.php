<!doctype html>
<html lang="en">
@include('admin.common.components.head')
<body>

<?php
//АУТЕНТИФИКАЦИЯ (ПОДКЛЮЧАЕТСЯ В WEB.PHP ЧЕРЕЗ AUTH::ROUTES())
?>

@include('admin.common.components.header')

<div id="admin">
    @yield('content')
</div>

@include('admin.common.components.scripts')
@include('admin.common.components.footer')

</body>
</html>


