<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
    <!-- Recently Favorited -->
    <div class="widget dashboard-container my-adslist">
      <h3 class="widget-header">{{$icon}} Ads</h3>
      <table id="table_id" class="table table-responsive product-dashboard-table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Ad Title</th>
            <th class="text-center">Category</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
       <tbody>
           @foreach ($addetail as $key=>$item)
               
          
          <tr>

              <td class="product-thumb">
                <img width="80px" height="auto" src="{{asset($item->belongtoads->cover_file_path)}}" alt="image description"></td>
              <td class="product-details">
                <h3 class="title">{{$item->belongtoads->title}}</h3>
                <span class="location"><strong>Offer Price:</strong> {{number_format($item->offer_price)}}</span>
                <span class="add-id"><strong>Requested ID:</strong> {{$item->ad_u_id}}</span>
                <span><strong>Requested on: </strong><time> {{$item->created_at->format('d M,Y')}}</time> </span>
               
                <span class="location"><strong>Seller Name:</strong> {{$item->belongtoads->belongtoseller->f_name}}</span>
               
              </td>
              <td class="product-category"><span class="categories">{{$item->belongtoads->belongtocategory->name}}</span></td>
              <td class="action" data-title="Action">
                <div class="">
                  <ul class="list-inline justify-content-center">
                    <li class="list-inline-item">
                      <a href="{{route('adsdesc',[$item->belongtoads->ad_slug])}}" data-toggle="tooltip" data-placement="top" title="view" class="view" href="category.html">
                        <i class="fa fa-eye"></i>
                      </a>
                    </li>
                  
                    <li class="list-inline-item">
                      <a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="">
                        <i class="fa fa-trash"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
       </tbody>
      </table>

    </div>

  

  </div>