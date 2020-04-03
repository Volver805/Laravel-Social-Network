@extends('layouts.register-layout')
    @section('content')
       <link rel="stylesheet" href="{{asset('css/register.css')}}">
        <div class="container">
            <p>Check your email for activiation link</p>
            <img src="../images/mails.png" alt="img not available" srcset="">
            <button onclick="redirect()">Home</button>
        </div>
 
        <script type='text/javascript'>
            const redirect = ()=> {
                window.location.replace("{{url('/home')}}");
            }   


        </script>
    @endsection