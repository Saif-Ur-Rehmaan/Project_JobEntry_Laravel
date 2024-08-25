 <!-- Header End -->
 <div class="container-xxl py-5 bg-dark page-header mb-5">
     <div class="container my-5 pt-5 pb-4">
         <h1 class="display-3 text-white mb-3 animated slideInDown">{{$CData[count($CData)-1]}}</h1>
         <nav aria-label="breadcrumb">
             <ol class="breadcrumb text-uppercase">
                 @foreach ($CData as $Link)
                     <li class="breadcrumb-item text-white active" aria-current="page">{{$Link}}</li>
                 @endforeach                 
             </ol>
         </nav>
     </div>
 </div>
 <!-- Header End -->
