@include('dashboard.header')
<div class="main-panel bg-light">
            <div class="content bg-light">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    <h3 class="title1 text-dark">Transactions on your account</h3>
                    </div>
                    <div>
    </div>                  <div>
    </div>                  <div class="mb-5 row">
                    <div class="col text-center card p-4 bg-light">
                        
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        
                                  <h4 class="pt-3 nav-item nav-link active " id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> Investment History</h4>
    
                                </div>
                            </nav>
                            
                            <div class="px-3 py-3 tab-content px-sm-0" id="nav-tabContent">
        
                                
                                <div class="tab-pane fade show active bg-light card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                    <table id="UserTable" class="UserTable table table-hover text-dark"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Amount</th>
                                                    <th>Plan Name</th>
                                                     <th>Plan Percentage</th>
                                                     <th>Plan Duration</th>
                                                      <th>Plan Start</th>
                                                       <th>Plan End</th>
                                                    <th>Status</th> 
                                                    <th>Date created</th>
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            @foreach($investment as $investmenthistory)
                                            <tr>
                                                    
                                                  
                                                    <td>{{$investmenthistory->amount}}</td>
                                                    <td>{{$investmenthistory->plan_name}}</td> 
                                                    <td>{{$investmenthistory->plan_percentage}}</td>
                                                    <td>{{$investmenthistory->plan_duration}}</td>
                                                    <td>{{$investmenthistory->plan_start}}</td>
                                                    <td>{{$investmenthistory->plan_end}}</td>
                                                    <td>{{$investmenthistory->status}}</td>
                                                    <td>{{$investmenthistory->created_at}}</td>
                                                    

                                                </tr>
                                              @endforeach
                                             </tbody> 
                                        </table>
                                    </div>
                                </div>
        
                                

                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit MT4 MODAL modal -->
          
                </div>
              </div>
            </div>
 

@include('dashboard.footer')