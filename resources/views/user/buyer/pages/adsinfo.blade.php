@extends('user.buyer.layouts.app',['title'=>$title,'request'=>'setting'])
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
          @include('user.buyer.pages.sidebar',['link'=>$link])
        @include('user.buyer.pages.table',['icon'=>$icon,'addetail'=>$addetail])
          </div>
          <!-- Row End -->
        </div>
        <!-- Container End -->
      </section>
    @endsection
    @push('js')
<script type="text/javascript">
$('#table_id').DataTable();
</script>
    
@endpush
    