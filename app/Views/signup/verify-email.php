<?php 
 $plans = getPlan();
 $current_plan = getusercurrentplan();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/Dashboard/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script><samp></samp>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<title>Congreg8 Registration</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
        overflow: hidden;
        /* Prevent unwanted scrolling */
    }

    body {
        font-family: 'Manrope';
        overflow-x: hidden;
        background-color: #F7F8F8;
    }

    .steps-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
        width: 478px;
        position: relative;
        padding-left: 30px;
    }

    .step {
        display: flex;
        align-items: center;
        text-align: center;
        font-size: 14px;
        flex: 1;
        /* Ensure equal width for all steps */
        position: relative;
    }

    .step-circle {
        width: 29px;
        height: 30px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #EBEBEB;
        font-size: 18px;
        color: #9D9D9D;
        font-weight: bold;
        display: flex;
        font-family: 'Manrope';
        align-items: center;
        justify-content: center;
        z-index: 1;
        transition: background 0.3s ease, color 0.3s ease;
        /* Smooth transition for background and text color */
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus {
        -webkit-text-fill-color: #000 !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    .step.actives .step-circle {
        background: linear-gradient(5deg, #FF003D 3.02%, #FFB169 83%);
        color: #F7F8F8;
        transition: background 0.5s ease, color 0.5s ease;
        /* Smooth transition for background and text color */
    }

    .step-line {
        position: absolute;
        top: 30%;
        right: 50%;
        transform: translateX(-50%);
        width: 0%;
        /* Start with a width of 0 */
        height: 2px;
        background-color: #F8E3E3 !important;
        z-index: -1;
        transition: width 30s ease, background-color 6s ease;
        /* Smooth transition for width and color */
        transform-origin: left center;
    }

    .step.actives .step-line {
        background: linear-gradient(95deg, #FF003D 5.84%, #FFB169 99.25%);
        width: 100%;
        /* Expand to 100% width when active */
    }

    .step:not(.actives) .step-line {
        background-color: #F8E3E3;
        /* Default inactive line color */
        width: 100%;
        /* Shrink back to 0% when inactive */
    }



    .step-text {
        color: #A8A8A8;
        font-family: 'Manrope';
        font-size: 9.5px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: capitalize;
        transition: color 0.5s ease;
        /* Smooth transition for text color */
    }

    .step.actives .step-text {
        color: #FF003D;
        font-family: 'Manrope';
        font-size: 9.5px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: capitalize;
        transition: color 0.5s ease;
        /* Smooth transition for text color */
    }


    /* Left and Right Panel Styling */
    .content-panel {
        display: flex;
        height: 100vh;
        /* Full viewport height */
        width: 100vw;
        /* Full viewport width */
    }

    .left-panel {
        background-color: #C91E1E;
        color: white;
        width: 25%;
        /* Adjust proportionally */
        padding: 30px 36px 40px 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        /* Ensures it matches parent container's height */
    }

    .right-panel {
        width: 75%;
        /* Adjust proportionally */
        padding: 80px 0;
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Ensures it matches parent container's height */
        overflow-y: auto;
        /* Allows scrolling for overflowing content */
    }



    /* Form steps */
    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .btn-container {
        margin-top: 20px;
        display: flex;
        width: 500px;
        justify-content: space-between !important;
    }

    .btn.next {
        padding: 8px 20px;
        border-radius: 7px;
        background: #FF003D;
        color: white;
        border: none;
        cursor: pointer;
        color: #FFF;
        font-family: 'Manrope';
        font-size: 14px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: uppercase;
    }

    .btn.prev {
        border-radius: 7px;
        padding: 8px 20px;
        border: none;
        cursor: pointer;
        color: #9F9DA8;
        font-family: 'Manrope';
        font-size: 14px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: uppercase;
        background: #ECECEC;
    }

    .left-head {
        color: #FFF;
        font-family: 'Manrope';
        font-size: 32px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: capitalize;
    }

    #leftDescription {
        color: #FFF;
        font-family: 'Manrope';
        font-size: 13.5px;
        font-style: normal;
        margin-top: 5px;
        font-weight: 400;
        line-height: normal;
    }

    .data {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .btn[disabled] {
        background-color: #e3e3e3;
        color: #9c9c9c;
        cursor: not-allowed;
    }

    .verification-card1 {
        margin: 30px 0;
        width: 500px;
        border-radius: 6px;
        padding: 30px 80px 30px 80px;
        text-align: center;
        background: #FFF;
        box-shadow: 0px 4px 41.3px 0px rgba(193, 193, 193, 0.25);
        flex-shrink: 0;
    }

    .verification-1 img {
        width: 160px;
        margin-bottom: 20px;
    }

    .verification-card1 h2 {
        color: #000;
        font-family: 'Manrope';
        font-size: 25px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: capitalize;
        margin-bottom: 10px;
    }

    .verification-card1 p {
        color: #000;
        text-align: center;
        font-family: Manrope;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: capitalize;
        margin-bottom: 20px;
    }

    .input-group {
        display: flex;
        justify-content: space-between;
    }

    .input-box {
        width: 54px;
        height: 54px;
        flex-shrink: 0;
        border-radius: 4px;
        border: 1px solid #E2E8F0;
        background: #F9F9F9;
        color: #000;
        font-family: 'Manrope';
        text-align: center;
        font-size: 18px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: uppercase;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .input-box:focus {
        border-color: #FF003D;
        background-color: #fff;
    }

    .input-icon-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .card-logos {
        position: absolute;
        display: flex;
        align-items: center;
        pointer-events: none;
        right: 15px;
        gap: 8px;
    }

    .card-logos img {
        width: 30px;
        height: 30px;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        pointer-events: none;
        /* Make sure the icon doesn't interfere with input interactions */
    }

    .resend {
        margin-top: 15px;
        color: #000;
        text-align: center;
        font-family: Manrope;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: capitalize;
    }

    .resend a {
        color: #000;
        font-family: Manrope;
        font-size: 11px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration-line: underline;
        text-transform: capitalize;
    }

    .card-container {
        position: relative;
    }

    .verification-card {
        display: none;
        /* Hide both cards initially */
    }

    .verification-card.active {
        width: 500px;
        border-radius: 6px;
        padding: 20px 50px 20px 50px;
        margin: 30px;
        background: #FFF;
        box-shadow: 0px 4px 41.3px 0px rgba(193, 193, 193, 0.25);
        display: block;
        /* Only the active card will be shown */
    }

    .verification-card .form-control {
        width: 100%;
        border-radius: 7px;
        padding: 10px 10px 10px 35px !important;
        font-family: 'Manrope';
        font-size: 13px;
        font-weight: 500;
        outline: none;
        border: 1px solid #E2E8F0;
        background: #F9F9F9;
    }

    .form-control {
        width: 100%;
        border-radius: 7px;
        padding: 10px 10px 10px 35px !important;
        font-family: 'Manrope';
        font-size: 13px;
        font-weight: 500;
        outline: none;
        border: 1px solid #E2E8F0;
        background: #F9F9F9;
    }

    .verification-card .form-control::placeholder {
        color: #9B9DA8;
        font-family: 'Manrope';
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .btn-container {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .btn.next-card,
    .btn.prev-card {
        padding: 8px 20px;
        border-radius: 7px;
        background: #FF003D;
        color: white;
        border: none;
        cursor: pointer;
        text-transform: uppercase;
        font-family: 'Manrope';
        font-weight: 800;
    }

    .btn[disabled] {
        background-color: #e3e3e3;
        color: #9c9c9c;
        cursor: not-allowed;
    }

    .plan-price {
        font-family: 'Manrope';
        font-size: 42px !important;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: uppercase;
        background: linear-gradient(125deg, #FF003D 92.7%, #FFB169 15.67%) !important;
        background-clip: text !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
    }

    .verification-card4 {
        width: 500px;
        border-radius: 6px;
        padding: 30px 50px 30px 50px;
        margin: 30px;
        background: #FFF;
        box-shadow: 0px 4px 41.3px 0px rgba(193, 193, 193, 0.25);
        display: block;
        /* Only the active card will be shown */
    }

    .verification-card4 .form-control {
        width: 100%;
        border-radius: 7px;
        padding: 10px 10px 10px 35px !important;
        font-family: 'Manrope';
        font-size: 13px;
        font-weight: 500;
        outline: none;
        border: 1px solid #E2E8F0;
        background: #F9F9F9;
    }

    .verification-card4 .form-control::placeholder {
        color: #9B9DA8;
        font-family: 'Manrope';
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .apply-btn {
        border-radius: 6px;
        background: #E7E7E7;
        color: #444;
        font-family: 'Manrope';
        border: 0;
        padding: 6px 26px;
        cursor: pointer;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .modal-content {
        border-radius: 10px;
        padding: 10px 40px 20px 40px;
    }

    .payment-details p {
        display: flex;
        justify-content: space-between;
        font-size: 1rem;
        margin: 5px 0;
    }

    .payment-details p strong {
        color: #000;
        font-family: 'Manrope';
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: capitalize;
        margin-bottom: 12px;
    }

    .payment-details p span {
        color: #586070;
        font-family: 'Manrope';
        font-size: 13px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        margin-bottom: 12px;
    }

    #continueToDashboardBtn {
        width: 100%;
        border: none;
        border-radius: 7px;
        background: #FF003D;
        color: #FFF;
        font-family: 'Manrope';
        font-size: 14px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        padding: 11px;
        text-transform: uppercase;
    }
</style>
</head>

<body>

    <!-- Main Content Panels -->
    <div class="content-panel">
        <!-- Left Panel for Text -->
        <div class="left-panel">
            <div id="leftText" class="left-head">Please Verify Your Email Address</div>
            <p id="leftDescription">We need your email address for security purposes and to ensure smooth communication
                for technical matters.</p>
        </div>

        <!-- Right Panel for Forms -->
        <div class="right-panel">
            <!-- Step Progress Bar -->
            <div class="data">
                <div class="steps-container">
                    <div class="step actives">
                        <div class="info">
                            <div class="step-circle">1</div>
                            <div class="step-text" style="margin-left: -2px;margin-top: 5px;">SIGN UP</div>
                        </div>
                    </div>
                    <div class="step actives">
                        <div class="step-line"></div>
                        <div style="display: flex; flex-direction: column; text-align: center;">
                            <div class="step-circle">2</div>
                            <div class="step-text" style="margin-left: -16px;margin-top: 5px;">VERIFICATION</div>
                        </div>

                    </div>
                    <div class="step">
                        <div class="step-line"></div>
                        <div class="info">
                            <div class="step-circle">3</div>
                            <div class="step-text" style="margin-left: -4px;margin-top: 5px;">DETAILS</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-line"></div>
                        <div class="info">
                            <div class="step-circle">4</div>
                            <div class="step-text" style="margin-left: -17px;margin-top: 5px;">CHOOSE PLAN</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-line"></div>
                        <div class="info">
                            <div class="step-circle">5</div>
                            <div class="step-text" style="margin-left: -24.5px;margin-top: 5px;">PAYMENT METHOD</div>
                        </div>
                    </div>
                </div>
                <!-- Step 1: Email Verification -->
                <div class="step-content active" id="step1">
                    <div class="verification-card1">
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/verify-email-icon.png" alt="Email Icon">
                        <h2>Verify Your E-Mail</h2>
                        <p>Enter The Code We Sent To Your Email. If You Have Not Received It, Check Spam</p>
                        <div class="input-group">
                            <input type="text" name="otp[]"  maxlength="1" class="input-box" autofocus>
                            <input type="text" name="otp[]"  maxlength="1" class="input-box">
                            <input type="text" name="otp[]"  maxlength="1" class="input-box">
                            <input type="text" name="otp[]"  maxlength="1" class="input-box">
                        </div>

                        <p class="resend">Haven't Received Email? <a href="#">Resend</a></p>
                    </div>
                </div>

                <!-- Step 2: Church Details -->
                <div class="step-content" id="step2">
                    <div class="card-container">
                        <!-- Church Details Card -->
                        <div class="verification-card church-details active">
                            <img src="<?php echo base_url(); ?>/public/Dashboard/assets/church-ico.png" style="width: 120px;" alt="Church Icon">
                            <h2 style="
                            margin-bottom: 15px;
                            color: #000;
                            font-family: Manrope;
                            font-size: 25px;
                            font-style: normal;
                            font-weight: 800;
                            line-height: normal;
                            text-transform: capitalize;
                            ">Church Details</h2>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="11" height="12"
                                        viewBox="0 0 11 12" fill="none">
                                        <path
                                            d="M8.8 6.41143V5.27429C8.79989 5.06167 8.7427 4.85329 8.63485 4.6726C8.527 4.4919 8.37277 4.34604 8.1895 4.25143L6.05 3.14286V2.28571H6.6C6.9025 2.28571 7.15 2.02857 7.15 1.71429C7.15 1.4 6.9025 1.14286 6.6 1.14286H6.05V0.571429C6.05 0.257143 5.8025 0 5.5 0C5.1975 0 4.95 0.257143 4.95 0.571429V1.14286H4.4C4.0975 1.14286 3.85 1.4 3.85 1.71429C3.85 2.02857 4.0975 2.28571 4.4 2.28571H4.95V3.14286L2.8105 4.25714C2.62723 4.35176 2.473 4.49761 2.36515 4.67831C2.2573 4.85901 2.20011 5.06738 2.2 5.28V6.41714L0.6545 7.13143C0.2585 7.30857 0 7.72 0 8.17143V10.8571C0 11.4857 0.495 12 1.1 12H4.4V10.3486C4.4 9.77714 4.774 9.25143 5.313 9.16C5.47091 9.1317 5.63286 9.13958 5.78753 9.1831C5.9422 9.22662 6.08586 9.30472 6.20844 9.41194C6.33102 9.51916 6.42958 9.65292 6.49721 9.80384C6.56485 9.95477 6.59993 10.1192 6.6 10.2857V12H9.9C10.505 12 11 11.4857 11 10.8571V8.17143C11 7.72 10.7415 7.30857 10.3455 7.12571L8.8 6.41143ZM5.5 7.14286C5.0435 7.14286 4.675 6.76 4.675 6.28571C4.675 5.81143 5.0435 5.42857 5.5 5.42857C5.9565 5.42857 6.325 5.81143 6.325 6.28571C6.325 6.76 5.9565 7.14286 5.5 7.14286Z"
                                            fill="#9B9DA8" />
                                    </svg>
                                    <input type="name" id="church_name" class="form-control" placeholder="Church Name" required>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" style="left: 13px;" xmlns="http://www.w3.org/2000/svg"
                                        width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <path
                                            d="M3.71641 3.09082C6.25664 3.09082 8.7836 3.09082 11.3262 3.09082C11.3293 3.14785 11.3344 3.1998 11.3344 3.25176C11.3348 4.7502 11.3332 6.24863 11.3375 7.74707C11.3379 7.86152 11.302 7.91855 11.2008 7.97051C10.3613 8.40059 9.52383 8.83574 8.68868 9.27402C8.5961 9.32246 8.53672 9.31816 8.45782 9.2498C8.22579 9.04863 7.98711 8.85527 7.75 8.66035C7.56602 8.50918 7.47227 8.50879 7.28633 8.66074C7.04493 8.8584 6.80352 9.05566 6.56641 9.2584C6.50235 9.31308 6.45352 9.32832 6.37383 9.28652C5.51602 8.8373 4.65586 8.39316 3.79922 7.94277C3.75508 7.91973 3.70782 7.85098 3.70782 7.80332C3.70313 6.26113 3.70391 4.71855 3.70469 3.17637C3.70469 3.15254 3.71094 3.1291 3.71641 3.09082ZM7.24961 4.73652C6.96016 4.73652 6.69297 4.73184 6.42657 4.73809C6.23555 4.74277 6.11954 4.90098 6.17344 5.07871C6.21602 5.21816 6.32383 5.27363 6.46524 5.27324C6.72188 5.27246 6.97852 5.27324 7.24961 5.27324C7.24961 5.34199 7.24961 5.39434 7.24961 5.44668C7.24961 6.00762 7.24922 6.56855 7.25 7.12949C7.2504 7.33379 7.3418 7.44473 7.50899 7.44863C7.68438 7.45254 7.78282 7.33965 7.78282 7.12988C7.7836 6.56895 7.78321 6.00801 7.78321 5.44707C7.78321 5.39473 7.78321 5.34238 7.78321 5.28105C7.84454 5.27832 7.8918 5.27402 7.93946 5.27402C8.14883 5.27324 8.35821 5.27559 8.56758 5.27285C8.75157 5.27051 8.86602 5.1666 8.86836 5.00605C8.87071 4.83887 8.76563 4.74043 8.57657 4.73613C8.44532 4.7334 8.31368 4.73535 8.18204 4.73535C8.05235 4.73535 7.92266 4.73535 7.78321 4.73535C7.78321 4.54668 7.78477 4.38145 7.78282 4.21582C7.78047 4.02988 7.67969 3.91895 7.51602 3.91934C7.35235 3.91973 7.25235 4.02988 7.2504 4.2166C7.24844 4.38184 7.24961 4.54707 7.24961 4.73652Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M2.08008 13.441C3.90391 12.0207 5.71289 10.6121 7.5168 9.20703C9.31094 10.6039 11.1238 12.0156 12.9547 13.441C9.325 13.441 5.71328 13.441 2.08008 13.441Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M1.5293 13.1746C1.5293 11.2277 1.5293 9.31602 1.5293 7.37695C3.02578 8.15391 4.51016 8.92461 6.01562 9.70625C4.51758 10.8645 3.03594 12.0098 1.5293 13.1746Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M13.5047 7.37842C13.5047 9.3124 13.5047 11.2245 13.5047 13.1718C12.0039 12.0116 10.5203 10.8647 9.02148 9.70615C10.5238 8.92607 12.0074 8.15576 13.5047 7.37842Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M13.5146 6.76504C12.9639 7.05098 12.4314 7.32754 11.8838 7.61191C11.8838 6.8502 11.8838 6.1084 11.8838 5.34082C12.4314 5.81934 12.9643 6.28457 13.5146 6.76504Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M3.15547 5.33984C3.15547 6.11211 3.15547 6.85039 3.15547 7.61133C2.60898 7.32812 2.07344 7.05039 1.52148 6.76445C2.06914 6.28672 2.6 5.82383 3.15547 5.33984Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M6.37598 2.53389C6.76387 2.19561 7.1334 1.87373 7.51582 1.54053C7.89082 1.8667 8.26387 2.19092 8.6584 2.53389C7.8916 2.53389 7.15098 2.53389 6.37598 2.53389Z"
                                            fill="#9B9DA8" />
                                    </svg>
                                    <input type="email" id = "church_email" class="form-control" placeholder="Church Email" required>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 12 12" fill="none">
                                        <path
                                            d="M5.61312 11.9996C5.39427 11.9684 5.17519 11.9386 4.95658 11.9052C4.5069 11.8369 4.49751 11.8392 4.36014 11.4147C4.22982 11.0122 4.11805 10.6034 4.00628 10.1953C3.9572 10.0163 3.92855 9.83202 3.8877 9.63642C5.31044 9.31496 6.72286 9.3173 8.15523 9.63477C8.10029 9.88532 8.06084 10.1272 7.99298 10.3606C7.86171 10.8117 7.71284 11.2576 7.575 11.7068C7.54964 11.7892 7.50033 11.8244 7.41909 11.8366C7.1197 11.8817 6.82054 11.9301 6.52162 11.9778C6.49157 11.9827 6.46198 11.9921 6.43239 11.9996C6.15907 11.9996 5.88598 11.9996 5.61312 11.9996Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M11.9995 6.54835C11.9678 6.74301 11.9408 6.93838 11.904 7.1321C11.7192 8.10142 11.3153 8.97071 10.7193 9.73057C10.18 9.48848 9.65068 9.25061 9.12305 9.01368C9.18926 8.17234 9.25736 7.30563 9.32616 6.43259C9.34049 6.43141 9.36702 6.42742 9.39379 6.42742C10.2391 6.42719 11.0845 6.42719 11.9298 6.42742C11.953 6.42742 11.9765 6.43024 11.9998 6.43165C11.9995 6.47039 11.9995 6.50937 11.9995 6.54835Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M11.9995 5.5888C11.1737 5.59021 10.3481 5.59186 9.52223 5.59326C9.45273 5.5935 9.38322 5.59326 9.3264 5.59326C9.2576 4.71764 9.18973 3.85422 9.12305 3.0056C9.64175 2.77313 10.1717 2.53573 10.7158 2.29199C10.9462 2.57401 11.1584 2.90298 11.3388 3.25239C11.6882 3.93007 11.9061 4.64719 11.9784 5.40729C11.9805 5.42936 11.9923 5.45026 11.9995 5.47186C11.9995 5.51084 11.9995 5.54982 11.9995 5.5888Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.31256 3.19824C8.37455 4.00272 8.4349 4.78888 8.49619 5.58585C6.83722 5.58585 5.2137 5.58585 3.57422 5.58585C3.57798 4.79241 3.64607 4.00436 3.75315 3.20411C5.26348 3.53192 6.76842 3.53591 8.31256 3.19824Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.2878 8.81795C7.52723 8.64888 6.77441 8.5674 6.01314 8.56787C5.25586 8.56834 4.50656 8.64818 3.75398 8.81795C3.64267 8.02404 3.58045 7.23576 3.57129 6.43457C5.20349 6.43457 6.82724 6.43457 8.4679 6.43457C8.4632 7.22801 8.39464 8.01629 8.2878 8.81795Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.14468 2.38733C6.72334 2.70175 5.31374 2.70387 3.88184 2.3824C3.95205 2.08043 4.00793 1.78362 4.09129 1.49504C4.20541 1.10008 4.34231 0.711456 4.46441 0.318844C4.49142 0.232197 4.54237 0.200966 4.62691 0.181242C5.56429 -0.0387802 6.50003 -0.0340839 7.43624 0.185938C7.50222 0.201436 7.54191 0.230084 7.56821 0.297006C7.82392 0.946271 8.00027 1.61808 8.13669 2.30116C8.14116 2.3237 8.14116 2.34695 8.14468 2.38733Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M2.71313 5.58822C1.83703 5.58822 0.950136 5.58822 0.0449219 5.58822C0.139083 4.34675 0.573961 3.24711 1.32138 2.28906C1.86333 2.53233 2.39261 2.76996 2.91883 3.00642C2.85191 3.84612 2.78311 4.70954 2.71313 5.58822Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M2.73372 6.43604C2.74945 6.76172 2.75532 7.08107 2.78233 7.39854C2.82553 7.91021 2.88189 8.42093 2.93519 8.93166C2.94153 8.99318 2.95327 9.03826 2.87273 9.06456C2.34252 9.23668 1.83602 9.46304 1.34596 9.75727C0.573652 8.78349 0.143705 7.68103 0.0429688 6.43604C0.941138 6.43604 1.83109 6.43604 2.73372 6.43604Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.96962 2.17076C8.83108 1.62482 8.70052 1.11151 8.56738 0.587402C9.13798 0.854388 9.64636 1.20215 10.1341 1.6544C9.73442 1.83169 9.35519 1.99982 8.96962 2.17076Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.56641 11.4335C8.69955 10.9113 8.83034 10.398 8.96958 9.85156C9.34717 10.0173 9.72757 10.1845 10.1343 10.363C9.65243 10.8169 9.14006 11.1635 8.56641 11.4335Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M1.90625 10.3651C2.31037 10.1869 2.68584 10.0211 3.07023 9.85156C3.20713 10.3886 3.33863 10.9042 3.47317 11.4319C2.90375 11.1668 2.3949 10.8181 1.90625 10.3651Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M1.90625 1.65603C2.39584 1.20002 2.90563 0.853665 3.47435 0.586914C3.34097 1.10938 3.20995 1.62269 3.07094 2.16675C2.69194 2.0005 2.31178 1.83378 1.90625 1.65603Z"
                                            fill="#9B9DA8" />
                                    </svg>
                                    <input type="website" id="church_website" class="form-control" placeholder="Website" required>
                                </div>
                            </div>
                            <svg style="margin-top: 25px;" xmlns="http://www.w3.org/2000/svg" width="56" height="6"
                                viewBox="0 0 56 6" fill="none">
                                <rect width="38" height="6" rx="3" fill="#FF003D" />
                                <rect x="44" width="12" height="6" rx="3" fill="#BCB7B7" />
                            </svg>
                        </div>

                        <!-- Pastor Details Card -->
                        <div class="verification-card pastor-details">
                            <img src="<?php echo base_url(); ?>/public/Dashboard/assets/paster-ico.png" style="width: 120px;" alt="Pastor Icon">
                            <h2 style="
                            margin-bottom: 15px;
                            color: #000;
                            font-family: Manrope;
                            font-size: 25px;
                            font-style: normal;
                            font-weight: 800;
                            line-height: normal;
                            text-transform: capitalize;
                            ">Pastor Details</h2>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 12 12" fill="none">
                                        <path
                                            d="M6.2455 0C6.38425 0.03375 6.52581 0.05875 6.66144 0.1025C7.55581 0.389687 8.17113 1.17781 8.21019 2.11844C8.22738 2.52969 8.23144 2.94781 8.17956 3.35469C8.05863 4.30437 7.21675 5.07844 6.268 5.19719C5.15519 5.33625 4.04581 4.60063 3.80456 3.43563C3.78019 3.31813 3.76175 3.19656 3.763 3.07687C3.76675 2.66812 3.7455 2.25531 3.79675 1.85219C3.91331 0.937187 4.71956 0.155312 5.63206 0.0253125C5.6655 0.020625 5.698 0.00875 5.73113 0C5.90238 0 6.07394 0 6.2455 0Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.60659 6.11084C8.88471 6.26115 9.14065 6.4424 9.37503 6.6524C10.196 7.38834 10.6685 8.31397 10.7991 9.3999C10.8603 9.90803 10.8385 10.4265 10.8507 10.9402C10.856 11.1583 10.8525 11.3768 10.8513 11.5952C10.8497 11.8299 10.7057 11.9762 10.4735 11.9762C7.48315 11.9765 4.49315 11.9765 1.50284 11.9762C1.27065 11.9762 1.12471 11.8302 1.1244 11.5962C1.12346 11.0193 1.09878 10.4408 1.13003 9.86553C1.21628 8.27553 1.88971 7.01365 3.27034 6.1674C3.30221 6.14772 3.33659 6.13209 3.37721 6.11115C3.38753 6.30334 3.3869 6.48584 3.40815 6.66553C3.52534 7.64896 4.00565 8.41115 4.82409 8.96365C5.0469 9.11396 5.26534 9.27178 5.49627 9.40834C5.62628 9.48521 5.66315 9.57678 5.62252 9.7274C5.50471 9.7274 5.38096 9.72615 5.25752 9.72772C5.04315 9.7299 4.89127 9.86959 4.88721 10.0662C4.88315 10.2662 5.03596 10.4143 5.25534 10.4196C5.37909 10.4227 5.50284 10.4202 5.63627 10.4202C5.63627 10.6833 5.63346 10.9321 5.6369 11.1808C5.64065 11.4383 5.86409 11.6065 6.09659 11.5308C6.24034 11.4843 6.33596 11.3493 6.33784 11.1802C6.34034 10.9696 6.33846 10.7593 6.33846 10.5487C6.33846 10.5105 6.33846 10.4724 6.33846 10.4149C6.49565 10.4149 6.64346 10.424 6.78971 10.4124C6.96284 10.3987 7.09128 10.2396 7.08721 10.0655C7.08315 9.88646 6.94284 9.73834 6.76315 9.72928C6.66971 9.72459 6.57596 9.72771 6.48252 9.7274C6.44034 9.7274 6.39784 9.7274 6.35752 9.7274C6.31159 9.53959 6.31971 9.52303 6.4619 9.42459C6.80784 9.18553 7.17409 8.97022 7.49284 8.69865C8.21659 8.08178 8.57409 7.27959 8.58752 6.32678C8.58846 6.26459 8.58878 6.20209 8.59003 6.1399C8.59128 6.13303 8.59753 6.12678 8.60659 6.11084Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M5.9918 7.41586C6.22961 7.41586 6.46711 7.4168 6.70492 7.41555C6.94492 7.4143 7.08836 7.26993 7.08899 7.02868C7.08992 6.61555 7.09055 6.20243 7.08774 5.78961C7.08742 5.72274 7.11399 5.69555 7.16836 5.65743C7.3693 5.51711 7.55024 5.53993 7.75149 5.66524C7.85711 5.73086 7.90274 5.78711 7.90024 5.91524C7.89274 6.30086 7.90274 6.68649 7.77961 7.05961C7.60149 7.59961 7.27992 8.03243 6.81024 8.35274C6.56274 8.5218 6.31274 8.68711 6.06149 8.85055C6.03149 8.86993 5.97336 8.88618 5.95055 8.87086C5.60242 8.63555 5.2368 8.41961 4.91742 8.14961C4.34711 7.66774 4.08867 7.02618 4.08117 6.28243C4.07961 6.13055 4.07617 5.97836 4.0843 5.8268C4.08649 5.7868 4.12399 5.74493 4.15399 5.71149C4.17336 5.68993 4.21117 5.68618 4.23524 5.66774C4.42711 5.51993 4.61617 5.52461 4.81555 5.65961C4.86836 5.69524 4.88992 5.72336 4.8893 5.78493C4.8868 6.19399 4.88774 6.60336 4.88805 7.01243C4.88836 7.27743 5.02617 7.41555 5.29055 7.41618C5.5243 7.41618 5.75805 7.41586 5.9918 7.41586Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M5.5957 6.70752C5.5957 6.43096 5.5957 6.16471 5.5957 5.90283C5.8582 5.90283 6.11352 5.90283 6.37852 5.90283C6.37852 6.16283 6.37852 6.43158 6.37852 6.70752C6.12008 6.70752 5.86195 6.70752 5.5957 6.70752Z"
                                            fill="#9B9DA8" />
                                    </svg>
                                    <input type="text" class="form-control" id="pastor_name"  placeholder="Pastor Name" required>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                        viewBox="0 0 11 11" fill="none">
                                        <path
                                            d="M8.23178 7.3527L7.91478 7.52453C7.38001 7.81738 6.70247 7.71815 6.26934 7.28493L3.71405 4.72915C3.28091 4.29593 3.1817 3.61826 3.47449 3.08097L3.6463 2.76634C3.83988 2.40814 3.91005 2.00638 3.85198 1.60462C3.79712 1.20367 3.61173 0.831965 3.32447 0.546975C2.97118 0.193619 2.50174 0 2.00085 0C1.49995 0 1.0281 0.193619 0.674809 0.546975L0.551401 0.672827C-0.101939 1.32629 -0.176952 2.45171 0.33846 3.84576C0.824836 5.1769 1.80485 6.61936 3.09217 7.90693C5.05461 9.86975 7.23967 11 8.80768 11C9.42715 11 9.95224 10.8233 10.3249 10.4506L10.4507 10.3248C10.625 10.1507 10.7632 9.94391 10.8574 9.71632C10.9517 9.48874 11.0001 9.2448 11 8.99846C10.9966 8.50239 10.7995 8.0273 10.4507 7.67459C9.86754 7.09131 8.95529 6.96062 8.23178 7.3527Z"
                                            fill="#9B9DA8" />
                                    </svg>
                                    <input type="text" id="pastor_phone" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15" fill="none">
                                        <path
                                            d="M3.65487 4.69714C3.62086 2.93843 5.09845 1.32079 6.82614 1.01967C8.89697 0.658522 10.9078 2.07409 11.2619 4.15092C11.429 5.12931 11.2429 6.03967 10.7097 6.87401C9.99641 7.99045 9.34715 9.14292 8.78993 10.3454C8.57984 10.7996 8.39077 11.2638 8.18468 11.7199C7.98661 12.1561 7.49541 12.3122 7.09625 12.0731C6.93919 11.979 6.83414 11.842 6.76912 11.6739C6.10885 9.97625 5.26352 8.37661 4.25811 6.858C3.84095 6.22975 3.64987 5.52647 3.65487 4.69714ZM10.6247 4.76616C10.6147 3.03747 9.19809 1.65292 7.45139 1.66192C5.74971 1.67093 4.34515 3.08349 4.35015 4.77917C4.35515 6.5959 5.7137 7.93643 7.53843 7.92543C9.28813 7.91542 10.6357 6.53587 10.6247 4.76616Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.79474 11.5645C9.09086 11.5975 9.41299 11.6115 9.72511 11.6735C10.2243 11.7715 10.7225 11.8856 11.2107 12.0266C11.4148 12.0857 11.6109 12.2077 11.7809 12.3398C12.1131 12.5979 12.1061 12.979 11.7819 13.2481C11.4508 13.5222 11.0486 13.6443 10.6395 13.7383C9.32996 14.0404 8.00143 14.1055 6.66289 14.0424C5.87958 14.0054 5.10127 13.9244 4.33696 13.7403C3.95281 13.6473 3.57566 13.5332 3.25053 13.2971C3.10047 13.1891 2.98042 13.056 2.95441 12.864C2.92339 12.6319 3.03444 12.4598 3.20651 12.3208C3.49362 12.0887 3.83776 11.9766 4.1849 11.8826C4.80615 11.7135 5.4424 11.6325 6.08366 11.5775C6.1847 11.5685 6.22972 11.5975 6.26173 11.6935C6.35777 11.9786 6.50283 12.2367 6.74592 12.4258C7.30715 12.861 8.12547 12.7039 8.54064 12.0717C8.63868 11.9216 8.70171 11.7515 8.79474 11.5645Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M7.49122 7.46294C6.03764 7.46594 4.82916 6.27746 4.82715 4.84189C4.82415 3.31027 5.96261 2.16182 7.48322 2.15481C8.85877 2.14881 10.1143 3.1222 10.1433 4.81988C10.1683 6.26746 8.9538 7.45893 7.49122 7.46294ZM6.82395 3.47634C6.62287 3.47634 6.4438 3.47534 6.26473 3.47634C6.07365 3.47834 5.98462 3.55937 5.98162 3.74945C5.97661 4.00755 5.97761 4.26566 5.98162 4.52376C5.98462 4.71884 6.06665 4.79587 6.26073 4.79787C6.4438 4.79987 6.62787 4.79787 6.82395 4.79787C6.82395 4.8769 6.82395 4.93392 6.82395 4.99195C6.82395 5.57618 6.82295 6.16142 6.82495 6.74565C6.82595 6.96674 6.90799 7.04577 7.12507 7.04677C7.35417 7.04777 7.58326 7.04677 7.81235 7.04677C8.08046 7.04677 8.15048 6.97774 8.15048 6.70963C8.15148 6.1344 8.15048 5.56017 8.15048 4.98494C8.15048 4.92792 8.15048 4.8709 8.15048 4.79687C8.35256 4.79687 8.53664 4.79787 8.71971 4.79687C8.90479 4.79487 8.98882 4.71684 8.99282 4.53176C8.99782 4.27366 8.99682 4.01556 8.99382 3.75745C8.99082 3.55837 8.90379 3.47734 8.70471 3.47534C8.52563 3.47434 8.34656 3.47534 8.15148 3.47534C8.15148 3.25225 8.15449 3.04417 8.15048 2.83609C8.14648 2.64101 8.06645 2.56098 7.87237 2.55797C7.62427 2.55397 7.37517 2.55497 7.12707 2.55697C6.90499 2.55897 6.82796 2.635 6.82595 2.85609C6.82195 3.05717 6.82395 3.25625 6.82395 3.47634Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.50545 3.95277C8.50545 4.08182 8.50545 4.19187 8.50545 4.32392C8.33138 4.32392 8.15831 4.32392 7.98524 4.32392C7.75214 4.32492 7.66711 4.40595 7.66711 4.63805C7.66611 5.22228 7.66711 5.80651 7.66711 6.39175C7.66711 6.44477 7.66711 6.49779 7.66711 6.56182C7.54906 6.56182 7.44002 6.56182 7.31697 6.56182C7.31497 6.5098 7.31097 6.45878 7.31097 6.40675C7.31097 5.82252 7.31097 5.23829 7.30997 4.65305C7.30997 4.40095 7.22994 4.32392 6.97683 4.32292C6.82077 4.32292 6.66471 4.32192 6.50965 4.32092C6.50064 4.32092 6.49164 4.31492 6.47363 4.30892C6.47363 4.19787 6.47363 4.08383 6.47363 3.95177C6.6457 3.95177 6.81477 3.95177 6.98384 3.95177C7.23694 3.95077 7.30897 3.87674 7.31097 3.61864C7.31197 3.43857 7.31297 3.2585 7.31397 3.07842C7.31397 3.07042 7.32097 3.06142 7.32797 3.04541C7.43402 3.04541 7.54306 3.04541 7.66811 3.04541C7.66811 3.24049 7.66811 3.42956 7.66811 3.61764C7.66911 3.87674 7.74114 3.94977 7.99424 3.95077C8.15731 3.95277 8.32237 3.95277 8.50545 3.95277Z"
                                            fill="#9B9DA8" />
                                    </svg>
                                    <input type="text" class="form-control" id="church_address" placeholder="Church Address" required>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="input-icon-wrapper">
                                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M10.8108 13.2025C10.8108 13.1193 10.8083 13.0448 10.8116 12.9707C10.8153 12.8834 10.7495 12.8358 10.69 12.8375C10.6275 12.8391 10.5683 12.8896 10.5716 12.9707C10.5749 13.0448 10.5724 13.1193 10.5724 13.2012C9.96365 13.1665 9.43889 12.9471 8.99855 12.5329C8.51642 12.0793 8.26356 11.5173 8.2168 10.8522C8.29584 10.8522 8.36744 10.8531 8.43903 10.8518C8.49573 10.851 8.54539 10.8315 8.57105 10.7773C8.6083 10.6979 8.5487 10.6093 8.45848 10.6081C8.38109 10.6068 8.30371 10.6076 8.21845 10.6076C8.24742 10.0908 8.41255 9.626 8.72873 9.22084C9.19472 8.62366 9.81342 8.30914 10.5724 8.25244C10.5724 8.33645 10.5753 8.41467 10.5716 8.49289C10.5683 8.56241 10.6246 8.6158 10.6924 8.62201C10.7529 8.62739 10.8108 8.55869 10.8112 8.49165C10.8112 8.41467 10.8112 8.33728 10.8112 8.25492C11.3653 8.28762 11.857 8.47302 12.2779 8.82852C12.8254 9.2912 13.1168 9.88631 13.1668 10.6076C13.0832 10.6076 13.0063 10.6072 12.9293 10.6076C12.8494 10.6085 12.796 10.6656 12.8018 10.743C12.806 10.8001 12.8689 10.8502 12.94 10.8514C13.012 10.8522 13.0841 10.8518 13.1648 10.8518C13.1341 11.3948 12.9541 11.8773 12.6094 12.2928C12.1446 12.854 11.5445 13.1553 10.8108 13.2025ZM10.8108 9.74395C10.8108 9.57096 10.8108 9.39797 10.8108 9.22498C10.8108 9.1716 10.7839 9.13269 10.7351 9.11242C10.6556 9.08014 10.5724 9.13973 10.5724 9.22995C10.5724 9.57344 10.5724 9.91694 10.5724 10.2604C10.5724 10.2795 10.5766 10.2989 10.5497 10.3076C10.4785 10.3304 10.4201 10.3726 10.3684 10.4268C10.26 10.541 10.2219 10.6759 10.2571 10.8274C10.3059 11.0368 10.4868 11.18 10.6945 11.1771C10.8745 11.1746 11.0322 11.0732 11.1088 10.8895C11.1212 10.8593 11.1352 10.8526 11.165 10.8531C11.4179 10.8543 11.6712 10.8543 11.924 10.8531C12.0122 10.8526 12.0681 10.8001 12.0656 10.7227C12.0635 10.6557 12.0068 10.6093 11.9245 10.6093C11.6687 10.6093 11.4134 10.6089 11.1576 10.6097C11.1315 10.6097 11.1212 10.6023 11.1104 10.577C11.0583 10.4525 10.9738 10.3589 10.8439 10.3126C10.8199 10.3039 10.81 10.2906 10.8104 10.2637C10.8116 10.0899 10.8108 9.91694 10.8108 9.74395Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M4.75559 7.52002C5.61184 7.52002 6.46396 7.52002 7.31772 7.52002C7.31772 8.38165 7.31772 9.24121 7.31772 10.1041C7.30283 10.1049 7.28875 10.1057 7.2751 10.1057C6.56576 10.1057 5.85643 10.1053 5.14709 10.107C5.11192 10.107 5.10033 10.0942 5.09329 10.0631C5.03991 9.8297 4.98197 9.59753 4.93272 9.3633C4.90334 9.22259 4.88596 9.0794 4.86485 8.93703C4.84581 8.80915 4.8276 8.68086 4.81271 8.55257C4.80194 8.46069 4.79739 8.36841 4.79077 8.27612C4.78084 8.13872 4.77173 8.00091 4.7618 7.8631C4.7618 7.86186 4.7618 7.86062 4.7618 7.85896C4.75932 7.75715 4.75642 7.65535 4.75435 7.55354C4.75311 7.54319 4.75477 7.53285 4.75559 7.52002Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M4.75195 7.26988C4.75526 7.19621 4.75775 7.12461 4.76147 7.05343C4.77058 6.87879 4.77968 6.70456 4.79003 6.53033C4.79541 6.43804 4.80203 6.34575 4.81155 6.25388C4.82148 6.1587 4.83431 6.06351 4.84797 5.96874C4.867 5.83672 4.8848 5.7047 4.90839 5.5731C4.93612 5.41791 4.96633 5.26272 5.00026 5.10876C5.02923 4.97716 5.0673 4.84763 5.09752 4.71644C5.10496 4.68457 5.12028 4.68457 5.14387 4.68457C5.4886 4.68498 5.83375 4.68457 6.17849 4.68457C6.54184 4.68457 6.90479 4.68457 7.26815 4.68457C7.28346 4.68457 7.29918 4.68457 7.31739 4.68457C7.31739 5.54744 7.31739 6.407 7.31739 7.26946C6.46528 7.26988 5.61234 7.26988 4.75195 7.26988Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M10.1236 7.27115C9.26732 7.27115 8.41769 7.27115 7.56641 7.27115C7.56641 6.40993 7.56641 5.54996 7.56641 4.6875C8.30016 4.6875 9.03391 4.6875 9.7747 4.6875C10.0073 5.52968 10.1145 6.39172 10.1236 7.27115Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M4.51684 7.52051C4.51684 7.53872 4.51643 7.55444 4.51684 7.56976C4.52595 7.78909 4.53423 8.00802 4.54457 8.22736C4.54954 8.32751 4.55616 8.42766 4.56692 8.52698C4.5814 8.65817 4.60003 8.78895 4.61865 8.91973C4.63686 9.04719 4.65507 9.17424 4.67742 9.30088C4.70059 9.43207 4.72708 9.56243 4.75563 9.69238C4.78543 9.82895 4.81978 9.96469 4.8533 10.1062C4.84047 10.1062 4.82682 10.1062 4.81316 10.1062C4.10879 10.1062 3.40442 10.1062 2.70005 10.1066C2.6744 10.1066 2.65619 10.1025 2.64253 10.0777C2.53327 9.87613 2.43147 9.67086 2.34663 9.45814C2.22827 9.16224 2.13101 8.85972 2.06894 8.54685C2.03955 8.39869 2.01348 8.24929 1.99362 8.09948C1.97582 7.96415 1.96837 7.82758 1.9572 7.69143C1.95265 7.63556 1.95058 7.57969 1.94727 7.52092C2.806 7.52051 3.65811 7.52051 4.51684 7.52051Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M4.85459 4.68489C4.62946 5.53535 4.51979 6.39449 4.514 7.2702C3.65982 7.2702 2.80729 7.2702 1.95187 7.2702C1.95104 7.26275 1.94856 7.2553 1.94939 7.24785C1.95808 7.1088 1.96677 6.96933 1.97629 6.83028C1.99325 6.58652 2.04374 6.34814 2.0963 6.11018C2.12113 5.99761 2.1559 5.88753 2.18859 5.77703C2.28419 5.45423 2.41703 5.14633 2.56809 4.84629C2.59209 4.7987 2.61899 4.75235 2.64713 4.70724C2.65375 4.69648 2.67031 4.6911 2.68314 4.6853C2.68852 4.68282 2.69597 4.68489 2.70259 4.68489C3.40406 4.68489 4.10553 4.68489 4.807 4.68489C4.82107 4.68489 4.83514 4.68489 4.85459 4.68489Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M12.9338 7.27104C12.0775 7.27104 11.2258 7.27104 10.372 7.27104C10.3704 7.26649 10.3679 7.26194 10.3675 7.25697C10.3646 7.15227 10.3646 7.04798 10.3592 6.94328C10.3522 6.80422 10.3414 6.66476 10.3323 6.5257C10.3273 6.45162 10.3244 6.37713 10.317 6.30347C10.3067 6.2058 10.2934 6.10813 10.2798 6.01088C10.2607 5.87348 10.2442 5.73567 10.2202 5.5991C10.1875 5.41328 10.1502 5.22788 10.1113 5.04289C10.0873 4.92867 10.0563 4.8161 10.0285 4.70271C10.0277 4.69898 10.0294 4.69526 10.0302 4.68657C10.0439 4.68574 10.0575 4.6845 10.0712 4.6845C10.7768 4.6845 11.4824 4.6845 12.188 4.68408C12.2083 4.68408 12.2236 4.68532 12.2348 4.70809C12.2902 4.82024 12.3519 4.92908 12.4044 5.04247C12.4686 5.18194 12.5303 5.32265 12.5853 5.46584C12.671 5.68766 12.7405 5.91486 12.7906 6.14703C12.8274 6.31795 12.8576 6.49011 12.8829 6.6631C12.9015 6.79015 12.9089 6.91886 12.9197 7.04715C12.9259 7.12123 12.9288 7.19489 12.9338 7.27104Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M7.31567 12.8879C7.23828 12.8717 7.16462 12.8593 7.09219 12.8407C6.87327 12.7844 6.67876 12.6776 6.50246 12.5394C6.41059 12.467 6.32119 12.3896 6.23967 12.3056C6.06875 12.1297 5.91935 11.936 5.79395 11.7254C5.70415 11.5747 5.61269 11.4232 5.53944 11.2643C5.43763 11.0437 5.35072 10.8165 5.25968 10.591C5.23112 10.5202 5.20877 10.4466 5.18394 10.3741C5.18146 10.3671 5.18063 10.3597 5.17773 10.3477C5.89121 10.3477 6.6022 10.3477 7.31567 10.3477C7.31567 11.1907 7.31567 12.0341 7.31567 12.8879Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M7.31804 1.91231C7.31804 2.75573 7.31804 3.59584 7.31804 4.4376C6.60581 4.4376 5.89523 4.4376 5.17969 4.4376C5.18838 4.40946 5.19541 4.38256 5.20493 4.3569C5.28108 4.15495 5.35102 3.9505 5.43545 3.75227C5.54098 3.50396 5.66099 3.26186 5.8137 3.0388C5.91427 2.89188 6.01607 2.74538 6.12864 2.60798C6.23748 2.47472 6.36453 2.35761 6.50193 2.25249C6.66995 2.12378 6.85039 2.02032 7.05359 1.96031C7.12312 1.94003 7.19471 1.9272 7.26589 1.91272C7.28203 1.90941 7.29941 1.91231 7.31804 1.91231Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M7.56641 1.9043C7.64628 1.92085 7.72284 1.93368 7.79775 1.9523C7.94549 1.98955 8.07999 2.05742 8.20994 2.13564C8.36472 2.22917 8.50377 2.3438 8.62668 2.47458C8.73511 2.59004 8.83775 2.71213 8.93252 2.83876C9.10095 3.06473 9.23876 3.30972 9.35961 3.56424C9.46472 3.78648 9.55991 4.01285 9.63606 4.24709C9.65634 4.30958 9.67868 4.37166 9.70145 4.43746C8.98673 4.43746 8.27822 4.43746 7.56682 4.43746C7.56641 3.59735 7.56641 2.75765 7.56641 1.9043Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M10.1256 7.521C10.119 7.70681 10.1128 7.88932 10.1066 8.06769C9.03267 8.35697 8.34527 9.03154 8.03943 10.1034C7.88797 10.1034 7.72863 10.1034 7.56641 10.1034C7.56641 9.24384 7.56641 8.38387 7.56641 7.521C8.41604 7.521 9.26649 7.521 10.1256 7.521Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M2.80273 10.3467C3.51579 10.3467 4.21809 10.3467 4.92329 10.3467C4.95474 10.4427 4.98288 10.5412 5.01889 10.6368C5.0851 10.8118 5.15173 10.9865 5.2254 11.1586C5.35659 11.4649 5.51468 11.7571 5.70836 12.0286C5.79195 12.1457 5.883 12.2582 5.97612 12.3683C6.10441 12.5202 6.25008 12.6547 6.41231 12.7698C6.41811 12.7739 6.42224 12.7805 6.42473 12.7896C5.68104 12.6497 4.99488 12.37 4.36749 11.9474C3.73886 11.5241 3.21907 10.9931 2.80273 10.3467Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M12.0644 4.43952C12.049 4.43952 12.0354 4.43952 12.0213 4.43952C11.3459 4.43952 10.6705 4.4391 9.99512 4.44035C9.96408 4.44035 9.95043 4.43207 9.93966 4.40186C9.85979 4.17548 9.78571 3.94621 9.69301 3.72522C9.60983 3.5274 9.50802 3.33744 9.40953 3.14624C9.30524 2.94305 9.17487 2.75599 9.03541 2.57596C8.92657 2.43567 8.80779 2.30365 8.67164 2.18777C8.59839 2.1257 8.52513 2.06362 8.45312 2.00237C8.58928 1.98292 9.49478 2.2813 9.86021 2.46422C10.3092 2.68894 10.7173 2.97284 11.1022 3.29523C11.3132 3.47277 12.0155 4.27522 12.0644 4.43952Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M6.42713 1.99609C6.30959 2.09997 6.19123 2.19433 6.08529 2.30069C5.89451 2.4923 5.72855 2.70501 5.59157 2.93842C5.48356 3.12259 5.37927 3.30923 5.28491 3.50084C5.20917 3.65438 5.14668 3.81537 5.08502 3.97553C5.02625 4.12782 4.97618 4.28343 4.92196 4.43779C4.21966 4.43779 3.51737 4.43779 2.80762 4.43779C3.19125 3.83978 3.66801 3.33862 4.2416 2.93015C4.90127 2.46084 5.62882 2.1488 6.42713 1.99609Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M10.3486 8.02954C10.3544 7.86152 10.3606 7.69225 10.3664 7.52051C11.2214 7.52051 12.0744 7.52051 12.9269 7.52051C12.9596 7.7204 12.8085 8.71322 12.7146 8.91352C12.0719 8.23688 11.2872 7.94015 10.3486 8.02954Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M8.82906 12.7113C8.41107 12.8202 7.9935 12.8744 7.56641 12.8885C7.56641 12.0417 7.56641 11.1954 7.56641 10.3462C7.70836 10.3462 7.85072 10.3462 7.99515 10.3462C7.89252 11.2662 8.16607 12.0525 8.82906 12.7113Z"
                                            fill="#9B9DA8" />
                                        <path
                                            d="M10.6899 10.9324C10.5856 10.9407 10.4825 10.8467 10.4854 10.7288C10.4883 10.6063 10.5711 10.5252 10.6903 10.5239C10.8049 10.5227 10.8926 10.6009 10.8976 10.7267C10.9026 10.8422 10.797 10.9432 10.6899 10.9324Z"
                                            fill="#9B9DA8" />
                                    </svg>
									 <select id="timezone" name="timezone"  class="form-control">
                                         <?php 
                                                $db = db_connect();  
                                                $sql = "SELECT * FROM time_zone_new";
                                                $query =$db->query($sql);                                   
                                                //  $row =$query->getResultArray(); 
                                                //  var_dump($row);
                                                //  exit;
                                                
                                                 foreach ($query->getResultArray() as $row){ ?>
                                             <option value="<?php echo $row['value']; ?>">
                                                <?php echo $row['title']; ?>
                                             </option>
                                             <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <svg style="margin-top: 25px;" xmlns="http://www.w3.org/2000/svg" width="55" height="6"
                                viewBox="0 0 55 6" fill="none">
                                <rect x="17" width="38" height="6" rx="3" fill="#FF003D" />
                                <rect width="12" height="6" rx="3" fill="#BCB7B7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="step-content" id="step3">
                    <div class="verification-card1" style="width: 580px;padding-top: 30px;padding-bottom: -60px;">
                        <div class="modal-dialog custom-modal-dialog p-0"
                            style="border: 0; background-color: transparent;box-shadow: none;">
                            <div class="modal-content b-0 p-0"
                                style="box-shadow: none;border: 0; background-color: transparent;">
                                <div class="modal-body text-center p-0">
                                    <h2 class="fw-bolder mb-4" id="pricingModalLabel"
                                        style="font-weight: 700; margin-top: -30px">
                                        Choose a Plan
                                    </h2>
                                    <div style=" border-radius: 54px" class="tabs">
                                        <div class="tab-item active" id="monthly-tab">Monthly</div>
                                        <div class="tab-item" id="yearly-tab">Yearly -20%</div>
                                    </div>
                                    <div class="tab-content mt-1" id="pricingTabContent" style="margin-bottom: -45px;">
                                        <div class="tab-pane fade show active" id="monthly" role="tabpanel"
                                            aria-labelledby="monthly-tab">
                                            <div class="plan-container">
                                            <?php foreach($plans as $plan){ ?>
											<?php if($plan['pm_id'] == 1){ ?>
												<div class="plan-card current-plan">
												  <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
													<?php if($current_plan == $plan['pm_title']) { ?>
														<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
													<?php } else { ?>
														<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
													<?php } ?>
												 </div>
												  <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free-logo.svg" alt="" />
												  <h1 class="mt-3 plan-head" style=" font-weight: bolder">
												   <?php echo   $plan['pm_title'] ?>
												  </h1>
												  <div class="d-flex justify-content-center align-items-center mt-4">
												  <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free$0.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/month per user.svg"
													  alt="" class="mx-2 mt-2" />
												  </div>
												  <p style="
														  font-size: 12.5px;
														  font-weight: 600;
														  margin-top: 20px;
														">
													Unlock the power of our platform with our Basic Plan -
													designed for those who want to get started without
													breaking the bank.
												  </p>
													<a href="<?php echo base_url(); ?>/payment/<?php echo $plan['pm_id']; ?>/m" 
													   class="btn plan-btn <?php if($current_plan == $plan['pm_title']) { echo 'disabled'; } ?>">
														<?php echo $plan['pm_title']; ?> PLAN
													</a>
												</div>
											 <?php } ?>
											 <?php if($plan['pm_id'] == 2){ ?>
												<div class="plan-card recommended">
												  <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
													<?php if($current_plan == $plan['pm_title']) { ?>
														<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
													<?php } else { ?>
														<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
													<?php } ?>
												 </div>
												  <img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro-logo.svg" alt="" />
												  <h1 class="mt-3 plan-head" style="font-weight: bolder">
													 <?php echo   $plan['pm_title'] ?>
												  </h1>
												  <div class="d-flex justify-content-center align-items-center mt-4">
													<img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro$11.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/month per user.svg"
													  alt="" class="mx-2 mt-2" />
												  </div>
												  <p style="
														  font-size: 12.5px;
														  font-weight: 600;
														  margin-top: 20px;
														">
													Unlock the power of our platform with our Pro Plan -
													designed for those who want to get the most without
													breaking the bank.
												  </p>
													<button id="goToStepFiveBtn" data-interval = "m"  data-id="<?php echo $plan['pm_id']; ?>" class="btn btn-solid">PRO PLAN</button>
												</div>
												<?php } ?>
											<?php } ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="yearly" role="tabpanel"
                                            aria-labelledby="yearly-tab">
                                            <div class="plan-container">
                                                <?php foreach($plans as $plan){ ?>
													<?php if($plan['pm_id'] == 1){ ?>
														<div class="plan-card current-plan">
														 <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
															<?php if($current_plan == $plan['pm_title']) { ?>
																<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
															<?php } else { ?>
																<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
															<?php } ?>
														 </div>
														  <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free-logo.svg" alt="" />
														  <h1 class="mt-3 plan-head" style=" font-weight: bolder">
															<?php echo   $plan['pm_title'] ?>
														  </h1>
														  <div class="d-flex justify-content-center align-items-center mt-4">
															<img src="<?php echo base_url(); ?>/public/Dashboard/assets/free$0.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/Year per user.svg"
															  alt="" class="mx-2 mt-2" />
														  </div>
														  <p style="
																  font-size: 12.5px;
																  font-weight: 600;
																  margin-top: 20px;
																">
															Unlock the power of our platform with our Basic Plan -
															designed for those who want to get started without
															breaking the bank.
														  </p>
															<a href="<?php echo base_url(); ?>/payment/<?php echo $plan['pm_id']; ?>/y" 
															   class="btn plan-btn <?php if($current_plan == $plan['pm_title']) { echo 'disabled'; } ?>">
																<?php echo $plan['pm_title']; ?> PLAN
															</a>
														</div>
													<?php } ?>
												   <?php if($plan['pm_id'] == 2){ ?>
														<div class="plan-card recommended">
														  <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
															<?php if($current_plan == $plan['pm_title']) { ?>
																<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
															<?php } else { ?>
																<img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
															<?php } ?>
														  </div>
														  <img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro-logo.svg" alt="" />
														  <h1 class="mt-3 plan-head" style=" font-weight: bolder">
															PRO
														  </h1>
														  <div class="d-flex justify-content-center align-items-center mt-4">
															<img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro$8.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/Year per user.svg"
															  alt="" class="mx-2 mt-2" />
														  </div>
														  <p style="
																  font-size: 12.5px;
																  font-weight: 600;
																  margin-top: 20px;
																">
															Unlock the power of our platform with our Pro Plan -
															designed for those who want to get the most without
															breaking the bank.
														  </p>
														    <button id="goToStepFiveBtn2" data-interval = "y" data-id="<?php echo $plan['pm_id']; ?>" class="btn btn-solid">PRO
                                                        PLAN</button>
														</div> 
													<?php } ?>
												<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Step 4: Payment -->
				<form
				role="form"
				action="<?php echo base_url('/stripe/create-charge'); ?>"
				method="post"
				class="require-validation"
				data-cc-on-file="false"
				data-stripe-publishable-key="<?php echo getenv("stripe.key") ?>"
				id="payment-form">
					<div class="step-content" id="step4">
						<div class="verification-card4">
							<h2 style="
							margin-bottom: 15px;
							color: #000;
							font-family: Manrope;
							font-size: 25px;
							font-style: normal;
							font-weight: 800;
							line-height: normal;
							text-transform: capitalize;
							">Checkout</h2>
							<div class="form-group mb-0">
								<div class="input-icon-wrapper">
									<!-- Card Icon SVG -->
									<svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
										viewBox="0 0 13 13" fill="none">
										<path
											d="M12.9994 5.11865C12.9994 6.74899 12.9994 8.37899 12.9994 10.0093C12.9916 10.033 12.9804 10.056 12.976 10.0801C12.7712 11.2829 11.8372 12.0757 10.6202 12.0757C7.87987 12.0764 5.13917 12.076 2.39882 12.075C2.27661 12.075 2.15338 12.0709 2.03253 12.0543C0.886286 11.8983 0.0271103 10.9156 0.0260948 9.75983C0.0247407 8.26084 0.0257562 6.76185 0.0257562 5.26286C0.0257562 5.21818 0.0257562 5.17349 0.0257562 5.12001C0.0921071 5.12001 0.142209 5.12001 0.19231 5.12001C2.47668 5.12001 4.76104 5.12001 7.04575 5.12001C9.03018 5.12001 11.0146 5.11933 12.9994 5.11865ZM3.49868 9.75644C3.72617 9.75644 3.954 9.75881 4.18149 9.75577C4.39137 9.75272 4.56774 9.62814 4.63071 9.44669C4.73091 9.15725 4.53694 8.8475 4.22922 8.84006C3.74073 8.82821 3.2519 8.83667 2.76307 8.83836C2.72617 8.83836 2.68792 8.84784 2.65271 8.86003C2.43808 8.93484 2.32231 9.13356 2.35345 9.36951C2.38121 9.58109 2.57112 9.74866 2.80335 9.75475C3.03524 9.76084 3.26713 9.7561 3.49868 9.75644Z"
											fill="#9B9DA8" />
										<path
											d="M12.9995 4.20651C12.9406 4.20482 12.8814 4.20211 12.8225 4.20211C8.61699 4.20177 4.41149 4.20177 0.205999 4.20177C0.151835 4.20177 0.0976707 4.20177 0.0259034 4.20177C0.0259034 4.12662 0.0245493 4.06061 0.0262419 3.99493C0.0336895 3.64084 0.0160862 3.28369 0.0553551 2.93298C0.162329 1.97597 0.97445 1.14286 1.92503 0.990525C2.07838 0.965813 2.23546 0.950579 2.3905 0.950241C5.13932 0.947871 7.88814 0.947871 10.637 0.948887C11.7951 0.949225 12.7216 1.70346 12.9609 2.83481C12.9721 2.88694 12.9867 2.9384 12.9999 2.99019C12.9995 3.39541 12.9995 3.80096 12.9995 4.20651Z"
											fill="#9B9DA8" />
									</svg>

									<!-- Card Number Input -->
									<input type="text"  data-label="Card Number" id="cardNumberInput" class="card-number required form-control" placeholder="Card Number" required>
									
									<input type='hidden' name='userid'  id='userid' value=''>
									<input type='hidden' name='planid'  id='planid' value=''>
									<input type='hidden' name='interval' id='interval' value=''>
									<input type='hidden' name='amount' id='amount' value='0'>

									<!-- Card Logos -->
									<div class="card-logos">
										<img src="<?php echo base_url(); ?>/public/Onboarding/assets/visa.svg" class="card-logo visa" alt="Visa">
										<img src="<?php echo base_url(); ?>/public/Onboarding/assets/mastercard.svg" class="card-logo mastercard" alt="MasterCard">
										<img src="<?php echo base_url(); ?>/public/Onboarding/assets/wise.svg" class="card-logo wise" alt="Wise">
										<img src="<?php echo base_url(); ?>/public/Onboarding/assets/gpay.svg" class="card-logo googlepay" alt="Google Pay">
									</div>
								</div>
							</div>
							<div class="form-group mb-0">
								<div class="d-flex align-items-center justify-content-between">
									<div class="input-icon-wrapper" style="width: 46.5%;">
										<svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="11" height="11"
											viewBox="0 0 11 11" fill="none">
											<path
												d="M0.321297 3.48047C3.77856 3.48047 7.22523 3.48047 10.6911 3.48047C10.6911 3.52487 10.6911 3.56927 10.6911 3.61396C10.6911 5.50057 10.6911 7.38719 10.6911 9.27352C10.6911 9.81378 10.3296 10.2415 9.7919 10.3337C9.7114 10.3474 9.6289 10.3549 9.54726 10.3549C6.77807 10.356 4.00916 10.3558 1.23997 10.3558C0.696843 10.3558 0.333901 9.9994 0.322442 9.45341C0.318718 9.27495 0.32101 9.0962 0.32101 8.91745C0.32101 7.14885 0.32101 5.38026 0.32101 3.61138C0.321297 3.56956 0.321297 3.52773 0.321297 3.48047ZM7.95656 4.67328C7.82794 4.67328 7.69932 4.67185 7.5707 4.67357C7.41114 4.67557 7.30773 4.7618 7.30343 4.91849C7.2957 5.19349 7.29598 5.46878 7.30286 5.74378C7.30687 5.89875 7.40083 5.98641 7.55723 5.98927C7.8288 5.99385 8.10036 5.99385 8.37192 5.98841C8.53263 5.98526 8.61627 5.89904 8.61856 5.73977C8.62229 5.47193 8.62229 5.2038 8.61856 4.93568C8.61656 4.77755 8.51143 4.67701 8.3533 4.67385C8.22096 4.67156 8.08861 4.67357 7.95656 4.67328ZM8.61942 8.24169C8.61942 8.11336 8.62114 7.98503 8.61914 7.85669C8.61627 7.6831 8.52145 7.58484 8.347 7.58255C8.08661 7.57911 7.82622 7.57883 7.56611 7.58284C7.39854 7.58513 7.30486 7.67307 7.30114 7.83979C7.29513 8.10706 7.29484 8.37461 7.30171 8.64187C7.30601 8.80917 7.40856 8.89826 7.57929 8.8994C7.83596 8.90112 8.09291 8.90112 8.34958 8.8994C8.52833 8.89797 8.61627 8.80802 8.61914 8.62698C8.62114 8.49836 8.61942 8.37003 8.61942 8.24169ZM2.1638 5.3244C2.1638 5.45646 2.16208 5.58852 2.16408 5.72029C2.16666 5.88385 2.25747 5.98526 2.41932 5.9887C2.68315 5.99414 2.94726 5.99385 3.21109 5.98755C3.37294 5.98383 3.47721 5.87956 3.48093 5.71484C3.48695 5.45102 3.48637 5.1869 3.4795 4.92307C3.47549 4.76695 3.37351 4.67529 3.2171 4.67385C2.95671 4.67156 2.69632 4.67185 2.43565 4.67385C2.26692 4.675 2.16637 4.77841 2.1638 4.95C2.16236 5.0749 2.1638 5.19979 2.1638 5.3244ZM2.1638 8.23367C2.1638 8.362 2.16265 8.49062 2.16408 8.61896C2.16609 8.79542 2.26721 8.89797 2.44338 8.8994C2.68945 8.90112 2.9358 8.90112 3.18187 8.8994C3.35947 8.89797 3.47721 8.7937 3.4815 8.61925C3.48781 8.35914 3.48695 8.09846 3.48122 7.83807C3.47778 7.67651 3.38554 7.58599 3.22541 7.58341C2.95786 7.57911 2.69031 7.57911 2.42276 7.58341C2.26148 7.58599 2.16752 7.68682 2.16437 7.84839C2.16179 7.97672 2.1638 8.10534 2.1638 8.23367ZM5.38445 5.99042C5.5165 5.99042 5.64856 5.99443 5.78033 5.98956C5.95278 5.98325 6.02841 5.90992 6.03156 5.73805C6.03643 5.47078 6.03643 5.20323 6.03184 4.93568C6.02898 4.76753 5.92872 4.67471 5.75999 4.67385C5.50333 4.67214 5.24637 4.67214 4.98971 4.67385C4.81955 4.675 4.71757 4.77669 4.71614 4.94742C4.71442 5.20409 4.71442 5.46104 4.71614 5.71771C4.71729 5.88672 4.80953 5.98383 4.97825 5.98984C5.11317 5.99471 5.24895 5.9907 5.38445 5.99042ZM5.37242 8.89969C5.50104 8.89969 5.62966 8.90083 5.75828 8.8994C5.94333 8.8974 6.02898 8.81776 6.03213 8.63328C6.03643 8.3726 6.03614 8.11164 6.03242 7.85068C6.02984 7.67565 5.93989 7.58513 5.76716 7.58255C5.50648 7.57883 5.24551 7.57883 4.98455 7.58255C4.8101 7.58513 4.717 7.68396 4.71585 7.85984C4.71442 8.11365 4.71442 8.36716 4.71585 8.62096C4.717 8.79685 4.81927 8.89711 4.99716 8.8994C5.12205 8.90083 5.24723 8.89969 5.37242 8.89969Z"
												fill="#9B9DA8" />
											<path
												d="M10.6532 2.79786C7.20539 2.79786 3.76961 2.79786 0.321225 2.79786C0.321225 2.70075 0.321225 2.60908 0.321225 2.51742C0.321511 2.20289 0.318074 1.88835 0.322944 1.57411C0.329246 1.16419 0.580183 0.80726 0.930235 0.701844C0.981225 0.686375 1.03451 0.669474 1.08664 0.669187C1.42953 0.666323 1.77214 0.667755 2.12763 0.667755C2.12964 0.712156 2.13307 0.753406 2.13307 0.794656C2.13422 1.08054 2.13107 1.36643 2.13651 1.65203C2.13909 1.79382 2.23133 1.90182 2.36482 1.94278C2.48742 1.98031 2.63409 1.93934 2.7057 1.82562C2.74495 1.76346 2.76643 1.68039 2.76844 1.60619C2.7756 1.33492 2.7713 1.06307 2.7713 0.791505C2.7713 0.75312 2.7713 0.715021 2.7713 0.671193C4.49836 0.671193 6.21224 0.671193 7.93987 0.671193C7.94216 0.707573 7.94617 0.744812 7.94617 0.782052C7.94703 1.06794 7.94474 1.35382 7.94818 1.63971C7.9499 1.78867 8.03784 1.89895 8.17563 1.94192C8.29823 1.98031 8.44375 1.9402 8.5168 1.82648C8.55662 1.7646 8.57896 1.68153 8.58096 1.60734C8.58841 1.33606 8.58412 1.06421 8.58412 0.792651C8.58412 0.753979 8.58412 0.715594 8.58412 0.665463C8.84537 0.665463 9.0943 0.666609 9.34323 0.665177C9.53974 0.664031 9.73682 0.657729 9.92445 0.731635C10.2822 0.872573 10.5501 1.09887 10.6417 1.49132C10.6466 1.51223 10.6529 1.53343 10.6529 1.55434C10.6532 1.96512 10.6532 2.37591 10.6532 2.79786Z"
												fill="#9B9DA8" />
										</svg>
										<input type="expiry date"  id="expiryDateInput" data-label="Expiry Date" class="form-control required"  name="expirydate"  placeholder="Expiry Date" required>
									</div>
									<div class="input-icon-wrapper" style="width: 46.5%;">
										<svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="13" height="14"
											viewBox="0 0 13 14" fill="none">
											<path
												d="M12.1325 4.77783C12.1325 6.29948 12.1325 7.82081 12.1325 9.34246C12.1252 9.36457 12.1148 9.38606 12.1107 9.40849C11.9195 10.5311 11.0478 11.2711 9.91195 11.2711C7.35429 11.2717 4.7963 11.2714 2.23863 11.2704C2.12457 11.2704 2.00957 11.2666 1.89677 11.2511C0.82694 11.1055 0.0250426 10.1883 0.0240947 9.1096C0.0228309 7.71054 0.0237787 6.31149 0.0237787 4.91243C0.0237787 4.87072 0.0237787 4.82902 0.0237787 4.7791C0.0857062 4.7791 0.132468 4.7791 0.179229 4.7791C2.3113 4.7791 4.44338 4.7791 6.57577 4.7791C8.42791 4.7791 10.28 4.77846 12.1325 4.77783ZM3.26518 9.10644C3.4775 9.10644 3.69014 9.10865 3.90246 9.1058C4.09835 9.10296 4.26297 8.98669 4.32173 8.81734C4.41526 8.54719 4.23422 8.25809 3.94701 8.25114C3.49109 8.24008 3.03484 8.24798 2.5786 8.24956C2.54416 8.24956 2.50846 8.25841 2.4756 8.26978C2.27528 8.33961 2.16723 8.52508 2.1963 8.7453C2.2222 8.94277 2.39946 9.09917 2.6162 9.10486C2.83263 9.11054 3.04906 9.10612 3.26518 9.10644Z"
												fill="#9B9DA8" />
											<path
												d="M12.1326 3.92679C12.0777 3.92521 12.0224 3.92269 11.9674 3.92269C8.04226 3.92237 4.11713 3.92237 0.192005 3.92237C0.141452 3.92237 0.0908989 3.92237 0.0239161 3.92237C0.0239161 3.85223 0.0226523 3.79062 0.0242321 3.72932C0.0311831 3.39883 0.0147534 3.0655 0.0514043 2.73816C0.151247 1.84496 0.909226 1.06739 1.79643 0.925206C1.93956 0.902142 2.08616 0.887924 2.23087 0.887608C4.79644 0.885396 7.36201 0.885396 9.92757 0.886344C11.0085 0.88666 11.8732 1.59061 12.0966 2.64654C12.107 2.69519 12.1206 2.74322 12.133 2.79156C12.1326 3.16976 12.1326 3.54828 12.1326 3.92679Z"
												fill="#9B9DA8" />
											<path
												d="M1.5878 14L1.19104 13.7384L1.66049 13.2015L0.933594 13.0088L1.08503 12.5848L1.79376 12.8244L1.7665 12.1333H2.25716L2.2299 12.8244L2.93863 12.5848L3.09007 13.0088L2.36316 13.2015L2.82959 13.7384L2.43283 14L2.01183 13.4328L1.5878 14Z"
												fill="#9B9DA8" />
											<path
												d="M4.2912 14L3.89444 13.7384L4.36389 13.2015L3.63699 13.0088L3.78843 12.5848L4.49716 12.8244L4.4699 12.1333H4.96056L4.9333 12.8244L5.64203 12.5848L5.79346 13.0088L5.06656 13.2015L5.53299 13.7384L5.13622 14L4.71523 13.4328L4.2912 14Z"
												fill="#9B9DA8" />
											<path
												d="M6.9946 14L6.59783 13.7384L7.06729 13.2015L6.34039 13.0088L6.49183 12.5848L7.20056 12.8244L7.1733 12.1333H7.66395L7.6367 12.8244L8.34542 12.5848L8.49686 13.0088L7.76996 13.2015L8.23639 13.7384L7.83962 14L7.41863 13.4328L6.9946 14Z"
												fill="#9B9DA8" />
											<path
												d="M9.698 14L9.30123 13.7384L9.77069 13.2015L9.04379 13.0088L9.19523 12.5848L9.90395 12.8244L9.8767 12.1333H10.3674L10.3401 12.8244L11.0488 12.5848L11.2003 13.0088L10.4734 13.2015L10.9398 13.7384L10.543 14L10.122 13.4328L9.698 14Z"
												fill="#9B9DA8" />
										</svg>
										<input type="CVC" id="cvcInput" data-label="CSV"  name="csv" class="form-control required card-cvc"  placeholder="CVC" required>
									</div>
								</div>
							</div>
							<div class="form-group mb-0">
								<div class="input-icon-wrapper">
									<svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
										viewBox="0 0 17 17" fill="none">
										<path
											d="M4.67681 12.8653C4.59706 12.7855 4.5171 12.7056 4.43734 12.6258C4.25054 12.3418 4.23818 12.0241 4.2386 11.6969C4.24308 9.36173 4.24308 7.02674 4.23882 4.69131C4.23818 4.36058 4.24841 4.03858 4.43734 3.75113C5.46965 2.71883 6.50174 1.68674 7.53404 0.654439C7.5447 0.651454 7.55685 0.650813 7.56624 0.64527C8.06608 0.341614 8.55546 0.399402 8.96787 0.811811C9.89867 1.74261 10.8278 2.67469 11.7611 3.60293C11.9933 3.83387 12.1049 4.10661 12.1047 4.43095C12.104 6.93547 12.1053 9.44021 12.1023 11.9449C12.1023 12.0673 12.0867 12.1946 12.0516 12.3113C11.9117 12.7736 11.5037 13.0566 10.9888 13.0568C9.20244 13.0574 7.41612 13.0546 5.62979 13.0591C5.29585 13.06 4.96917 13.0549 4.67681 12.8653ZM7.93216 7.94922C7.4272 8.45418 6.9214 8.95871 6.41751 9.46473C6.25608 9.62658 6.25779 9.83897 6.41687 9.98056C6.55867 10.107 6.75144 10.0882 6.90924 9.93087C7.71231 9.12823 8.51495 8.32559 9.3178 7.52274C9.52252 7.31802 9.72787 7.11395 9.93173 6.90839C10.0351 6.80411 10.0765 6.68001 10.0266 6.53756C9.9409 6.29233 9.6447 6.23881 9.44809 6.43456C8.94165 6.93845 8.43733 7.44405 7.93216 7.94922ZM7.47156 7.48734C7.88567 7.07322 7.8861 6.40023 7.4722 5.98676C7.06022 5.57478 6.38061 5.57456 5.96927 5.9859C5.55772 6.39746 5.55857 7.07685 5.97098 7.48883C6.38445 7.90188 7.05766 7.90124 7.47156 7.48734ZM8.86786 10.3853C9.27963 10.7996 9.95582 10.8045 10.371 10.3957C10.7845 9.98866 10.7879 9.30458 10.3785 8.8926C9.96478 8.47635 9.29221 8.47294 8.8781 8.88492C8.46143 9.29989 8.45673 9.9716 8.86786 10.3853ZM8.41089 3.29309C8.54203 3.16024 8.53905 2.94743 8.4047 2.8182C8.27271 2.69132 8.06714 2.6926 7.93706 2.82097C7.80464 2.95126 7.80464 3.16408 7.93728 3.29586C8.07034 3.4285 8.27846 3.42722 8.41089 3.29309Z"
											fill="#9B9DA8" />
										<path
											d="M6.99509 6.46738C7.14799 6.62156 7.14756 6.85698 6.99381 7.01072C6.83687 7.16767 6.59889 7.16511 6.44259 7.00454C6.29204 6.85015 6.2963 6.61473 6.45197 6.46163C6.60614 6.31001 6.84135 6.31236 6.99509 6.46738Z"
											fill="#9B9DA8" />
										<path
											d="M9.89381 9.36274C10.0497 9.51606 10.054 9.75191 9.90383 9.90587C9.74795 10.0656 9.50955 10.0681 9.3526 9.9112C9.19822 9.75681 9.19736 9.52267 9.35068 9.36807C9.50422 9.21326 9.73942 9.21091 9.89381 9.36274Z"
											fill="#9B9DA8" />
									</svg>
									<input type="code" class="form-control" placeholder="Discount Code (Optional)"
										id="couponCode">
									<button style="position: absolute; right: 6px;" class="apply-btn">Apply</button>
								</div>
							</div>
							<div class="text-center mb-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11"
									fill="none">
									<path
										d="M3.625 8C3.45312 8 3.30604 7.9441 3.18375 7.83229C3.06146 7.72048 3.00021 7.5859 3 7.42857V4.57143C3 4.41429 3.06125 4.27981 3.18375 4.168C3.30625 4.05619 3.45333 4.00019 3.625 4H3.9375V3.42857C3.9375 3.03333 4.0899 2.69648 4.39469 2.418C4.69948 2.13952 5.06792 2.00019 5.5 2C5.93208 1.99981 6.30062 2.13914 6.60562 2.418C6.91062 2.69686 7.06292 3.03371 7.0625 3.42857V4H7.375C7.54687 4 7.69406 4.056 7.81656 4.168C7.93906 4.28 8.00021 4.41448 8 4.57143V7.42857C8 7.58571 7.93885 7.72029 7.81656 7.83229C7.69427 7.94429 7.54708 8.00019 7.375 8H3.625ZM5.5 6.57143C5.67187 6.57143 5.81906 6.51552 5.94156 6.40371C6.06406 6.2919 6.12521 6.15733 6.125 6C6.12479 5.84267 6.06365 5.70819 5.94156 5.59657C5.81948 5.48495 5.67229 5.42895 5.5 5.42857C5.32771 5.42819 5.18062 5.48419 5.05875 5.59657C4.93687 5.70895 4.87562 5.84343 4.875 6C4.87437 6.15657 4.93562 6.29114 5.05875 6.40371C5.18187 6.51629 5.32896 6.57219 5.5 6.57143ZM4.5625 4H6.4375V3.42857C6.4375 3.19048 6.34635 2.9881 6.16406 2.82143C5.98177 2.65476 5.76042 2.57143 5.5 2.57143C5.23958 2.57143 5.01823 2.65476 4.83594 2.82143C4.65365 2.9881 4.5625 3.19048 4.5625 3.42857V4Z"
										fill="#9B9DA8" />
									<circle cx="5.5" cy="5.5" r="5" stroke="#9B9DA8" />
								</svg>
								<small style="
									color: #818181;
									font-family: Manrope;
									font-size: 10px;
									font-style: normal;
									font-weight: 500;
									line-height: normal;
								">100% Safe And Secure Payment</small>
							</div>
							<div class="d-flex align-items-center justify-content-between mt-">
								<div class="text-center">
									<small style="
									color: #777;
									font-family: Manrope;
									font-size: 10px;
									font-style: normal;
									font-weight: 600;
									line-height: normal;
									">You'll Pay After 14 Day Trial Period (Cancel Anytime)</small>
								</div>
								<h6 id="total-payment" style="
									color: #000;
									font-family: Manrope;
									font-size: 14px;
									font-style: normal;
									font-weight: 800;
									line-height: normal;
								">$0.00</h6>
							</div>
						</div>

					</div>
					
				</form>

                <!-- Back and Next Buttons -->
                <div class="btn-container">
                    <button class="btn prev" id="prevBtn" onclick="nextPrev(-1)" disabled>Previous</button>
                    <button class="btn next" id="nextBtn" onclick="nextPrev(1)" disabled>Verify Email</button>
					<button style="display:none" id="pay-btn">Pay button</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment Confirmation Modal -->
    <div class="modal fade" id="paymentConfirmationModal" tabindex="-1" aria-labelledby="paymentConfirmationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: 0 !important;">
                <div class="modal-body text-center" style="justify-content: normal;">
                    <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="105" height="102"
                        viewBox="0 0 105 102" fill="none">
                        <g clip-path="url(#clip0_1194_1418)">
                            <path
                                d="M104.003 19.7695C103.729 18.0344 102.767 16.6744 100.931 16.4858L88.2539 16.4519C77.6763 5.01431 62.2962 -1.16103 46.6979 0.182081C9.72005 3.36402 -11.2634 42.4456 6.29872 75.3157C6.64191 75.9598 7.6842 77.2774 7.79013 77.8664C7.87486 78.3409 7.3283 79.0125 7.23297 79.5633C7.03171 80.7115 7.37914 81.472 7.40668 82.4698C7.47024 84.8362 6.74784 89.0561 8.7731 90.6365C10.542 92.0178 12.2665 91.0602 14.2621 91.2911C15.7789 91.4648 17.7024 92.4203 19.4205 92.6999C20.3548 92.8503 21.9182 92.7952 22.7105 93.0092C23.3884 93.1935 25.3925 94.7294 26.2462 95.1955C61.4319 114.457 103.545 87.2618 101.46 47.7333L100.821 43.1828C102.759 43.204 103.833 41.7062 104 39.9013C104.591 33.5141 103.551 26.252 104.003 19.7695ZM8.24348 40.1131C8.29008 39.9415 8.77098 39.9839 9.02731 39.8398C10.7623 38.8569 11.6712 37.4883 12.1732 35.5669C12.3131 35.033 12.0228 34.1136 12.6923 34.2852C12.7685 36.6812 13.8362 38.6535 15.9335 39.8398C16.2577 40.022 16.8381 39.8547 16.7174 40.3207C14.0862 41.2317 12.6796 43.6234 12.6901 46.3605C12.0927 46.1465 12.3215 45.3924 12.1754 44.8649C11.453 42.2697 10.7412 41.7041 8.51676 40.4733C8.36211 40.3864 8.1312 40.5114 8.24348 40.1131ZM24.7675 92.1194H20.6365C18.6812 92.1194 16.1623 90.6619 14.2621 90.4416C12.2177 90.2044 10.0103 91.3865 8.6587 89.268C7.93418 88.1346 8.28585 84.4294 8.24771 82.8999C8.23712 82.5079 8.04434 82.1033 8.02104 81.6436C7.96808 80.5462 7.92147 79.3218 8.59938 78.4024C9.49761 77.18 10.7348 77.6397 11.936 77.4872C13.0037 77.3516 13.7388 76.7012 14.351 75.8771C15.603 74.1887 17.4525 71.0407 18.1516 69.0853C19.0413 66.5982 19.1557 63.984 18.624 61.4016C23.9646 61.408 22.6173 66.3885 22.8567 69.9836C22.8906 70.4835 23.005 71.3754 23.0876 71.8732C23.5282 74.5171 26.6826 73.5426 28.6909 73.6845C30.0256 73.782 33.555 74.5722 34.2731 75.7288C34.9235 76.7775 35.129 79.1904 33.6757 79.5251C31.7691 79.9658 27.261 80.0569 25.2866 79.8429C24.5811 79.7666 24.3862 79.4574 24.2273 78.7858C23.4308 75.4174 28.0851 75.2818 30.354 75.356L30.6018 75.1802L30.6993 74.5361H27.4156C27.2716 74.5361 26.0344 74.9111 25.7696 75.0064C23.6405 75.7733 22.6639 77.4088 23.6003 79.6226C23.774 80.0357 24.2803 80.4213 24.3205 80.6013C24.3608 80.7856 23.6956 82.0376 23.7189 82.6732C23.7528 83.6456 24.7612 84.8891 24.7675 85.2323C24.776 85.6179 24.1468 86.4398 24.1913 87.1093C24.2252 87.6241 24.7358 88.1791 24.7718 88.6367C24.8099 89.1239 24.346 89.6027 24.3269 90.3166C24.31 90.9776 24.4773 91.5369 24.7675 92.1194ZM33.9765 84.2747C32.5529 84.7938 27.9262 84.8955 26.3712 84.69C24.2782 84.4125 24.4053 82.1859 25.2188 80.7072C28.2037 80.5568 31.2289 80.9699 34.1566 80.2793C35.6607 81.2665 35.7624 83.6223 33.9765 84.2747ZM33.6227 91.3335C33.4363 92.1724 32.4173 92.469 31.6568 92.5453C30.57 92.6554 27.1021 92.3143 26.0768 91.9754C24.7887 91.5475 25.0154 89.3972 25.7526 89.1705C26.1318 89.0561 28.0766 89.5392 28.6825 89.5794C29.7904 89.6535 32.2796 89.3421 33.1058 89.6069C33.6503 89.7807 33.7371 90.8187 33.6227 91.3335ZM34.0422 88.4714C33.502 88.8231 29.9536 88.7956 29.0998 88.7405C28.5278 88.7024 25.706 88.2998 25.4497 88.0477C24.9709 87.5796 25.0493 85.6793 25.9306 85.5501C28.3414 85.192 31.2924 86.0098 33.7477 85.1666C34.1799 85.245 34.7032 86.5182 34.7032 86.9292C34.7053 87.1961 34.2011 88.3655 34.0422 88.4714ZM70.3147 83.7515C69.8444 86.4864 66.4188 89.4332 63.6224 89.5582C55.3413 89.143 46.4162 90.1768 38.2092 89.5858C37.061 89.5031 35.9976 89.1197 34.9362 88.7278C35.6755 87.5181 35.7433 86.103 34.7477 85.0226C35.9001 83.921 36.6352 82.4931 35.8281 80.953C35.6438 80.5992 34.9786 80.0378 35.0019 79.7264C35.0125 79.5823 35.4849 78.968 35.5569 78.4405C35.7052 77.3495 35.4764 75.517 34.6248 74.7416C34.0104 74.1781 31.142 73.3244 31.1124 73.1337C31.1145 66.9245 31.142 60.7152 31.1335 54.506C31.1314 53.5188 31.1335 52.5464 31.1335 51.5613C31.123 40.361 31.0997 29.2814 31.1187 18.0747C31.9597 13.7297 35.9128 11.304 40.2324 11.8294C40.2154 12.9459 39.9824 14.3674 41.4081 14.5728L60.0401 14.5834C61.3387 14.1025 61.2921 13.0539 61.2052 11.8294C64.6732 11.4778 68.6072 12.9247 69.6791 16.4901H64.9126C64.8448 16.4901 63.9084 16.9244 63.7537 17.026C62.7517 17.6934 62.3111 18.795 62.256 19.9771C62.7115 26.3939 61.6776 33.5755 62.2623 39.9013C62.3407 40.7571 62.7623 41.8926 63.3894 42.4816C63.4974 42.5833 64.4232 43.1828 64.4889 43.1828H70.3147V83.7515ZM92.6921 63.9713C90.8278 65.1598 89.9274 67.0664 89.8025 69.24C89.4847 69.2018 89.4656 68.937 89.3957 68.6955C88.6246 66.0008 88.1331 64.3336 85.1418 63.4142C86.9701 62.7892 88.2284 61.8253 88.9106 59.978C89.2008 59.1857 89.2072 58.2557 89.6987 57.5884C89.9719 58.5099 90.1033 59.5098 90.4867 60.4017C91.1011 61.8274 92.7196 63.071 94.2534 63.3104L92.6921 63.9713ZM103.151 20.727V40.3229C103.151 40.8567 102.187 42.2083 101.52 42.293C98.8504 42.3905 96.1748 42.3142 93.5013 42.3248C92.7132 42.3269 91.9781 42.3227 91.1922 42.3248C82.5001 42.3396 73.8101 42.329 65.118 42.3418C64.2791 42.4752 63.1119 40.9881 63.1119 40.3229V20.727C62.8534 18.9644 63.8999 17.3671 65.7515 17.329L100.719 17.3332C102.662 17.5324 103.282 18.9009 103.151 20.727Z"
                                fill="#FF003D" />
                            <path
                                d="M48.4444 39.6364C57.5538 38.5581 65.0532 45.6444 63.2716 54.8873C61.0938 66.1872 45.4637 68.7315 39.6315 58.7175C35.3522 51.3706 39.8815 40.6491 48.4444 39.6364ZM56.9034 46.6147C56.5666 46.6909 56.3696 46.8986 56.1154 47.0977C53.9291 48.8242 51.9547 51.6926 49.7705 53.4616C49.5354 53.6522 49.1435 54.0166 48.8469 53.9531C48.1859 53.7518 47.8936 53.0654 47.5271 52.7307C47.2983 52.521 47.0186 52.4002 46.7941 52.1926C45.6755 51.1546 44.4023 48.9386 42.8707 50.591C42.1144 51.4088 42.2288 51.9109 42.8749 52.7222C43.7202 53.7857 46.4806 56.5567 47.544 57.3765C48.6075 58.1964 49.1181 58.3383 50.1942 57.4909C52.0225 56.0482 54.1664 53.4806 55.9035 51.7604C56.5581 51.1122 57.503 50.447 58.1385 49.7585C58.9202 48.9111 59.524 47.9599 58.5664 46.9918C58.0686 46.4897 57.6025 46.46 56.9034 46.6189V46.6147Z"
                                fill="#ED1515" />
                            <path
                                d="M86.4145 33.2261V38.0986H66.2891V33.2261H86.4145ZM85.5671 34.0735H67.1365V37.2512H85.5671V34.0735Z"
                                fill="#F4BA00" />
                            <path d="M103.15 20.7271H63.1113V24.3284H103.15V20.7271Z" fill="#F4BA00" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1194_1418">
                                <rect width="104.188" height="101.53" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <h5 class="modal-title mt-3 mb-2" id="paymentConfirmationLabel" style="
                    color: #000;
                    font-family: Manrope;
                    font-size: 25px;
                    font-style: normal;
                    font-weight: 800;
                    line-height: normal;
                    text-transform: capitalize;
                    ">Payment Confirmation</h5>
                    <div class="payment-details mt-3">
                        <p><strong>Plan Title</strong> <span>PRO</span></p>
                        <p><strong>Valid For</strong> <span>1 Year</span></p>
                        <p><strong>Mobile</strong> <span>0101 718 222 222</span></p>
                        <p><strong>Email</strong> <span>larrypage@gmail.com</span></p>
                        <p><strong>Amount Paid</strong> <span id="planPrice">$0</span></p>
                        <p><strong>Transaction ID</strong> <span>Txr_1729094821</span></p>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" id="continueToDashboardBtn">CONTINUE TO
                        DASHBOARD</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script src="<?php echo base_url(); ?>/public/Dashboard/index.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cardNumberInput = document.querySelector("input[placeholder='Card Number']");
            const expiryDateInput = document.querySelector("input[placeholder='Expiry Date']");
            const cvcInput = document.querySelector("input[placeholder='CVC']");

            // Format Card Number input to include spaces (e.g., "#### #### #### ####")
            cardNumberInput.addEventListener("input", function (event) {
                // Remove non-digit characters
                let value = event.target.value.replace(/\D/g, '');
                // Limit to 16 digits
                value = value.substring(0, 16);
                // Add spaces every 4 digits
                event.target.value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
            });

            // Restrict Expiry Date input to digits only, format MM/YY, max 5 characters
            expiryDateInput.addEventListener("input", function (event) {
                let value = event.target.value.replace(/\D/g, ''); // Remove non-digits
                if (value.length >= 3) {
                    event.target.value = `${value.substring(0, 2)}/${value.substring(2, 4)}`; // Format as MM/YY
                } else {
                    event.target.value = value;
                }
                event.target.value = event.target.value.substring(0, 5); // Max 5 characters including '/'
            });

            // Restrict CVC input to digits only, max 3 or 4 digits
            cvcInput.addEventListener("input", function (event) {
                event.target.value = event.target.value.replace(/\D/g, '').substring(0, 4); // Max 4 digits (AMEX)
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cardNumberInput = document.querySelector("input[placeholder='Card Number']");
            const cardLogos = document.querySelectorAll(".card-logo");

            // Display all logos by default
            cardLogos.forEach(logo => logo.style.display = "none");

            // Detect and show relevant card logo based on card number prefix or keyword
            cardNumberInput.addEventListener("input", function () {
                const value = cardNumberInput.value.replace(/\s+/g, '').toLowerCase(); // Remove spaces and convert to lowercase

                if (value.length === 0) {
                    // If the input is empty, show all logos
                    cardLogos.forEach(logo => logo.style.display = "none");
                } else if (/^4/.test(value)) { // Visa starts with 4
                    setCardLogoVisibility("visa");
                } else if (/^5[1-5]/.test(value)) { // MasterCard starts with 51-55
                    setCardLogoVisibility("mastercard");
                } else if (value === "paypal") { // If "paypal" is typed
                    setCardLogoVisibility("paypal");
                } else if (value === "wise" || /^7/.test(value)) { // Wise detected with "wise" or prefix 7
                    setCardLogoVisibility("wise");
                } else if (/^2/.test(value)) { // Hypothetical trigger for Google Pay
                    setCardLogoVisibility("googlepay");
                } else {
                    // If card type is unknown, hide all logos
                    cardLogos.forEach(logo => logo.style.display = "none");
                }
            });

            // Function to set visibility of specific card logo
            function setCardLogoVisibility(cardType) {
                cardLogos.forEach(logo => {
                    // Show only the logo that matches the detected card type, hide others
                    if (logo.classList.contains(cardType)) {
                        logo.style.display = "inline";
                    } else {
                        logo.style.display = "none";
                    }
                });
            }
        });
    </script>

    <script>
        // Function to allow only numbers
        document.querySelectorAll('.input-box').forEach(input => {
            input.addEventListener('keypress', function (e) {
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault(); // Prevent any non-numeric input
                }
            });

            input.addEventListener('input', function (e) {
                if (isNaN(e.target.value)) {
                    e.target.value = ''; // Clear the input if it's not a number
                }
            });
        });

        document.querySelectorAll('.input-box').forEach((input, index, inputs) => {
            input.addEventListener('paste', (e) => {
                const paste = e.clipboardData.getData('text');
                const pasteArray = paste.split('');
                for (let i = 0; i < pasteArray.length; i++) {
                    if (inputs[index + i]) {
                        inputs[index + i].value = pasteArray[i];
                    }
                }
                e.preventDefault();
            });

            input.addEventListener('input', (e) => {
                if (e.target.value.length >= e.target.maxLength) {
                    if (inputs[index + 1]) {
                        inputs[index + 1].focus();
                    }
                }
            });

            // Handle backspace event to move to previous input
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '') {
                    if (inputs[index - 1]) {
                        inputs[index - 1].focus();
                    }
                } else if (e.key === 'Enter') {
                    // If Enter key is pressed, trigger "Next Step" if enabled
                    const nextBtn = document.getElementById('nextBtn');
                    if (!nextBtn.disabled) {
                        nextBtn.click();
                    }
                }
            });
        });
        // Apply Enter key functionality to all input fields across all steps
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    // If Enter key is pressed, trigger "Next Step" if enabled
                    const nextBtn = document.getElementById('nextBtn');
                    if (!nextBtn.disabled) {
                        nextBtn.click();
                    }
                }
            });
        });
    </script>
    <script>
        let currentStep = 2; // Initialize at step 2
        const totalSteps = 5;
        let currentCardIndex = 0; // For cycling through cards in step 3
        const cards = document.querySelectorAll('.verification-card'); // Get the cards in step 3

        function nextPrev(step) {
            let steps = document.querySelectorAll('.step-content'); // Steps content for data
            let stepNumbers = document.querySelectorAll('.step'); // Step numbers for navigation

            if (currentStep === 3) {
                // Handle card navigation if in step 3
                if ((step === 1 && currentCardIndex < cards.length - 1) || (step === -1 && currentCardIndex > 0)) {
                    handleCardNavigation(step);
                    EnterChurchDetails();
                    return;
                }
            }

            // Remove 'active' class from the current step's content
            steps[currentStep - 2].classList.remove('active');
            stepNumbers[currentStep - 1].classList.remove('active'); // Remove active from the current step number

            // Move to the next or previous step
            currentStep += step;

            // Add 'active' class to the new current step's content
            steps[currentStep - 2].classList.add('active');
            stepNumbers[currentStep - 1].classList.add('active'); // Apply active to the new step number

            // Manage the 'actives' class for the navigation bar
            for (let i = 0; i < currentStep; i++) {
                stepNumbers[i].classList.add('actives');
            }
            for (let i = currentStep; i < totalSteps; i++) {
                stepNumbers[i].classList.remove('actives');
            }

            // Disable "Previous" button if on the first card of Step 3 or first step in general
            document.getElementById('prevBtn').disabled = currentStep === 2 && currentCardIndex === 0;

            // Disable the "Next" button if on step 4
            document.getElementById('nextBtn').disabled = currentStep === 4 ? true : false;

            // Get the total payment value
            var totalPayment = document.getElementById('total-payment').textContent.trim();

            // Change the "Next" button text and functionality based on the current step
            if (currentStep === 5) {
				
                //setStartFreeTrialButton();
            } else if (currentStep === 4) {
			
                document.getElementById('nextBtn').textContent = 'Start Free Trial';
                document.getElementById('nextBtn').onclick = goToStepFive;
            } else if (currentStep === 3) 
			{
                VerifyEmail();
                document.getElementById('nextBtn').textContent = 'Next Step';
                document.getElementById('nextBtn').onclick = function () {
                    nextPrev(1);
                };
            } else {
				
                document.getElementById('nextBtn').textContent = 'Next Step';
                document.getElementById('nextBtn').onclick = function () {
                    nextPrev(1);
                };
            }

            // Update the left panel text
            updateLeftPanelText(currentStep);
            validateForm();

            // Reset card index to 0 when coming back to Step 3
            if (currentStep === 3) {
                currentCardIndex = 0;
                updateCardVisibility();
            }
        }

        function updateLeftPanelText(step) {
            const leftText = document.getElementById('leftText');
            const leftDescription = document.getElementById('leftDescription');

            if (step === 2) {
                leftText.innerHTML = "Please Verify Your Email Address";
                leftDescription.innerHTML = "We need your email address for security purposes and to ensure smooth communication.";
            } else if (step === 3) {
                leftText.innerHTML = "Let's Get To Know Your Church";
                leftDescription.innerHTML = "You’ve successfully verified your email. Now, just a few more details about your church, and you’ll be all set to start your journey with us!";
            } else if (step === 4) {
                leftText.innerHTML = "Choose the Perfect Plan for You";
                leftDescription.innerHTML = "Explore our two tailored plans designed to fit your church's needs. Select the one that best supports your growth and goals with Congreg8.";
            } else if (step === 5) {
                leftText.innerHTML = "Final Step! Complete Your Payment";
                leftDescription.innerHTML = "No funds will be taken out of your account until 14 days later if you do not cancel before then. Please provide your card details.";
            }
        }

        function validateForm() {
            let currentFields;

            if (currentStep === 3) {
                currentFields = cards[currentCardIndex].querySelectorAll('input');
            } else {
                currentFields = document.querySelectorAll('.step-content.active input');
            }

            let isValid = true;

            currentFields.forEach(field => {
                if (field.id === 'couponCode') return;
                if (field.value.trim() === '') {
                    isValid = false;
                }
            });

            document.getElementById('nextBtn').disabled = currentStep === 4 ? true : !isValid;

            if (currentStep === 3) {
                document.getElementById('prevBtn').disabled = currentCardIndex === 0 && currentStep === 2;
            } else {
                document.getElementById('prevBtn').disabled = currentStep === 2 && currentCardIndex === 0;
            }
        }

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', validateForm);
        });

        function handleCardNavigation(step) {
            if (step > 0 && currentCardIndex < cards.length - 1) {
                cards[currentCardIndex].classList.remove('active');
                currentCardIndex++;
                cards[currentCardIndex].classList.add('active');
            } else if (step < 0 && currentCardIndex > 0) {
                cards[currentCardIndex].classList.remove('active');
                currentCardIndex--;
                cards[currentCardIndex].classList.add('active');
            }
            if (currentCardIndex === cards.length - 1 && currentStep === 3) {
                const nextBtn = document.getElementById('nextBtn');
                nextBtn.textContent = 'Next Step';
                nextBtn.onclick = function () {
                    EnterPastorDetails();
                    nextPrev(1);
                };
            }
            validateForm();
        }

        function updateCardVisibility() {
            cards.forEach((card, index) => {
                if (index === currentCardIndex) {
                    card.classList.add('active');
                } else {
                    card.classList.remove('active');
                }
            });
        }
    </script>

    <script>
        function goToStepFive() {
            const steps = document.querySelectorAll('.step-content');
            const stepNumbers = document.querySelectorAll('.step');

            steps[currentStep - 2].classList.remove('active');
            stepNumbers[currentStep - 1].classList.remove('active');

            currentStep = 5;

            steps[currentStep - 2].classList.add('active');
            stepNumbers[currentStep - 1].classList.add('active');

            for (let i = 0; i < currentStep; i++) {
                stepNumbers[i].classList.add('actives');
            }

            for (let i = currentStep; i < totalSteps; i++) {
                stepNumbers[i].classList.remove('actives');
            }

            setStartFreeTrialButton();

            updateLeftPanelText(currentStep);
        }

        document.getElementById('goToStepFiveBtn').addEventListener('click', goToStepFive);
        document.getElementById('goToStepFiveBtn2').addEventListener('click', goToStepFive);
    </script>
	<script>
	 var base_url = "<?php echo base_url(); ?>";
    </script>


    <script>
        const totalPayment = document.getElementById('total-payment').textContent.trim();
        document.getElementById('planPrice').innerText = totalPayment;
        function VerifyEmail() {
            // VErification Process Here
        }
        function EnterChurchDetails() {
         
        }

        function EnterPastorDetails() {
       
		var otpValues = $('input[name="otp[]"]').map(function() {
		  return $(this).val();
		}).get();
		
        var otpString = otpValues.join('');
		var verify_link = $('#verify_link').val();
		var  church_name = $('#church_name').val();
		var  church_email = $('#church_email').val();
		var  website = $('#church_website').val();
		var  time_zone = $('#timezone').val();
		var  pastor_name = $('#pastor_name').val();
		var  address = $('#church_address').val();
		var  phone = $('#pastor_phone').val();

		$.ajax({
			url: base_url + '/signup/verifyotp',
			type: 'POST',
			data: {
				'otp': otpString,
			    'church_name' :church_name,
				'church_email': church_email,
				'website' : church_email,
				'verify_link' :verify_link,
				'time_zone' : time_zone,
				'pastor_name' : pastor_name,
				'address' : address,
				'phone' : phone,
				'_token': '{{ csrf_token() }}' 
			},
			dataType: 'json', 
			success: function(response) {
						if(response.success){
							toastr.success(response.message, 'Success');
						} 
						if(response.error){
							$('#nextBtn').prop('disabled', true);
							toastr.error(response.message, 'Error');
							location.reload();
						} 
			},
			error: function(xhr, status, error) {
				// Display a more detailed error message
				var errorMessage = xhr.status + ': ' + xhr.statusText;
				$('#responseMessage').html('<p>Error - ' + errorMessage + '</p>');
			}
		});
        }
        function setStartFreeTrialButton() {
            // Get the next button

            const nextBtn = document.getElementById('nextBtn');

            // Get the total payment value
            const totalPayment = document.getElementById('total-payment').textContent.trim();
            // Set the button text for the final step
            nextBtn.textContent = 'Start Free Trial- ' + totalPayment + ' Today';

            // Get the modal element and initialize the Bootstrap modal
            const paymentConfirmationModalElement = document.getElementById('paymentConfirmationModal');
            const paymentConfirmationModal = new bootstrap.Modal(paymentConfirmationModalElement, {
                backdrop: 'static', // Prevent closing by clicking outside directly in Bootstrap
                keyboard: false     // Prevent closing by pressing the Escape key
            });

            // Show the modal when the "Start Free Trial" button is clicked
            nextBtn.onclick = function () {
				
				$('#pay-btn').click();
				
               // paymentConfirmationModal.show();

                // Attach the outside click listener only after the modal is shown
                setTimeout(() => {
                    document.addEventListener('click', handleOutsideClick);
                }, 0);
            };

            // Function to handle clicks outside the modal
            function handleOutsideClick(event) {
                // Check if the click was outside the modal content
                const isClickInsideModal = paymentConfirmationModalElement.contains(event.target);

                if (!isClickInsideModal) {
                    // Redirect to the dashboard if the click is outside the modal
                   // window.location.href = '/dashboard';
                    // Remove this event listener after redirection to prevent further triggers
                   // document.removeEventListener('click', handleOutsideClick);
                }
            }

            // Redirect to the dashboard when "Continue to Dashboard" button is clicked in the modal
            document.getElementById('continueToDashboardBtn').onclick = function () {
                //window.location.href = '/dashboard';
                // Remove the outside click listener since we're navigating away
                //document.removeEventListener('click', handleOutsideClick);
            };
			
			
			
        }


    </script>
	<script>
	$(document).ready(function() {
    var base_url = "<?php echo base_url(); ?>";
    var csrf_token = "<?php echo csrf_token(); ?>"; // Assign CSRF token to JavaScript variable

    $('#goToStepFiveBtn, #goToStepFiveBtn2').on('click', function(event) {
		
		var id = $(this).data('id');
		var interval = $(this).data('interval'); 
        $.ajax({
            url: base_url + '/plandetail',
            type: 'POST',
            data: {
                '_token' : csrf_token ,
				'id' : id,
				'interval' : interval,	
            },
            dataType: 'json',
            success: function(response) {
				$('#total-payment').text(response.currency+response.price);
				$('#nextBtn').prop('disabled', false);
				$('#nextBtn').html('Start Free Trial- ' +response.currency+response.price+ ' Today');
				$('#amount').val(response.price);
				$('#interval').val(response.interval);
				$('#planid').val(response.planid);
				$('#userid').val(response.userid);
            },
            error: function(xhr, status, error) {
                // Display a more detailed error message
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                $('#responseMessage').html('<p>Error - ' + errorMessage + '</p>');
            }
        });
    });
});

	</script>
	<script type="text/javascript">
   $(function () {
      var currentDate = new Date();
      var currentYear = currentDate.getFullYear().toString();
      var firstTwoDigits = currentYear.substring(0, 2);

      toastr.options = {
         "closeButton": true,
         "positionClass": "toast-top-right",
         "timeOut": "5000",
         "progressBar": true
      };
      var $form = $(".require-validation");

      $('#pay-btn').on('click', function (e) {
		 
         e.preventDefault();
		 $('#nextBtn').prop('disabled', true);
         var hasEmptyField = false;
         $('#payment-form').find('input.required:visible, textarea.required:visible').each(function () {
            if ($(this).val().trim() === '') {
			   $('#nextBtn').prop('disabled', false);
               var labelText = $(this).data('label');
               toastr.error(labelText + " is required");
               hasEmptyField = true;
               return false;
            }
         });

         if (hasEmptyField) return;

         if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));

            var expiryDate = document.getElementById('expiryDateInput').value;
            var expMonth = expiryDate.split('/')[0];
            var expYear = firstTwoDigits + expiryDate.split('/')[1];

            Stripe.createToken({
               number: $('.card-number').val(),
               cvc: $('.card-cvc').val(),
               exp_month: expMonth,
               exp_year: expYear
            }, stripeResponseHandler);
         }
        });

      function stripeResponseHandler(status, response) {
         if (response.error) {
			$('#nextBtn').prop('disabled', false);
            toastr.error(response.error.message);
         } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' id='stripe-token-id' value='" + token + "'/>");
            $('#nextBtn').prop('disabled', true);
            $form.get(0).submit();
         }
      }
   });
</script>
</body>

</html>