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
                    <h3 class="title1 text-dark">Transactions History</h3>
                    </div>
                    <div>
    </div>                  <div>
    </div>                  <div class="mb-5 row">
                    <div class="col text-center card p-4 bg-light">
                        
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        
                                  <h4 class="pt-3 nav-item nav-link active " id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> Deposits History</h4>
                                </div>
                            </nav>
                            
                            <div class="px-3 py-3 tab-content px-sm-0" id="nav-tabContent">
        
                                
                                <div class="tab-pane fade show active bg-light card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                    <table id="UserTable" class="UserTable table table-hover text-dark"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Amount</th>
                                                    <th>Payment mode</th>
                                                    <th>Status</th> 
                                                    <th>Date created</th>
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            @foreach($deposit as $deposithistory)
                                            <tr>
                                                    
                                                  
                                                    <td>{{$deposithistory->amount}}</td>
                                                    <td>{{$deposithistory->payment_method}}</td>
                                                    @if($deposithistory->status=='0')
                                                    <td>pending</td>
                                                    @else <td>approved</td>
                                                    @endif
                                                    <td>{{$deposithistory->created_at}}</td>
                                                    

                                                </tr>
                                              @endforeach
                                             </tbody> 
                                        </table>
                                    </div>
                                </div>
        
    
                            
                      
           
            
            
            <div class="mb-5 row">
                    <div class="col text-center card p-4 bg-light">
                        
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        
                                  <h4 class="pt-3 nav-item nav-link active " id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> Withdrawals History</h4>
                                </div>
                            </nav>
                            
                            <div class="px-3 py-3 tab-content px-sm-0" id="nav-tabContent">
        
                                
                                <div class="tab-pane fade show active bg-light card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                    <table id="UserTable" class="UserTable table table-hover text-dark"> 
                                           <thead> 
                                                <tr> 
                                                    <th>Amount requested</th>
                                                    <th>Recieving mode</th>
                                                    <th>Status</th> 
                                                    <th>Date created</th>
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            @foreach($withdrawal as $withdrawalhistory)
                                            <tr>   
                                                    <td>${{$withdrawalhistory->amount}}</td>
                                                    <td>{{$withdrawalhistory->mode}}</td>
                                                   
                                                    @if($withdrawalhistory->status=='0')
                                                    <td style="color:red;">pending</td>
                                                    @else <td style="color:green;">approved</td>
                                                    @endif
                                                    <td>{{$withdrawalhistory->created_at}}</td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
        
        
        
        
                              
                                        </table>
                                    </div>
                                </div>
        
                        
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
                </div>
              </div>
            </div>
 

@include('dashboard.footer')