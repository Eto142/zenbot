@include('dashboard.header')
	<!-- Content wrapper scroll start -->
    <div class="content-wrapper-scroll">
       
        
                         

        
                                    <center><img src="logo2.png"  alt="city" width="250px" /></center>
                                    <div class="page-title d-none d-md-block">
                                        

                                <!-- Live updates start -->
                                <ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
                                    <li>
                                        <!-- <a href="javascript:void(0)">
                                            <i class="bi bi-envelope-paper text-red font-1x me-2"></i>
                                            <span>12 emails from David Michaiah.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="bi bi-bar-chart text-blue font-1x me-2"></i>
                                            <span>15 new features updated successfully.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="bi bi-folder-check text-yellow font-1x me-2"></i>
                                            <span>The media folder is created successfully.</span>
                                        </a> -->
                                    </li>
                                </ul>
                                <!-- Live updates end -->
                            </div>
                            <!-- Main header ends -->
        
        
        
        
                    <style>
            a {
                text-decoration: none;
                color: black;
            }
        
            a:visited {
                color: black;
            }
        
            .box::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                background-color: #F5F5F5;
                border-radius: 5px
            }
        
            .box::-webkit-scrollbar {
                width: 10px;
                background-color: #F5F5F5;
                border-radius: 5px
            }
        
            .box::-webkit-scrollbar-thumb {
                background-color: black;
                border: 2px solid black;
                border-radius: 5px
            }
        
            .icons {
                display: inline;
                float: right
            }
        
            .notification {
                padding-top: 25px;
                padding-right: 17px;
                position: relative;
                display: inline-block;
            }
        
            .number {
                height: 20px;
                width: 20px;
                background-color: #d63031;
                border-radius: 20px;
                color: white;
                text-align: center;
                position: absolute;
                top: 15px;
                left: 25px;
                padding: 1px;
                border-style: solid;
                border-width: 2px;
                font-size: smaller;
            }
        
            .number:empty {
                display: none;
            }
        
            .notBtn {
                transition: 0.5s;
                cursor: pointer;
                height: 50px;
            }
        
            .fas {
                font-size: 25pt;
                /*padding-bottom: 10px;*/
                color: black;
                margin-right: 40px;
                margin-left: 40px;
            }
        
            .box {
                /*width: 400px;*/
                width: 378px;
                height: 0px;
                border-radius: 10px;
                transition: 0.5s;
                position: absolute;
                overflow-y: scroll;
                padding: 0px;
                left: -270px;
                /*left: -300px;*/
                margin-top: 5px;
                background-color: #F4F4F4;
                -webkit-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
                box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
                cursor: context-menu;
            }
        
            .fas:hover {
                color: #d63031;
            }
        
            .notBtn:hover > .box {
                /*height: 60vh*/
                height: max-content;
            }
        
        
            .display {
                position: relative;
            }
        
            .cont {
                position: absolute;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: #F4F4F4;
            }
        
            .cont:empty {
                display: none;
            }
        
            .stick {
                text-align: center;
                display: block;
                font-size: 50pt;
                padding-top: 70px;
                padding-left: 80px
            }
        
            .stick:hover {
                color: black;
            }
        
            .cent {
                text-align: center;
                display: block;
            }
        
            .sec {
                padding: 25px 10px;
                background-color: #F4F4F4;
                transition: 0.5s;
            }
        
            .profCont {
                padding-left: 15px;
            }
        
            .profCont > img {
                max-width: 15%;
            }
        
            .profile {
                -webkit-clip-path: circle(50% at 50% 50%);
                clip-path: circle(50% at 50% 50%);
                width: 75px;
                float: left;
            }
        
            .txt {
                vertical-align: top;
                font-size: 1rem;
                padding: 5px 10px 0px 80px;
                color: black;
            }
        
            .sub {
                font-size: 1rem;
                color: grey;
            }
        
            .new {
                border-style: none none solid none;
                border-color: red;
            }
        
            .sec:hover {
                background-color: #BFBFBF;
            }
        
            .bell-notification {
                position: absolute;
                right: -2px;
                z-index: 100;
            }
        </style>
                            
                            <!-- Content wrapper start -->
                            <div class="content-wrapper">
                                
                                <!-- Row start -->
                                <div class="row gx-3">
        
                                    <div class="col-sm-12 col-12">
                                        <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    {
                    "symbols": [
                      {
                        "title": "S&P 500",
                        "proName": "INDEX:SPX"
                      },
                      {
                        "title": "Shanghai Composite",
                        "proName": "INDEX:XLY0"
                      },
                      {
                        "title": "EUR/USD",
                        "proName": "FX_IDC:EURUSD"
                      },
                      {
                        "title": "BTC/USD",
                        "proName": "BITFINEX:BTCUSD"
                      },
                      {
                        "title": "ETH/USD",
                        "proName": "BITFINEX:ETHUSD"
                      }
                    ],
                    "theme": "light",
                    "isTransparent": false,
                    "displayMode": "adaptive",
                    "locale": "en"
                    }
                </script>
            </div>

    <style>
        :root {
            --primary: #3a7bd5;
            --secondary: #00d2ff;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #fdbb2d;
            --info: #17a2b8;
            --dark: #1e293b;
            --light: #f8f9fa;
        }
        
        /*body {*/
        /*    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;*/
        /*    background-color: #f5f7fa;*/
        /*    color: #333;*/
        /*    overflow-x: hidden;*/
        /*}*/
        
        /* Notification Marquee */
        .notification-marquee {
            background: linear-gradient(90deg, rgba(58,123,213,0.1) 0%, rgba(0,210,255,0.1) 100%);
            border-left: 4px solid var(--primary);
            color: var(--primary);
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 0 8px 8px 0;
            overflow: hidden;
        }
        
        .marquee-content {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
            padding-left: 100%;
        }
        
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        
        /* Main Balance Card */
        .balance-card {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border: none;
            border-radius: 12px;
            color: white;
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.2);
            overflow: hidden;
            position: relative;
            margin-bottom: 25px;
        }
        
        .balance-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }
        
        .balance-card::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -30%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }
        
        .balance-amount {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            line-height: 1;
            margin-bottom: 5px;
        }
        
        .balance-change {
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
        }
        
        /* Stats Cards */
        .stat-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .stat-value {
            font-weight: 700;
            font-size: clamp(1.5rem, 2.5vw, 1.8rem);
            margin-bottom: 5px;
        }
        
        .stat-title {
            color: #6c757d;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        
        .stat-link {
            color: inherit;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            transition: all 0.2s;
        }
        
        .stat-link:hover {
            transform: translateX(3px);
        }
        
        /* Signal Strength */
        .signal-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }
        
        .signal-meter {
            height: 8px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin: 15px 0;
        }
        
        .signal-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 10px;
            width: {{Auth::user()->signal_strength}}%;
            transition: width 0.5s ease;
        }
        
        .signal-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: #6c757d;
        }
        
        .signal-status {
            background: rgba(58,123,213,0.05);
            border-radius: 8px;
            padding: 12px;
            margin-top: 15px;
        }
        
        .signal-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--primary);
            display: inline-block;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
        
        /* Quick Actions */
        .quick-action {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 10px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s;
            height: 100%;
            background: rgba(255,255,255,0.7);
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .quick-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: white;
        }
        
        .quick-action i {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .balance-card {
                text-align: center;
            }
            
            .wallet-icon-container {
                margin: 20px auto 0;
            }
            
            .stat-card {
                margin-bottom: 15px;
            }
        }
        
        /* Color Themes */
        .stat-withdraw {
            background: white;
            color: var(--danger);
        }
        .stat-withdraw .stat-icon {
            background: rgba(220,53,69,0.1);
            color: var(--danger);
        }
        
        .stat-deposit {
            background: white;
            color: var(--primary);
        }
        .stat-deposit .stat-icon {
            background: rgba(58,123,213,0.1);
            color: var(--primary);
        }
        
        .stat-bonus {
            background: white;
            color: #ff9500;
        }
        .stat-bonus .stat-icon {
            background: rgba(255,149,0,0.1);
            color: #ff9500;
        }
        
        .stat-profit {
            background: white;
            color: var(--success);
        }
        .stat-profit .stat-icon {
            background: rgba(40,167,69,0.1);
            color: var(--success);
        }
        
        .btn-signal {
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .btn-signal-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
        }
        
        .btn-signal-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
    </style>

    <div class="container py-4">
        <!-- Notification Marquee -->
        <div class="notification-marquee">
            <div class="marquee-content">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>ALERT:</strong> {{Auth::user()->update_notification}} • 

            </div>
        </div>
        
        <!-- Enhanced Balance Card -->
<div class="balance-card p-3 p-md-4">
    <div class="row align-items-center g-3">
        <!-- Left Column - User Info & Balance -->
        <div class="col-md-7 col-lg-8">
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-person-check-fill me-2 fs-4"></i>
                <h2 class="welcome-text mb-0 fs-5 fs-md-4">Welcome back, {{Auth::user()->name}}</h2>
            </div>
            
            <p class="text-white-50 mb-2 mb-md-3 small">Last login: {{now()->format('M j, Y \a\t g:i A')}}</p>
            
            <div class="d-flex align-items-baseline flex-wrap">
                <h1 class="balance-amount mb-0">${{number_format($user_balance, 2)}}</h1>
            </div>
            <p class="text-white-50 mb-3 small">Total account balance</p>
        </div>
        
        <!-- Right Column - Wallet Icon & Actions -->
        <div class="col-md-5 col-lg-4">
            <div class="d-flex flex-column align-items-center align-items-md-end h-100">
                <!-- Wallet Icon (Hidden on smallest screens) -->
                <div class="wallet-icon-container d-none d-sm-flex align-items-center justify-content-center mb-2 mb-md-3">
                    <i class="bi bi-wallet2 fs-1"></i>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                    <a href="{{url('deposit')}}" class="btn btn-light btn-sm px-3 py-2 d-flex align-items-center">
                        <i class="bi bi-plus-lg me-1"></i>
                        <span>Deposit</span>
                    </a>
                    <a href="{{url('withdrawals')}}" class="btn btn-outline-light btn-sm px-3 py-2 d-flex align-items-center">
                        <i class="bi bi-arrow-up-right me-1"></i>
                        <span>Withdraw</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

        
        <!-- Stats Grid -->
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card stat-withdraw p-4">
                    <div class="stat-icon">
                        <i class="bi bi-currency-exchange"></i>
                    </div>
                    <h3 class="stat-value">${{number_format($withdrawal, 2)}}</h3>
                    <h6 class="stat-title">Total Withdrawals</h6>
                    <a href="{{url('accounthistory')}}" class="stat-link">
                        View history <i class="bi bi-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card stat-deposit p-4">
                    <div class="stat-icon">
                        <i class="bi bi-bank2"></i>
                    </div>
                    <h3 class="stat-value">${{number_format($deposit, 2)}}</h3>
                    <h6 class="stat-title">Total Deposits</h6>
                    <a href="{{url('deposit')}}" class="stat-link">
                        Deposit now <i class="bi bi-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card stat-bonus p-4">
                    <div class="stat-icon">
                        <i class="bi bi-gift-fill"></i>
                    </div>
                    <h3 class="stat-value">${{number_format($referral, 2)}}</h3>
                    <h6 class="stat-title">Bonus</h6>
                   
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card stat-profit p-4">
                    <div class="stat-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h3 class="stat-value">${{number_format($profit, 2)}}</h3>
                    <h6 class="stat-title">Total Profit</h6>
                   
                </div>
            </div>
        </div>
        
        <!-- Signal Strength -->
        <div class="signal-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">
                    <i class="bi bi-activity me-2"></i>Trading Signal Strength
                </h4>
                <span class="badge bg-primary bg-opacity-10 text-primary">
                    {{Auth::user()->signal_strength}}% Accuracy
                </span>
            </div>
            
            <div class="signal-meter">
                <div class="signal-bar"></div>
            </div>
            
            <div class="signal-labels">
                <span>Weak</span>
                <span>Moderate</span>
                <span>Strong</span>
                <span>Optimal</span>
            </div>
            
            <div class="signal-status mt-3">
                <p class="mb-0">
                    <span class="signal-indicator"></span>
                    @if(Auth::user()->signal_strength >= 80)
                        <strong>Excellent signals detected:</strong> High probability trading opportunities available
                    @elseif(Auth::user()->signal_strength >= 50)
                        <strong>Moderate signal strength:</strong> Potential trading opportunities identified
                    @else
                        <strong>Low signal strength:</strong> Limited trading opportunities at this time
                    @endif
                </p>
            </div>
            
           
        
        <!-- Quick Actions -->
        <div class="row g-3 mt-2">
            <div class="col-6 col-md-3">
                <a href="{{url('deposit')}}" class="quick-action text-primary">
                    <i class="bi bi-plus-circle-dotted"></i>
                    <span>Deposit</span>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{url('withdrawals')}}" class="quick-action text-danger">
                    <i class="bi bi-arrow-up-circle"></i>
                    <span>Withdraw</span>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{url('buy-plan')}}" class="quick-action text-success">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>Trade Now</span>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="quick-action text-info">
                    <i class="bi bi-headset"></i>
                    <span>Live Support</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Make marquee pause on hover
        document.querySelector('.marquee-content').addEventListener('mouseover', function() {
            this.style.animationPlayState = 'paused';
        });
        
        document.querySelector('.marquee-content').addEventListener('mouseout', function() {
            this.style.animationPlayState = 'running';
        });
        
        // Dynamic signal bar animation
        document.addEventListener('DOMContentLoaded', function() {
            const signalBar = document.querySelector('.signal-bar');
            const signalStrength = {{Auth::user()->signal_strength}};
            
            // Animate the bar filling up
            setTimeout(() => {
                signalBar.style.width = signalStrength + '%';
            }, 300);
        });
    </script>
</body>
</html>
                        <!--       <div class="crypt-boxed-area">-->
                        <!--    <h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>-->
                        <!--    <div class="row no-gutters">-->
                        <!--        <div class="col-md-6">-->
                        <!--            <div class="crypt-buy-sell-form">-->
                        <!--                <p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>-->
                        <!--                <div class="crypt-buy">-->
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Currency</span> -->
                        <!--                        </div>-->
                        <!--                        <select name="ast2" id="" class="form-control" required="true">-->
                        <!--                             <option value="Crypto Currency">Crypto Currency</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
                                             
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Asset</span> -->
                        <!--                        </div>-->
                        <!--                        <select name="ast2" id="" class="form-control" required="true">-->
                        <!--                             <option value="">Select Asset</option>-->
                        <!--                            <option>ALGO-BTC</option>-->
                        <!--                            <option>ALGO-USD</option>-->
                        <!--                            <option>BCH-BTC</option>-->
                        <!--                            <option>BCH-USD</option>-->
                        <!--                            <option>BCH-EUR</option>-->
                        <!--                            <option>BTC-EUR</option>-->
                        <!--                            <option>BTC-GBP</option>-->
                        <!--                            <option>BTC-TRY</option>-->
                        <!--                            <option>BTC-USD</option>-->
                        <!--                            <option>BTC-USDT</option>-->
                        <!--                            <option>DGLD-BTC</option>-->
                        <!--                            <option>DGLD-USD</option>-->
                        <!--                            <option>ETH-BTC</option>-->
                        <!--                            <option>ETH-EUR</option>-->
                        <!--                            <option>ETH-GBP</option>-->
                        <!--                            <option>ETH-TRY</option>-->
                        <!--                            <option>ETH-USD</option>-->
                        <!--                            <option>ETH-USDT</option>-->
                        <!--                            <option>LTC-EUR</option>-->
                        <!--                            <option>LTC-USD</option>-->
                        <!--                            <option>PAX-USD</option>-->
                        <!--                            <option>USDT-EUR</option>-->
                        <!--                            <option>USDT-TRY</option>-->
                        <!--                            <option>USDT-USD</option>-->
                        <!--                            <option>XLM-USD</option>-->
                        <!--                            <option>XLM-EUR</option>-->
                        <!--                            <option>XRP-EUR</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
        
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Trade In</span> -->
                        <!--                        </div>-->
                        <!--                        <select name="ast2" id="" class="form-control" required="true">-->
                        <!--                             <option value="10000">10 Seconds</option>-->
                        <!--                            <option value="30000">30 Seconds</option>-->
                        <!--                            <option value="60000">1 Minute</option>-->
                        <!--                            <option value="120000">2 Minutes</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
        
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Amount</span> -->
                        <!--                        </div>-->
                        <!--                        <input type="number" class="form-control" placeholder="" >-->
                        <!--                    </div>-->
        
                        <!--                    <div>-->
                        <!--                        <p>Fee: <span class="fright">100%x0.2=0.02</span></p>-->
                        <!--                    </div>-->
                        <!--                    <div class="text-center mt-3 mb-3 crypt-up">-->
                        <!--                        <p>Your payout will 9% on profit trades</p>-->
                                                <!-- <h4>0.09834 BTC</h4> -->
                        <!--                    </div>-->
                        <!--                    <div class="menu-green"><a href="#" class="sub btn btn-success">Buy</a></div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-md-6">-->
                        <!--            <div class="crypt-buy-sell-form">-->
                        <!--                <p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>-->
                        <!--                <div class="crypt-sell">-->
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Currency</span> -->
                        <!--                        </div>-->
                        <!--                        <select name="ast2" id="" class="form-control" required="true">-->
                        <!--                             <option value="Crypto Currency">Crypto Currency</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
                                             
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Asset</span> -->
                        <!--                        </div>-->
                        <!--                        <select name="ast2" id="" class="form-control" required="true">-->
                        <!--                             <option value="">Select Asset</option>-->
                        <!--                            <option>ALGO-BTC</option>-->
                        <!--                            <option>ALGO-USD</option>-->
                        <!--                            <option>BCH-BTC</option>-->
                        <!--                            <option>BCH-USD</option>-->
                        <!--                            <option>BCH-EUR</option>-->
                        <!--                            <option>BTC-EUR</option>-->
                        <!--                            <option>BTC-GBP</option>-->
                        <!--                            <option>BTC-TRY</option>-->
                        <!--                            <option>BTC-USD</option>-->
                        <!--                            <option>BTC-USDT</option>-->
                        <!--                            <option>DGLD-BTC</option>-->
                        <!--                            <option>DGLD-USD</option>-->
                        <!--                            <option>ETH-BTC</option>-->
                        <!--                            <option>ETH-EUR</option>-->
                        <!--                            <option>ETH-GBP</option>-->
                        <!--                            <option>ETH-TRY</option>-->
                        <!--                            <option>ETH-USD</option>-->
                        <!--                            <option>ETH-USDT</option>-->
                        <!--                            <option>LTC-EUR</option>-->
                        <!--                            <option>LTC-USD</option>-->
                        <!--                            <option>PAX-USD</option>-->
                        <!--                            <option>USDT-EUR</option>-->
                        <!--                            <option>USDT-TRY</option>-->
                        <!--                            <option>USDT-USD</option>-->
                        <!--                            <option>XLM-USD</option>-->
                        <!--                            <option>XLM-EUR</option>-->
                        <!--                            <option>XRP-EUR</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
        
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Trade In</span> -->
                        <!--                        </div>-->
                        <!--                        <select name="ast2" id="" class="form-control" required="true">-->
                        <!--                             <option value="10000">10 Seconds</option>-->
                        <!--                            <option value="30000">30 Seconds</option>-->
                        <!--                            <option value="60000">1 Minute</option>-->
                        <!--                            <option value="120000">2 Minutes</option>-->
                        <!--                        </select>-->
                        <!--                    </div>-->
        
                        <!--                    <div class="input-group mb-3">-->
                        <!--                        <div class="input-group-prepend"> -->
                        <!--                            <span class="input-group-text">Amount</span> -->
                        <!--                        </div>-->
                        <!--                        <input type="number" class="form-control" placeholder="" >-->
                        <!--                    </div>-->
        
                        <!--                    <div>-->
                        <!--                        <p>Fee: <span class="fright">100%x0.2=0.02</span></p>-->
                        <!--                    </div>-->
                        <!--                    <div class="text-center mt-3 mb-3 crypt-up">-->
                        <!--                        <p>You will approximately pay % on trades</p>-->
                                                <!-- <h4>0.09834 BTC</h4> -->
                        <!--                    </div>-->
                        <!--                    <div><a href="#" class=" sub btn btn-danger">Sell</a></div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
        
                        <!-- end buy and sell -->
        
                         <!-- TradingView Widget BEGIN -->
                        <!--<div class="tradingview-widget-container">-->
                        <!--    <div class="tradingview-widget-container__widget"></div>-->
                        <!--    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>-->
                        <!--        {-->
                        <!--        "colorTheme": "light",-->
                        <!--        "dateRange": "12m",-->
                        <!--        "showChart": false,-->
                        <!--        "locale": "en",-->
                        <!--        "largeChartUrl": "",-->
                        <!--        "isTransparent": false,-->
                        <!--        "width": "100%",-->
                        <!--        "height": "400",-->
                        <!--        "tabs": [-->
                        <!--          {-->
                        <!--            "title": "Indices",-->
                        <!--            "symbols": [-->
                        <!--              {-->
                        <!--                "s": "FOREXCOM:SPXUSD",-->
                        <!--                "d": "S&P 500"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FOREXCOM:NSXUSD",-->
                        <!--                "d": "Nasdaq 100"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FOREXCOM:DJI",-->
                        <!--                "d": "Dow 30"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "INDEX:NKY",-->
                        <!--                "d": "Nikkei 225"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "INDEX:DEU30",-->
                        <!--                "d": "DAX Index"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FOREXCOM:UKXGBP",-->
                        <!--                "d": "FTSE 100"-->
                        <!--              }-->
                        <!--            ],-->
                        <!--            "originalTitle": "Indices"-->
                        <!--          },-->
                        <!--          {-->
                        <!--            "title": "Commodities",-->
                        <!--            "symbols": [-->
                        <!--              {-->
                        <!--                "s": "CME_MINI:ES1!",-->
                        <!--                "d": "E-Mini S&P"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "CME:6E1!",-->
                        <!--                "d": "Euro"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "COMEX:GC1!",-->
                        <!--                "d": "Gold"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "NYMEX:CL1!",-->
                        <!--                "d": "Crude Oil"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "NYMEX:NG1!",-->
                        <!--                "d": "Natural Gas"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "CBOT:ZC1!",-->
                        <!--                "d": "Corn"-->
                        <!--              }-->
                        <!--            ],-->
                        <!--            "originalTitle": "Commodities"-->
                        <!--          },-->
                        <!--          {-->
                        <!--            "title": "Forex",-->
                        <!--            "symbols": [-->
                        <!--              {-->
                        <!--                "s": "FX:EURUSD"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FX:GBPUSD"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FX:USDJPY"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FX:USDCHF"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FX:AUDUSD"-->
                        <!--              },-->
                        <!--              {-->
                        <!--                "s": "FX:USDCAD"-->
                        <!--              }-->
                        <!--            ],-->
                        <!--            "originalTitle": "Forex"-->
                        <!--          }-->
                        <!--        ]-->
                        <!--        }-->
                        <!--    </script>-->
                        <!--</div>-->
                        
                        
                        
                        
                        
                        
                         <div class="row">
                            <div class="pt-1 col-12">
                                <h3>Personal Trading Chart</h3>
                                <div class="tradingview-widget-container" style="margin:30px 0px 10px 0px;">
                                    <div id="tradingview_f933e"></div>
                                    <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span> <span class="blue-text">Personal trading chart</span></a></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "width": "100%",
                                            "height": "550",
                                            "symbol": "COINBASE:BTCUSD",
                                            "interval": "1",
                                            "timezone": "Etc/UTC",
                                            "theme": 'light',
                                            "style": "9",
                                            "locale": "en",
                                            "toolbar_bg": "#f1f3f6",
                                            "enable_publishing": false,
                                            "hide_side_toolbar": false,
                                            "allow_symbol_change": true,
                                            "calendar": false,
                                            "studies": [
                                                "BB@tv-basicstudies"
                                            ],
                                            "container_id": "tradingview_f933e"
                                        });
                                    </script>
                                </div>

                            </div>



                            <div class="white-box" style="height: 450px; width:100%">
                                <h4 style="margin-bottom:5px;"> Forex Market Fundamental Data</h4>
                                <!-- TradingView Widget BEGIN -->

                                <span id="tradingview-copyright"><a ref="nofollow noopener" target="_blank" href="http://www.tradingview.com" style="color: rgb(173, 174, 176); font-family: &quot;Trebuchet MS&quot;, Tahoma, Arial, sans-serif; font-size: 13px;"></a></span>
                                <script src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js">
                                    {
                                        "currencies": [
                                            "EUR",
                                            "USD",
                                            "JPY",
                                            "BTC",
                                            "ETH",
                                            "LTC",
                                            "GBP",
                                            "CHF",
                                            "AUD",
                                            "CAD",
                                            "NZD",
                                            "CNY"
                                        ],
                                        "isTransparent": false,
                                        "colorTheme": "light",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en"
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                        <!-- TradingView Widget END -->
        
                        <!-- Converter; -->
                        <!--<div>-->
                        <!--    <script>-->
                        <!--        var fm = "USD";var to = "EUR";var tz = "timezone";var sz = "1x1";var lg = "en";var st = "info";var lr = "0";var rd = "0";-->
                        <!--    </script>-->
                        <!--    <a href="https://currencyrate.today/converter-widget" title="Currency Converter">-->
                        <!--        <script src="//currencyrate.today/converter"></script>-->
                        <!--    </a>-->
                        <!--</div>-->
                        <!-- converter end -->
                    </div>
                    <!-- end buy / sell -->
                   
        
                                <!-- Row end -->
                            </div>
        
        
                            <!-- Content wrapper end -->
        
                        </div>
        
                        
        
                               <!-- end trading signal -->
                            </div>
        


@include('dashboard.footer')