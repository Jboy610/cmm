<?php
session_start();
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isLoggedIn()) {
    redirect('../login.php');
}

$user = getUserById($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'includes/sidebar.php'; ?>
        
        <div class="main-content">
            <?php include 'includes/header.php'; ?>
            
            <div class="content">
                <div class="welcome-banner">
                    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
                    <p>Start investing and watch your money grow</p>
                </div>
                
                <div class="investment-plans">
                    <h2>Available Investment Plans</h2>
                    
                    <div class="plans-grid">
                        <!-- Plan 1 -->
                        <div class="plan-card">
                            <div class="plan-header">
                                <h3>Basic Plan</h3>
                                <div class="plan-badge">Popular</div>
                            </div>
                            <div class="plan-details">
                                <div class="plan-amount">$5,000 - $24,999</div>
                                <div class="plan-roi">$1,200 every 24hrs</div>
                                <div class="plan-features">
                                    <ul>
                                        <li>5% daily ROI</li>
                                        <li>Capital returned after 30 days</li>
                                        <li>24/7 support</li>
                                    </ul>
                                </div>
                                <button class="btn btn-invest" data-plan="basic">Invest Now</button>
                            </div>
                            <div class="plan-milestones">
                                <h4>Earnings Milestones</h4>
                                <table>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Earnings</th>
                                    </tr>
                                    <tr>
                                        <td>$5,000</td>
                                        <td>$1,200 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$25,000</td>
                                        <td>$6,000 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$50,000</td>
                                        <td>$12,500 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$100,000</td>
                                        <td>$25,000 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$250,000</td>
                                        <td>$62,500 every 24hrs</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Plan 2 -->
                        <div class="plan-card premium">
                            <div class="plan-header">
                                <h3>Premium Plan</h3>
                                <div class="plan-badge">Best Value</div>
                            </div>
                            <div class="plan-details">
                                <div class="plan-amount">$25,000 - $99,999</div>
                                <div class="plan-roi">$6,250 every 24hrs</div>
                                <div class="plan-features">
                                    <ul>
                                        <li>6.25% daily ROI</li>
                                        <li>Capital returned after 25 days</li>
                                        <li>Priority support</li>
                                    </ul>
                                </div>
                                <button class="btn btn-invest" data-plan="premium">Invest Now</button>
                            </div>
                            <div class="plan-milestones">
                                <h4>Earnings Milestones</h4>
                                <table>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Earnings</th>
                                    </tr>
                                    <tr>
                                        <td>$25,000</td>
                                        <td>$6,250 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$50,000</td>
                                        <td>$12,500 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$100,000</td>
                                        <td>$25,000 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$250,000</td>
                                        <td>$62,500 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$500,000</td>
                                        <td>$125,000 every 24hrs</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Plan 3 -->
                        <div class="plan-card vip">
                            <div class="plan-header">
                                <h3>VIP Plan</h3>
                                <div class="plan-badge">Exclusive</div>
                            </div>
                            <div class="plan-details">
                                <div class="plan-amount">$100,000+</div>
                                <div class="plan-roi">$30,000 every 24hrs</div>
                                <div class="plan-features">
                                    <ul>
                                        <li>7.5% daily ROI</li>
                                        <li>Capital returned after 20 days</li>
                                        <li>Dedicated account manager</li>
                                    </ul>
                                </div>
                                <button class="btn btn-invest" data-plan="vip">Invest Now</button>
                            </div>
                            <div class="plan-milestones">
                                <h4>Earnings Milestones</h4>
                                <table>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Earnings</th>
                                    </tr>
                                    <tr>
                                        <td>$100,000</td>
                                        <td>$30,000 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$250,000</td>
                                        <td>$75,000 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$500,000</td>
                                        <td>$150,000 every 24hrs</td>
                                    </tr>
                                    <tr>
                                        <td>$1,000,000</td>
                                        <td>$300,000 every 24hrs</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Investment Modal -->
    <div class="modal" id="investmentModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Make Investment</h2>
            <form id="investmentForm">
                <input type="hidden" id="planType" name="plan_type">
                
                <div class="form-group">
                    <label for="investAmount">Investment Amount ($)</label>
                    <input type="number" id="investAmount" name="amount" required>
                    <div class="amount-range" id="amountRange"></div>
                </div>
                
                <div class="form-group">
                    <label for="paymentMethod">Payment Method</label>
                    <select id="paymentMethod" name="payment_method" required>
                        <option value="">Select payment method</option>
                        <option value="bitcoin">Bitcoin</option>
                        <option value="ethereum">Ethereum</option>
                        <option value="usdt">USDT</option>
                        <option value="bank">Bank Transfer</option>
                    </select>
                </div>
                
                <div class="roi-preview">
                    <h4>Estimated Earnings</h4>
                    <div id="roiCalculation"></div>
                </div>
                
                <button type="submit" class="btn btn-confirm">Confirm Investment</button>
            </form>
        </div>
    </div>
    
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
