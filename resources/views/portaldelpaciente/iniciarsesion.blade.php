@extends('template/template')

@section('css')

            {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> --}}
            {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
<style>

/* .input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
} */
/* *{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
} */

/* #container{
  width: 800px;
  height: 500px;
  background: inherit;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -250px;
  margin-left: -400px;
  overflow: hidden;
} */

/* #container:before{
  content: "";
  background: inherit;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  box-shadow: inset 0 0 50px rgba(255,255,255, 0.3);
  filter: blur(8px);
} */
/* #back-btn{
  position: absolute;
  background: white;
  width: 100px;
  height: 100%;
} */
/* #form{
  position: absolute;
  right: 0;
} */
#sign-in, #sign-up{
  display: inline-block;
  text-align: center;
  position: relative;
}
#sign-in{
  width: 350px;
  height: 520px;
  box-shadow: inset 0 0 0 3000px rgba(165, 193, 245, 0.842);
  /* margin-right: -4px; */
}
#sign-up{
  width: 350px;
  height: 520px;
  box-shadow: inset 0 0 0 3000px rgba(165, 193, 245, 0.842);
}

#form-content{
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
}
input{
  background: 0;
  width: 200px;
  outline: 0;
  border: 0;
  border-bottom: 2px solid rgba(14, 13, 13, 0.103);
  margin: 15px 0;
  padding-bottom: 10px;
  font-size: 14px;
  font-weight: bold;
  color: rgba(4, 3, 75, 0.8);
}
input[type="submit"]{
  border: 0;
  border-radius: 8px;
  padding-bottom: 0;
  height: 60px;
  background: rgba(4, 3, 75, 0.8);
  color: white;
  cursor: pointer;
  transition: all 600ms ease-in-out;
}
::placeholder{
  color: rgb(15, 75, 153);
  font-size: 14px;
}
input[type="submit"]:hover{
  background: #C0392B;
}
span a{
  color: rgba(255,255,255, 0.8);
}

</style>
@endsection

@section('content')

<article class="container mx-auto p-0">
{{-- <div class="container"> --}}

    <div class="row justify-content-center p-1">
        <div class="col-md-4 col-sm-2 col-sm-offset-1">
            <div class="col-md-12">
                <h2 style="color: rgba(4, 3, 75, 0.8);font-size: .8em"><b>Si ya se registró, ingrese su email y contraseña</b></h2>
                <form id="sign-in"action="">
                    <div id="form-content">
                        <h2 style="color: rgba(4, 3, 75, 0.8);"><b>Ingresar</b></h2>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" size="30" required placeholder="Correo electronico"><br>
                        <input type="password" placeholder="Contraseña"><br>
                        <input type="submit" value="INGRESAR"><br>
                        <span><a href="#">Se olvido la contraseña?</a></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-sm-2 col-sm-offset-1">
            <div class="col-md-12">
                <h2 style="color: rgba(4, 3, 75, 0.8);font-size: .8em"><b>Para registrarse, complete los campos que aparecen a continuación</b></h2>
                <form id="sign-up" action="">
                    <div id="form-content">
                        <h2 style="color: rgba(4, 3, 75, 0.8);"><b>Registrarse</b></h2>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" size="30" required placeholder="Nombre y apellido"><br>
                        <input type="text" placeholder="Correo electronico"><br>
                        <input type="number" placeholder="Telefono"><br>
                        <input type="number" placeholder="D.N.I"><br>
                        <input type="password" placeholder="Contraseña"><br>
                        <input type="submit" value="REGISTRARSE"><br>
                        {{-- <span><a href="#">ya tiene una cuenta?</a></span> --}}
                    </div>
                </form>
            </div>    
        </div>
    </div>

        {{-- <div class="row justify-content-center">
            <div class="col-md-6">
               <div class="col-md-12">
                <form id="sign-in"action="">
                    <div id="form-content">
                    <input type="text" value="@AmJustSam"><br>
                    <input type="password" placeholder="your password"><br>
                    <input type="submit" value="SIGN IN"><br>
                    <span><a href="#">Forgot Password?</a></span>
                   </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6">
               <div class="col-md-12">
                <form id="sign-up" action="">
                    <div id="form-content">
                    <input type="text" value="@AmJustSam"><br>
                    <input type="password" placeholder="your password"><br>
                    <input type="submit" value="SIGN UP"><br>
                    <span><a href="#">Already have an account?</a></span>
                   </div>
                  </form>
               </div>
            </div>
          </div> --}}
    {{-- </div> --}}
</article>

@endsection

@section('js')

@endsection