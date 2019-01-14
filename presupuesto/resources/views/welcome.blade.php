
       
@extends('layouts.app')


@section('content')
<style>
    .presu{
    
    font-size: 72px;  
    background: -webkit-linear-gradient(left top, red, yellow);
    background: linear-gradient(to bottom right,#21E1BD , gray);
    -webkit-background-clip: text;  
    -webkit-text-fill-color: transparent;  

    }           
html, body {
    background-image: url(http://abcpalem.com/wp-content/uploads/2016/09/2.jpg) ;
    color: white;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}

.full-height {
    height: 100vh;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}

.position-ref {
    position: relative;
}

.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.content {
    text-align: center;
}

.title {
    font-size: 84px;
}

.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

.m-b-md {
    margin-bottom: 30px;
}
</style>
<br><br><br><br><br><br><br>
<a  href="{{ url('/home') }}">
<img style="height: 120px; margin-top: 7%; margin-left: 39%" src="https://fundacionjborja.org/wp-content/themes/theme_fundacion/images/logo-fundacion-borja-kriete.png" alt="" class="navbar-brand" >
</a>
@endsection
        