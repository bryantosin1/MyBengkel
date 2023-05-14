@extends('layouts.sidebar')

@section('role', 'Mekanik')

@section('list-menu')
<div class="flex items-center justify-center flex-col">
   <img class="h-32 w-32 rounded-full" src="{{asset('img/herta.jpg')}}">
   <div class="text-purple m-4 text-center">Jabatan : Mekanik Dealer Yamaha SIP BS</div>
</div>

   <li>
       <a href="dashboard" class="flex items-center p-3 mb-4 text-purple rounded-lg hover:bg-dark-purple hover:text-primary hover:font-semibold">
          <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 hover:text-primary transition duration-75  group-hover:text-primary " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          <span class="ml-3 ">Dashboard</span>
       </a>
    </li>
    <li>
       <a href="profilku" class="flex items-center p-3 mb-4 text-purple rounded-lg hover:bg-dark-purple hover:text-primary hover:font-semibold">
          <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 hover:text-primary transition duration-75  group-hover:text-primary " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
          <span class="flex-1 ml-3 ">Profilku</span>
       </a>
    </li>
    <li>
       <a href="antrian" class="flex items-center p-3 mb-4 text-purple rounded-lg hover:bg-dark-purple hover:text-primary hover:font-semibold">
           <svg aria-hidden="true" class="w-6 h-6 hover:text-primary transition duration-75  group-hover:text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
          <span class="flex-1 ml-3 ">Data Antrian</span>
       </a>
    </li>
    <li>
       <a href="servisku" class="flex items-center p-3 mb-4 text-purple rounded-lg hover:bg-dark-purple hover:text-primary hover:font-semibold">
          <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 hover:text-primary transition duration-75  group-hover:text-primary " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
          <span class="flex-1 ml-3 ">Servisku</span>
       </a>
    </li>
@endsection

@section('main')
    @yield('main-content')
@endsection