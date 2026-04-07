@include('manager.header')
@include('manager.navbar')
<!-- Content wrapper start -->
<div class="content-wrapper">
    <!-- User Profile Card -->
    <div class="row gx-3">
        <div class="col-lg-4 col-md-6 col-12 mb-3">
            <div class="card card-cover rounded-2 h-100">
                <div class="contact-card p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">User Profile</h4>
                        <a href="{{route('clear.account',$userProfile->id)}}" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Clear Account
                        </a>
                    </div>
                    
                    <div class="mb-4">
                        <h5 class="mb-3">{{$userProfile->name}}</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Email:</span> 
                                <span>{{$userProfile->email}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Country:</span> 
                                <span>{{$userProfile->country}}</span>
                                 <span>{{$userProfile->id}}</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h6 class="mb-3">Financial Summary</h6>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Total Balance:</span>
                                <span class="fw-bold">{{$userProfile->currency}}{{$user_balance}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Total Profit:</span>
                                <span>{{$userProfile->currency}}{{$totalProfit}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Total Deposit:</span>
                                <span>{{$userProfile->currency}}{{$totalDeposit}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Total Withdrawals:</span>
                                <span>{{$userProfile->currency}}{{$totalWithdrawal}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Total Bonus:</span>
                                <span>{{$userProfile->currency}}{{$totalBonus}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="col-lg-8 col-md-6 col-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Deposit Button -->
                        <div class="col-md-6 col-12">
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                <i class="bi bi-plus-circle"></i> Add Deposit
                            </button>
                        </div>
                        
                        <!-- Referral Bonus Button -->
                        <div class="col-md-6 col-12">
                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2">
                                <i class="bi bi-gift"></i> Add Referral Bonus
                            </button>
                        </div>
                        
                        <!-- Top Up Profit Button -->
                        <div class="col-md-6 col-12">
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3">
                                <i class="bi bi-arrow-up"></i> Top Up Profit
                            </button>
                        </div>
                        
                        <!-- Debit Profit Button -->
                        <div class="col-md-6 col-12">
                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4">
                                <i class="bi bi-arrow-down"></i> Debit Profit
                            </button>
                        </div>
                        
                        <!-- Signal Strength Button -->
                        <div class="col-md-6 col-12">
                            <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter5">
                                <i class="bi bi-bar-chart"></i> Update Signal Strength
                            </button>
                        </div>
                        
                        <!-- Notification Button -->
                        <div class="col-md-6 col-12">
                            <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter6">
                                <i class="bi bi-bell"></i> Update Notification
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add User Deposit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/add-deposit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" placeholder="Enter Amount" required />
                        </div>
                        
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="payment_method" value="Bitcoin">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="deposit_date" class="form-control" required />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Transaction Id</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Deposit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Referral Bonus Modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add {{$userProfile->name}} Bonus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/add-referral')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" placeholder="Enter Amount" required />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Add Bonus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Top Up Profit Modal -->
    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Top Up {{$userProfile->name}} Profit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/add-profit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" placeholder="Enter Amount" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Top Up Profit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Debit Profit Modal -->
    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Debit {{$userProfile->name}} Total Profit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/debit-profit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" placeholder="Enter Amount" required />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Debit Balance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Signal Strength Modal -->
    <div class="modal fade" id="exampleModalCenter5" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Signal Strength</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('signal.strength',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Signal Strength (1-100)</label>
                            <input type="number" step="1" name="signal_strength" class="form-control" 
                                   value="{{$userProfile->signal_strength}}" min="1" max="100" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update Strength</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div class="modal fade" id="exampleModalCenter6" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update.notification',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Notification Message</label>
                            <textarea name="update_notification" class="form-control" rows="5">{{$userProfile->update_notification}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update Notification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Transaction History Tabs -->
    <div class="row gx-3 mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="transactionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit-tab-pane" type="button" role="tab">
                                Deposit History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="withdrawal-tab" data-bs-toggle="tab" data-bs-target="#withdrawal-tab-pane" type="button" role="tab">
                                Withdrawal History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="investment-tab" data-bs-toggle="tab" data-bs-target="#investment-tab-pane" type="button" role="tab">
                                Investment History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="earning-tab" data-bs-toggle="tab" data-bs-target="#earning-tab-pane" type="button" role="tab">
                                Earning History
                            </button>
                        </li>
                    </ul>
                </div>
                
                <div class="card-body">
                    <div class="tab-content" id="transactionTabsContent">
                        <!-- Deposit History Tab -->
                        <div class="tab-pane fade show active" id="deposit-tab-pane" role="tabpanel" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Proof</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deposit as $deposit)
                                        <tr>
                                            <td>{{$deposit->payment_method}}</td>
                                            <td>${{number_format($deposit->amount, 2)}}</td>
                                            <td>{{$deposit->wallet_id}}</td>
                                            <td>
                                                <img src="{{asset('uploads/deposits/'.$deposit->image)}}" width="50" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal-{{$deposit->id}}">
                                                
                                                <!-- Image Preview Modal -->
                                                <div class="modal fade" id="imageModal-{{$deposit->id}}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Payment Proof</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{asset('uploads/deposits/'.$deposit->image)}}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($deposit->status == '1')
                                                <span class="badge bg-success">Completed</span>
                                                @elseif($deposit->status == '0')
                                                <span class="badge bg-warning">Pending</span>
                                                @elseif($deposit->status == '2')
                                                <span class="badge bg-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('D, M j, Y g:i A') }}</td>
                                            <td class="d-flex gap-1">
                                                <form action="{{url('approve-deposit/'.$deposit->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                    <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                    <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                    <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                    <input type="hidden" name="payment_method" value="{{$deposit->payment_method}}">
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                                
                                                <form action="{{url('decline-deposit/'.$deposit->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="2">
                                                    <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                    <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                    <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                    <input type="hidden" name="payment_method" value="{{$deposit->payment_method}}">
                                                    <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Withdrawal History Tab -->
                        <div class="tab-pane fade" id="withdrawal-tab-pane" role="tabpanel" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Wallet Address</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdrawal as $withdrawal)
                                        <tr>
                                            <td>{{$withdrawal->transaction_id}}</td>
                                            <td>${{number_format($withdrawal->amount, 2)}}</td>
                                            <td class="text-truncate" style="max-width: 150px;">{{$withdrawal->wallet_address}}</td>
                                            <td>
                                                @if ($withdrawal->status == '1')
                                                <span class="badge bg-success">Completed</span>
                                                @elseif($withdrawal->status == '0')
                                                <span class="badge bg-warning">Pending</span>
                                                @elseif($withdrawal->status == '2')
                                                <span class="badge bg-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->format('D, M j, Y g:i A') }}</td>
                                            <td class="d-flex gap-1">
                                                <form action="{{url('approve-withdrawal/'.$withdrawal->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                    <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                    <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                    <input type="hidden" name="amount" value="{{$withdrawal->amount}}">
                                                    <input type="hidden" name="payment_method" value="{{$withdrawal->withdrawal_method}}">
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                                
                                                <form action="{{url('decline-withdrawal/'.$withdrawal->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="2">
                                                    <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                    <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                    <input type="hidden" name="amount" value="{{$withdrawal->amount}}">
                                                    <input type="hidden" name="payment_method" value="{{$withdrawal->withdrawal_method}}">
                                                    <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Investment History Tab -->
                        <div class="tab-pane fade" id="investment-tab-pane" role="tabpanel" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Amount</th>
                                            <th>Duration</th>
                                            <th>Percentage</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                             <th>Actions</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($investment as $invest)
                                        <tr>
                                            <td>{{$invest->plan_name}}</td>
                                            <td>${{number_format($invest->amount, 2, '.', ',')}}</td>
                                            <td>{{$invest->plan_duration}}</td>
                                            <td>{{$invest->plan_percentage}}%</td>
                                            <td>{{$invest->plan_start}}</td>
                                            <td>{{$invest->plan_end}}</td>
                                            <td>
                                                <span class="badge bg-{{$invest->status == 'active' ? 'success' : 'secondary'}}">
                                                    {{$invest->status}}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($invest->created_at)->format('D, M j, Y g:i A') }}</td>
                                            
                                             <td class="d-flex gap-1">

                                                  <a href="{{route('clear.plan',$userProfile->id)}}" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Clear Plan
                        </a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Earning History Tab -->
                        <div class="tab-pane fade" id="earning-tab-pane" role="tabpanel" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($earning as $earning)
                                        <tr>
                                            <td>{{$earning->transaction_id}}</td>
                                            <td>${{number_format($earning->amount, 2, '.', ',')}}</td>
                                            <td class="text-truncate" style="max-width: 200px;">{{$earning->description}}</td>
                                            <td>{{ \Carbon\Carbon::parse($earning->created_at)->format('D, M j, Y g:i A') }}</td>
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
<!-- Content wrapper scroll end -->

<style>
    .contact-card .list-group-item {
        padding: 0.75rem 1rem;
    }
    .contact-card .list-group-item span {
        font-weight: 500;
    }
    .img-thumbnail {
        cursor: pointer;
        transition: transform 0.2s;
    }
    .img-thumbnail:hover {
        transform: scale(1.05);
    }
    .nav-tabs .nav-link {
        font-weight: 500;
    }
    @media (max-width: 768px) {
        .d-flex.gap-1 {
            flex-direction: column;
            gap: 0.5rem !important;
        }
        .d-flex.gap-1 .btn {
            width: 100%;
        }
    }
</style>

<script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>



		@include('manager.footer')