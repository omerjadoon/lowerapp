@extends('user.buyer.layouts.app',['title'=>'Change Password','request'=>'setting'])
@push('css')
<style type="text/css">
    </style>
    @endpush
    @section('content')
    <section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
          <!-- Row Start -->
          <div class="row">
          @include('user.buyer.pages.sidebar',['link'=>'dashboard'])
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
              <!-- Recently Favorited -->
              <div class="widget dashboard-container my-adslist">
                <h3 class="widget-header">My Dashboard</h3>
               
      
              </div>
      
              
      
            </div>
          </div>
          <!-- Row End -->
        </div>
        <!-- Container End -->
      </section>
    @endsection
    @push('js')
<script type="text/javascript">

</script>
    
@endpush
    