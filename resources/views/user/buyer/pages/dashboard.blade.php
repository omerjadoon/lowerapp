@extends('user.buyer.layouts.app',['title'=>'My Dashboard','request'=>'setting'])
@push('css')
<style type="text/css">
.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
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
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-counter info">
                        <i class="fa fa-ticket"></i>
                        <span class="count-numbers">{{Auth::user()->buyerDetail->buyerhasmanyadrequest->count()}}</span>
                        <span class="count-name">Total Ads Offers</span>
                      </div>
                    </div>
                  <div class="col-md-12">
                    <div class="card-counter success">
                      <i class="fa fa-check"></i>
                      <span class="count-numbers">{{Auth::user()->buyerDetail->buyerhasmanyadrequest->where('status',1)->count()}}</span>
                      <span class="count-name">Offers Approved</span>
                    </div>
                  </div>
              
                 
              
                 
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-counter primary">
                      <i class="fa fa-bolt"></i>
                      <span class="count-numbers">{{Auth::user()->buyerDetail->buyerhasmanyadrequest->where('status',0)->count()}}</span>
                      <span class="count-name">Offers Pending</span>
                    </div>
                  </div>
              
                  <div class="col-md-12">
                    <div class="card-counter danger">
                      <i class="fa fa-remove"></i>
                      <span class="count-numbers">{{Auth::user()->buyerDetail->buyerhasmanyadrequest->where('status',2)->count()}}</span>
                      <span class="count-name">Offers Approved</span>
                    </div>
                  </div>
                </div>
              </div>
                
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
    