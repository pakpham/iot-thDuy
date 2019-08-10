<div class="row">
 <div class="col-lg-12">
   <div class="card">  
     <div class="card-body">
      <h4 class="box-title">Biểu đồ dữ liệu trong ngày </h4>
     </div>

     <div class="row"> 
       <div class="col-lg-6">
         <div class="card-header">Cảm biến 1</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-1" class="traffic-chart"></div>
         </div>
       </div>

       <div class="col-lg-6">
         <div class="card-header">Cảm biến 2</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-2" class="traffic-chart"></div>
         </div>
       </div>

       <div class="col-lg-6">
         <div class="card-header">Cảm biến 3</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-3" class="traffic-chart"></div>
         </div>
       </div>

       <div class="col-lg-6">
         <div class="card-header">Cảm biến 4</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-4" class="traffic-chart"></div>
         </div>
       </div>
     </div> <!-- /.row --> 
     <div class="card-body"></div>
   </div> 
 </div><!-- /# column -->
</div>



<div class="clearfix"></div>
<div class="orders">
 <div class="row">
   <div class="col-xl-8"> 
     <div class="card">
       <div class="card-body">
         <h4 class="box-title">Cập nhật gần đây nhất </h4>
       </div>
       <div class="card-body--">
         <div class="table-stats order-table ov-h">
            @if(isset($last_data))
           <table class="table ">
             <thead>
               <tr>
                 <th>Cảm biến</th>
                 <th>{{$last_data[4]->created_at}}</th>
                 <th>{{$last_data[3]->created_at}}</th>
                 <th>{{$last_data[2]->created_at}}</th>
                 <th>{{$last_data[1]->created_at}}</th>
                 <th>{{$last_data[0]->created_at}}</th>
                 <th>Đơn vị</th>
               </tr>
             </thead>
             <tbody> 
               <tr class=" pb-0">
                <td class="number">1</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss1}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

               <tr class=" pb-0">
                <td class="number">2</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss2}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

               <tr class=" pb-0">
                <td class="number">3</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss3}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

               <tr class=" pb-0">
                <td class="number">4</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss4}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

             </tbody>
           </table>
           @endif
         </div> <!-- /.table-stats -->
       </div>
     </div> <!-- /.card -->
   </div>

   <div class="col-xl-4"> 
     <div class="card">
       <div class="card-body">
         <h4 class="box-title">Giá trị trung bình  </h4>
       </div>
       <div class="card-body--">
         <div class="table-stats order-table ov-h">
          @if(isset($data_avg))
           <table class="table ">
             <thead>
               <tr>
                 <th>SS</th>
                 <th>Today</th>
                 <th>1</th>
                 <th>2</th>
                 <th style="text-align: left;">3</th>
               </tr>
             </thead>
             <tbody> 
               <tr class=" pb-0">
                <td class="number">1</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss1}}</td>
                @endforeach
                
               </tr>

               <tr class=" pb-0">
                <td class="number">2</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss2}}</td>
                @endforeach
                
               </tr>

               <tr class=" pb-0">
                <td class="number">3</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss3}}</td>
                @endforeach
                  
               </tr>

               <tr class=" pb-0"> 
                <td class="number">4</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss4}}</td>
                @endforeach
               </tr>

             </tbody>
           </table>
          @endif
         </div> <!-- /.table-stats -->
       </div>
     </div> <!-- /.card -->
   </div>
</div> 
</div>
