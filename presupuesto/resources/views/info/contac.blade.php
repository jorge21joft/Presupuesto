@extends('layouts.app')


@section('content')
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<style>
@keyframes a-efs {
  24% {
      animation-timing-function: cubic-bezier(.8,0,.6,1);
      opacity: .3;
  }

  52% {
      animation-timing-function: cubic-bezier(.63,0,.2,1);
      opacity: .03;
  }
  83% {
      animation-timing-function: cubic-bezier(.8,0,.84,1);
      opacity: .05;
  }
  100% {
      opacity: 0;
  }
}

@keyframes a-ef {
  24% {
    animation-timing-function: cubic-bezier(.8,0,.6,1);
    transform: scaleY(.42);
}

52% {
    animation-timing-function: cubic-bezier(.63,0,.2,1);
    transform: scaleY(.98);
}
83% {
    animation-timing-function: cubic-bezier(.8,0,.84,1);
    transform: scaleY(.96);
}
100% {
    transform: none;
}
}

@keyframes a-e {
  43% {
    animation-timing-function: cubic-bezier(.8,0,.2,1);
    transform: scale(.75);
}

60% {
    animation-timing-function: cubic-bezier(.8,0,1,1);
    transform: translateY(-16px);
}
77% {
    animation-timing-function: cubic-bezier(.16,0,.2,1);
    transform: none;
}
89% {
    animation-timing-function: cubic-bezier(.8,0,1,1);
    transform: translateY(-5px);
}
100% {
    transform: none;
}
}

@keyframes a-s {
  100% {
    opacity: 1;
}
}

@keyframes a-nt {
  100% {
    transform: none;
}
}

@keyframes a-h {
  100% {
    opacity: 0;
}
}


body {
    height: 100vh;
}
</style>
<script>
let logo = document.getElementById('logo')
let replay = document.getElementById('replay')

replay.onclick = e => {
  document.body.removeChild(logo)
  document.body.insertBefore(logo, replay)
}
</script>
  

        <div class="container jumbotron" style="margin-left:15%;margin-top:7%;font-family: 'Playfair Display', serif;">
        <h1 class="text-center"><b>Correos:</b></h1>
        <br>
        <div >
        <h1 style="">Erickpadillamendoza@gmail.com</h1>
        <h1 style="">penaedwin299@gmail.com</h1>
        <h1 style="">JorgeFlorez@proyectosfgk.com</h1>
        </div>
                         <!--gmail-->
                         <div id="logo" style="position: absolute;top:55%;left:70%;transform:translate(-40%, -40%);height:128px;margin:0 auto;width:176px">
        <div style="animation:a-s .5s .5s 1 linear forwards,a-e 1.75s .5s 1 cubic-bezier(0,0,.67,1) forwards;opacity:0;transform:scale(.68)">
        <div style="background:#ddd;border-radius:12px;box-shadow:0 15px 15px -15px rgba(0,0,0,.3);height:128px;left:0;overflow:hidden;position:absolute;top:0;transform:scale(1);width:176px">
        <div style="animation:a-nt .667s 1.5s 1 cubic-bezier(.4,0,.2,1) forwards;background:#d23f31;border-radius:50%;height:270px;left:88px;margin:-135px;position:absolute;top:25px;transform:scale(.5);width:270px">
        </div><div style="height:128px;left:20px;overflow:hidden;position:absolute;top:0;transform:scale(1);width:136px"><div style="background:#e1e1e1;height:128px;left:0;position:absolute;top:0;width:68px">
        <div style="animation:a-h .25s 1.25s 1 forwards;background:#eee;height:128px;left:0;opacity:1;position:absolute;top:0;width:68px"></div>
        </div><div style="background:#eee;height:100px;left:1px;position:absolute;top:56px;transform:scaleY(.73)rotate(135deg);width:200px">
        </div>
        </div>
        <div style="background:#bbb;height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
        <div style="background:#eee;border-radius:12px 12px 0 0;bottom:117px;height:12px;left:55px;position:absolute;transform:rotate(-135deg)scaleY(1.37);width:136px"></div><div style="background:#eee;height:96px;position:absolute;right:0;top:0;width:96px"></div><div style="box-shadow:inset 0 0 10px #888;height:155px;position:absolute;right:0;top:0;width:155px">
        </div>
        </div>
        <div style="animation:a-s .167s 1.283s 1 linear forwards,a-es 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:linear-gradient(0,rgba(38,38,38,0),rgba(38,38,38,.2));height:225px;left:0;opacity:0;position:absolute;top:0;transform:rotate(-43deg);transform-origin:0 13px;width:176px"></div></div
        ><div style="animation:a-ef 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;border-radius:12px;height:100px;left:0;overflow:hidden;position:absolute;top:0;transform:scaleY(1);transform-origin:top;width:176px"><div style="height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
        <div style="animation:a-s .167s 1.283s 1 linear forwards;box-shadow:-5px 0 12px rgba(0,0,0,.5);height:176px;left:0;opacity:0;position:absolute;top:0;width:176px;"></div>
        <div style="background:#ddd;height:176px;left:0;overflow:hidden;position:absolute;top:0;width:176px;"><div style="animation:a-nt .667s 1.25s 1 cubic-bezier(.4,0,.2,1) forwards;background:#db4437;border-radius:50%;bottom:41px;height:225px;left:41px;position:absolute;transform:scale(0);width:225px;"></div>
        <div style="background:#f1f1f1;height:128px;left:24px;position:absolute;top:24px;transform:rotate(90deg);width:128px;"></div>
        <div style="animation:a-efs 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:#fff;height:176px;opacity:0;transform:rotate(90deg);width:176px">
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <a href="{{ url('/home') }}"  type="button" class="btn btn-primary" style="margin-left: 90%; margin-top:0%">Volver</a>
        </div>
        <!--Telefono-Z>
    
@endsection