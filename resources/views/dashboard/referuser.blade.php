@include('dashboard.header')
<!-- content @s -->
<div class="main-panel bg-light">
  <div class="content bg-light">
      <div class="page-inner">
        <br>
        <br>
          <div class="mt-2 mb-4">
              <h3 class="title1 text-dark">Refer users to Zen-bottrd community</h3>
          </div>
                  
                              
          <div class="row">
              <div class="col-12 text-center card bg-light shadow-lg p-3 text-dark">
                  <strong>You can refer users by sharing your referral link:</strong><br>
                  <h4 style="color:green;">https://www.Zen-bottrd.com/ref/{{Auth::user()->email}}</h4> <br>
                  <h3 class="title1">
                  <h4>TOTAL REFFERRAL BONUS</h4><br>
                  <h4>${{$referral}}</h4>
                  </h3>
              </div>
          </div>
          <div class="row">
              <div class="col card p-3 shadow-lg bg-light">
                  <h2 class="title1 text-dark">Your Referrals.</h2>
                  <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                      <table class="table UserTable table-hover text-dark"> 
                          <thead> 
                              <tr> 
                              <th>ID</th>
                              <th>Username</th>
                              <th>Date</th>
                              </tr>
                          </thead> 
                          <tbody>
                          
                          </tbody> 
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
    @include('dashboard.footer')