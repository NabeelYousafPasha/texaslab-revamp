<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Requisition Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap');
        .sz{
            font-size: 15px;
        }
        .sz-terms *{
            font-size: 10px;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
            margin-left: 2px;
        }
        @page {
            margin-left: 0px;
            margin-right: 0px; 
        }
        body {
            margin-top:-10px;
            margin-left: 0px;
            margin-right: 0px;
        }
        .table-p-bottom {
            margin-bottom: -2px;
            display: flex;
            justify-content: center;
        }
        .table-p-margin {
            margin: 2px;
        }
        .table-p-top {
            margin-top: 2px;
        }
        .table-ol-padding-left {
            padding-left: 8px;
        }
        .label-value-200 {
            border-bottom: 1px solid black;
            width: 200px;
            display: inline-block;
        }
        .wd-130 {
            width: 20%;
            display: inline-block;
        }
        .wd-120 {
            width: 40%;
            display: inline-block;
        }
        .wd-tit {
            width: 50%;
            display: inline-block;
            margin-bottom: 5px;
        }
        .wd-100 {
            width: 10%;
            display: inline;
        }
        .wd-100 input {
            height:14px;
            width: 18%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-210 input {
            height:14px;
            width: 43%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
            margin-left: 10px;
        }
        .wd-110 input {
            height:14px;
            width: 20%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-140 input {
            height:14px;
            width: 24%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-200 input {
            height:14px;
            width: 53%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-30 input {
            height:14px;
            width: 10%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        input.checkbox {
            height:0px;
            width: 3%;
            display: inline-block;
            margin-right:0px !important;
            background-color:transparent;
            border-color:transparent;
            margin-bottom: 24px;
        }
        .wd-50 input {
            height:14px;
            width: 14%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-iip input {
            height:14px;
            width: 170%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .header-input input {
            height:12px;
            width: 170px;
            margin-right:5px !important;
            margin-left:5px !important;
            margin-top:2px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
            font-size: 10px;
        }
        .wd-90 input {
            height:14px;
            width: 20%;
            display: inline-block;
            margin-right:5px !important;
            margin-bottom:-4px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .input-loc input {
            font-size: 9px !important;  
        }
        .address-header input {
            height: 20px;
            font-size: 9px !important;  
        }
        .header-name {
            font-size:10px;
            margin-bottom:10px;
            font-weight: bold;
            text-align: right;
        }
        .wd-ip input {
            height:14px;
            width: 40%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-add input {
            height:14px;
            width: 77.7%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .wd-rp input {
            height:14px;
            width: 98%;
            display: inline-block;
            margin-right:5px !important;
            background-color:#e2e4e6;
            border-color:#e2e4e6;
        }
        .label-value-130 {
            border-bottom: 1px solid black;
            width: 130px;
            display: inline-block;
        }
        .label-value-100 {
            border-bottom: 1px solid black;
            width: 110px;
            display: inline-block;
        }
        .label-value-150 {
            border-bottom: 1px solid black;
            width: 150px;
            display: inline-block;
        }
        .label-value-400 {
            border-bottom: 1px solid black;
            width: 400px;
            display: inline-block;
        }
        .label-value-450 {
            border-bottom: 1px solid black;
            width: 570px;
            display: inline-block;
        }
        .label-value-80 {
            border-bottom: 1px solid black;
            width: 80px;
            display: inline-block;
        }
        .label-value-250 {
            border-bottom: 1px solid black;
            width: 250px;
            display: inline-block;
        }
        .label-value-230 {
            border-bottom: 1px solid black;
            width: 230px;
            display: inline-block;
        }
        .dob-underline {
            border-bottom: 1px solid black;
            width: 40px;
            display: inline-block;
        }
        .width-60 {
            width: 60px !important;
        }
        div.page_break {
            page-break-before: always;
        }
        .d-flex {
            display: flex !important;
            flex-wrap: wrap !important;
        }
        .flex-inside {
            width: 30% !important;
        }
        .form-section-title {
            font-weight: bold;
            background-color: #032765;
            color: #fff;
            padding: 4px 12px;
            margin-bottom: 4px;
        }
        .form-section-title.white-section {
            background-color: #fff;
            border-bottom: 1px solid black;
        }
        .form-section-title.white-section span {
            color: black;
        }
        .form-section-title h5 {
            color: #fff;
            margin: 0;
            font-size: 12px;
        }
        hr {
            color:#B91319;  
        }
        .form-section-footer {
            font-weight: bold;
            background-color: #B91319;
            color: #fff;
            padding: 4px 12px;
            margin-bottom:0px;
        }
        .form-section-footer h5 {
            color: #fff;
            margin: 0;
            font-size: 12px;
        }
        .form-section-footer2 {
            background-color: #fff;
            color: black;
            margin-bottom:0px;
            font-size: 11px;
        }
        body {            
            padding: 13px;
            padding-top: -10px;
        }
        .header,.footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        .header {
            top: -30px;
        }
        .footer {
            bottom: -40px;
        }
        .pagenum:before {
            content: counter(page);
        }
        h4 {
            font-family: 'Open Sans', sans-serif !important;
        }
        p {
            font-family: 'Open Sans', sans-serif !important;
            font-size: 9px;
            font-weight: bold;
        }
        .terms p {
            font-weight: 300;
            line-height: 1.5;
        }
        span,tr,td {
            font-family: 'Open Sans', sans-serif !important;
        }
        .header-table tr {
            margin-bottom: -10px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .table1, .table2 {
            width: 50%;
        }
        .flex-dir {
            display: flex;
            flex-wrap: wrap;
        }
        .dropdown input,.select-relation input {
            font-size: 12px !important;
        }
        .test-table input {
            font-size: 12px !important;
        }
        .more-tests input {
            font-size: 12px !important;
            margin-bottom: 3px !important;
        }
        .dropdown label,.dropdown span {
            font-size: 9px;
        }
        .select-relation label {
            font-size: 8px !important;
        }
        .select-relation span {
            font-size: 8px;
        }
        .select-relation input {
            margin-bottom: 3px !important;
        }
        .collection-table p {
            font-size: 10px !important;
        }
        h5 {
            font-size: 10px !important;
        }
        br {
            margin-bottom: 3px !important;
        }
        .loop-div {
            display: flex;
            flex-wrap:wrap;
        }
        .loop-div .input-parent {
            width: 33% !imporant;
        }
        .table-p-bottom label {
            margin-bottom: 8px;
            margin-right: 6px;
        }
        .cell {
            margin-left: 14px;
        }
        .insurnace {
            margin-left: 50px;
        }
        .email {
            margin-left: 20px;
        }
        .address {
            margin-left: 10px;
        }
        .test-section-table th {
            background-color: #B91219;
            color: #fff;
        }
        .title-section {
            width: 94%;
            margin-left: 10px;
        }
        .row {
            display: flex;
        }
        .section {
            border: 1px solid black;
            padding: 10px;
            box-sizing: border-box;
        }
        .section.width-50 {
            width: 50%;
        }
        .section.width-60 {
            width: 70%;
        }
        .section.width-20 {
            width: 20%;
        }
        .section.width-30 {
            width: 30%;
        }
        .panel-title label {
            font-size: 10px;
        }
        .panel-title td {
            font-size: 10px;
        }
        .new {
            width: 100%;
            border-collapse: collapse;
        }
        .new td {
            width: 20%;
            padding: 5px;
        }
        .new td {
            font-size: 10px;
        }
        .term-table {
            width: 100%;
        }
        .term-table td {
            width: 50%;
        }
        .specimen b,.specimen td {
            font-size: 10px;
        }
    </style>
</head>
<body>
@php
    $labName = 'Texas Lab';
    $labAddress = '9100 Southwest Freeway, Suite 114, Houston TX, 77074';
    $labPhone = '713 684 3014';
    $labCLIA = '45D2226403';
    $labDirector = 'Dr Mushtaq Khan, MD';
@endphp


    <section class="footer-section"> 
        <div class="footer">
            <table style="width:100%; font-family:Calibri; font-size: 15px; padding-top:0px;">
                <tr>
                    <td style="width:30%; padding:20px;p adding-left:10px;">
                        <div class="form-section-footer">
                            <span>{{ $labName }}</span>
                        </div>
                    </td>
                    <td style="width:70%; padding:0px; padding-left:10px;">
                        <div class="form-section-footer2">
                            <span>
                                <strong>Address:</strong> {{ $labAddress }}
                                <hr>
                                <div>
                                    <strong>Phone:</strong> {{ $labPhone }} &nbsp; 
                                    <strong>CLIA#:</strong> {{ $labCLIA }} &nbsp; 
                                    <strong>Lab Director:</strong> {{ $labDirector }} &nbsp; 
                                </div>
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section class="header-section"> 
        <div>
            <table>
                <tr>            
                    <td style="width:500px;">
                        <div style="display: inline-block;text-align: left; width: 100%; margin-bottom:15px;">
                            <img 
                                src="{{ $labLogo }}" 
                                alt="{{ config('app.name') }}" 
                                width="220" 
                            />
                        </div>
                    </td>
                    <td style="width:330px;">
                        <table class="header-table">
                            <tr>
                                <td>
                                    <span class="header-input header-name">Practice Name</span>
                                </td>
                                <td>
                                    <span class="header-input">
                                        <input 
                                            type="text"
                                            value="{{ $location->name }}" 
                                            style="margin-top: 20px;"
                                        >
                                    </span>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="header-input header-name">Provider Name</span>
                                </td>
                                <td>
                                    <span class="header-input">
                                        <input 
                                            type="text"
                                            value="{{ $appointmentLocationProvider->full_name }}" 
                                            style="margin-top: 20px;" 
                                        >
                                    </span>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="header-input header-name">Phone #</span>
                                </td>
                                <td>
                                    <span class="header-input">
                                        <input 
                                            type="text"
                                            value="{{ $location->phone }}" 
                                            style="margin-top: 20px;"
                                        >
                                    </span>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="header-input header-name">Address</span>
                                </td>
                                <td>
                                    <span class="header-input address-header">
                                        <input 
                                            type="text"
                                            value="{{ $location->address }}" 
                                            style="margin-top: 20px;"
                                        >
                                    </span>
                                    <br>
                                </td>
                            </tr>
                        </table> 
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section class="patient-section"> 
        <div>
            <table style="width:100%; margin:0 auto">
                <tr>
                    <td style="width:100%;">
                        <div class="form-section-title">
                            <h5>Patient Information</h5>
                        </div>
                    </td>
                </tr>
            </table>
            <table style="width:100%; margin:0 auto">
                <tr>
                    <td>
                        <p class="table-p-bottom">
                            <span class="wd-100">
                                <label>Last Name</label>
                                <input 
                                    type="text"
                                    value="{{ $patient->last_name }}" 
                                >
                            </span>
                            <span class="wd-100">
                                <label>First Name</label>
                                <input
                                    type="text" 
                                    value="{{ $patient->first_name }}" 
                                >
                            </span>
                            <span class="wd-50">
                                <label>MI</label>
                                <input 
                                    type="text"
                                >
                            </span>
                            <span class="wd-100">
                                <label>DOB</label>
                                <input 
                                    type="text"
                                    value="{{ $patient->dob }}"
                                >
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="table-p-bottom">
                            <span class="wd-100">
                                <label>Phone #</label>
                                <input 
                                    type="text"
                                    class="cell" 
                                    value="{{ $patient->cell_phone }}" 
                                >
                            </span>
                            <span class="wd-100">
                                <label>Gender</label>
                                @foreach ($genders ?? [] as $genderValue => $genderName)
                                    <input 
                                        class="checkbox" 
                                        type="checkbox" 
                                        id="gender_{{ $genderValue }}" 
                                        name="gender" 
                                        value="{{ $genderName }}"
                                        @if($patient->gender->value == $genderValue)
                                            checked 
                                        @endif
                                    >
                                    <label for="gender_{{ $genderValue }}">
                                        {{ $genderName }}
                                    </label>
                                @endforeach
                            </span> 
                            <span class="wd-100">
                                <label class="insurnace">Insurance Info</label>
                                <input 
                                    class="checkbox" 
                                    type="checkbox" 
                                    value="Client Bill"
                                >
                                <label for="insurnace_client_bill">Client Bill</label>
                                <input 
                                    class="checkbox" 
                                    type="checkbox" 
                                    value="Insurance"
                                >
                                <label for="insurnace_insurance">Insurance</label>
                                <input 
                                    class="checkbox" 
                                    type="checkbox" 
                                    value="Self-Pay"
                                >
                                <label for="insurnace_self_pay">Self-Pay</label>
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="table-p-bottom">
                            <span class="wd-140">
                                <label>Address:</label>
                                <input 
                                    type="text" 
                                    class="address" 
                                    value="{{ $patient->address }}" 
                                >
                            </span>
                            <span class="wd-30">
                                <label>City</label>
                                <input 
                                    type="text"
                                    value="{{ $patient->city }}" 
                                >
                            </span>
                            <span class="wd-30">
                                <label>State</label>
                                <input
                                    type="text" 
                                    value="{{ $patient->state }}" 
                                >
                            </span>
                            <span class="wd-30">
                                <label>Zip Code</label>
                                <input 
                                    type="text"
                                    value="{{ $patient->zipcode }}" 
                                >
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="table-p-bottom">
                            <span class="wd-100">
                                <label>Email:</label>
                                <input 
                                    type="text"
                                    class="email" 
                                    value="{{ $patient->email }}"
                                >
                            </span>
                            <span class="wd-200">
                                <label>Diagnosis Codes (ICD-10)</label>
                                <input 
                                    type="text"
                                    value="{{ $icdCodesString }}" 
                                >
                            </span>
                        </p>        
                    </td>
                </tr> 
            </table>
        </div>
    </section>

    <section class="insurance-section"> 
        <div style="margin-top:10px; margin-bottom:10px; margin:0 auto">
            <table style="width:100%;">
                <tr>
                    <td style="width:55%; border:1px solid black; padding-left:10px; padding-bottom:10px;">
                        <!-- First Table -->
                        <table style="width:100%;">
                            <div style="margin-bottom:-6px" class="form-section-title white-section select-relation">
                                <span style="font-size:8px;line-height:1;margin:0;padding:0;display:inline">Patient’s Relationship to<br>Responsible Party</span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; <input type="checkbox" @if($appointment->patientrealtionsip == 'Self') checked @endif id="self" name="self" value="Self"><label style="font-size:10px;">Self</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" @if($appointment->patientrealtionsip == 'Spouse') checked @endif id="Spouse" name="Spouse" value="Spouse"><label style="font-size:10px;">Spouse</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" @if($appointment->patientrealtionsip == 'Child') checked @endif id="Child" name="Child" value="Child"><label style="font-size:10px;">Child</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" @if($appointment->patientrealtionsip == 'Other') checked @endif id="Other" name="Other" value="Other"><label style="font-size:10px;">Other</label></span>
                            </div>
                            
                            <div style="border-bottom: 1px solid black;padding-left:10px;padding-top:10px;">
                                <p style="font-size:8px;">Insurance Company Name:@if($appointment->ins_name != '') {{ $appointment->ins_name }} @endif <br>Plan:@if($appointment->company_plan != '') {{ $appointment->company_plan }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Carrier Code:@if($appointment->carrier_code != '') {{ $appointment->carrier_code }} @endif</p>
                            </div>
                            <div style="border-bottom: 1px solid black;padding-left:10px;">
                                <p style="font-size:8px;">Subscriber/Member #:@if($appointment->subscriber_member != '') {{ $appointment->subscriber_member }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location:@if($appointment->company_location != '') {{ $appointment->company_location }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Group:@if($appointment->group_no != '') {{ $appointment->group_no }} @endif</p>
                            </div>
                            <div style="border-bottom: 1px solid black;padding-left:10px;">
                                <p style="font-size:8px;">Insurance Address:@if($appointment->insurance_address != '') {{ $appointment->insurance_address }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physician’s Provider #:@if($appointment->physican_provider != '') {{ $appointment->physican_provider }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            </div>
                            <div style="border-bottom: 1px solid black;padding-left:10px;">
                                <p style="font-size:8px;">City:@if($appointment->insurance_city != '') {{ $appointment->insurance_city }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State:@if($appointment->insurance_stateId != '') {{ $appointment->insurance_stateId }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP:@if($appointment->in_postal_cod != '') {{ $appointment->in_postal_cod }} @endif</p>
                            </div>
                            <div style="border-bottom: 0px solid black;padding-left:10px;">
                                <p style="font-size:8px;">Employer’s Name or Number:@if($appointment->employ_num != '') {{ $appointment->employ_num }} @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insured SS # (If Not Patient):@if($appointment->insured_ss != '') {{ $appointment->insured_ss }} @endif&nbsp;&nbsp;&nbsp;&nbsp;<br><span style="text-align: right">Worker's Copm:@if($appointment->workercopm != '') {{ $appointment->workercopm }} @endif</span></p>
                            </div>

                        </table>
                    </td>
                    <td style="width:45%; border:1px solid black; padding-left:10px; padding-bottom:10px;">
                        <table style="width:100%;">
                            <tr>
                                <td>
                                    <p class="table-p-bottom">
                                        <span class="wd-tit">
                                            Collection Date & Time 
                                        </span>
                                        <span class="wd-ip">
                                            <input 
                                                type="text"
                                                value="{{ $appointment->appointment }}" 
                                            >
                                        </span>
                                    </p>
                                    <p class="table-p-bottom">
                                        <span class="wd-tit">Fasting 
                                        </span>
                                        <span class="wd-ip">
                                            <input 
                                                type="text"
                                            >
                                        </span>
                                    </p>
                                    <p class="table-p-bottom">
                                        <span class="wd-tit">
                                            Urine hrs/vol
                                        </span>
                                        <span class="wd-ip">
                                            <input 
                                                type="text"
                                            >
                                        </span>
                                    </p>
                                    <p>
                                        I verify that I am providing Southern Healthcare Services (CLIA#: 45D2226403) and affiliated reference laboratories with my sample for the purpose of testing.
                                    </p>
                                    <p class="table-p-bottom">
                                        <span>
                                            <span class="sz label-value-80">
                                                {{ $patient->full_name }}
                                            </span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="sz label-value-100">
                                                {{ $appointment->appointment }}
                                            </span>
                                        </span>
                                    </p>
                                    <p class="table-p-bottom">
                                        <span>
                                            Patient Signature: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>&nbsp;&nbsp;
                                            Date
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section class="test-section"> 
        <div>
            <table style="width:100%; margin:0 auto">
                <tr>
                    <td style="width:100%;">
                        <div class="form-section-title">
                            <h5>TEST ORDER</h5>
                        </div>
                    </td>
                </tr>
            </table>
            <table style="width:100%; margin:0 auto">
                @foreach ($appointmentTests as $test)
                    <tr>
                        <div class="form-field panel-title">
                            <input 
                                checked  
                                class="checkbox" 
                                type="checkbox" 
                                value="{{ $test->name }}"
                            >
                            <label>
                                {{ $test->name }}
                            </label>
                        </div>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

    <section class="acknowledgment-section"> 
        <div>
            <table style="width:100%; margin:0 auto">
                <tr>
                    <td style="width:100%;">
                        <div class="form-section-title">
                            <h5>PATIENT AND PROVIDER ACKNOWLEDGMENT</h5>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="terms" style="width:100%; font-family:Calibri; font-size:12px;">
                <tr>
                    <td>    
                        <p style="margin:0 auto;">
                            The information provided on this form and on the label affixed to the specimen cup is accurate. The specimen identified on this form is my own. I have not adulterated it in any way. I am voluntarily submitting this specimen for analysis by my healthcare provider and/or third party lab. I authorize the lab to release the results of this test to the ordering healthcare provider. The lab is authorized to bill my insurance provider, or any payer, whether fully insured or self-insured, and I will irrevocably assign any payment of benefits, claims, rights, and interests related to the services my healthcare provider performed against any payer. I further authorize the lab and my healthcare provider to release to my insurance provider any medical information necessary to process this claim.
                        </p>
                        <p style="margin:0 auto;">
                            I acknowledge that the laboratories (CLIA#: 45D2226403) may be an out-of-network facility/provider with my insurance provider. I acknowledge that I am responsible for any amounts not covered by my insurer including any deductibles and co-payments/ co-insurance or direct payments. I understand that the laboratory may use my specimen and any testing performed on that specimen for research and development so long as the information has been de-identified pursuant to law.
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section class="patient-acknowledgment1-section"> 
        <div>
            <table class="term-table" style="width:100%; margin:0 auto; font-family:Calibri; font-size:12px;">
                <tr>
                    <td style="width: 50%">
                        <p>
                            <b>Patient Acknowledgment</b>
                        </p>
                        <div style="margin-left:0" class="form-section-title title-section">
                            <h5>I verify that I am providing texaslab (CLIA#: 45D0677467) and affiliated reference laboratories with my sample for the purpose of testing.</h5>
                        </div>
                    </td>
                    <td style="width: 50%">
                        <p style="margin-top: 30px;margin-bottom:10px" class="table-p-bottom">
                            <span style="margin-left: 10px;" class="wd-150">
                                Patient Signature:
                            </span>
                            <span style="margin-left: 110px;" class="wd-130"> 
                                Date:
                            </span>
                        </p>
                        <p style="margin-top: 0px;marign-bottom:20px" class="table-p-bottom">
                            <span class="wd-210">
                                <input 
                                    type="text"
                                    value="{{ $patient->full_name }}" 
                                >
                            </span>
                            <span class="wd-210">
                                <input 
                                    type="text"
                                    value="{{ now()->format('Y-m-d') }}" 
                                >
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section class="patient-acknowledgment2-section"> 
        <div>
            <table class="term-table" style="width:100%; margin:0 auto; font-family:Calibri; font-size:12px;">
                <tr>
                    <td style="width: 50%">
                        <p>
                            <b>Patient Acknowledgment</b>
                        </p>
                        <div style="margin-left:0" class="form-section-title title-section">
                            <h5>
                                Provider's testing orders are identified with a check-marked box for testing by texaslab (CLIA#: 45D0677467) and affiliated reference laboratories. By my signature, I certify the testing is medically necessary.
                            </h5>
                        </div>
                    </td>
                    <td style="width: 50%">
                        <p style="margin-top:20px; margin-bottom:10px;" class="table-p-bottom">
                            <span style="margin-left: 10px;" class="wd-100">
                                Patient Signature:
                            </span>
                            <span style="margin-left: 110px;" class="wd-100">
                                Date:
                            </span>
                        </p>
                        <p style="margin-top: 0px;" class="table-p-bottom">
                            <span class="wd-210">
                                <input 
                                    type="text"
                                    value="{{ $patient->full_name }}" 
                                >
                            </span>
                            <span class="wd-210">
                                <input 
                                    type="text"
                                    value="{{ now()->format('Y-m-d') }}" 
                                >
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section class="footer-section"> 
        <div class="footer">
            <table style="width:100%; font-family:Calibri; font-size: 15px; padding-top:0px;">
                <tr>
                    <td style="width:30%; padding:20px;p adding-left:10px;">
                        <div class="form-section-footer">
                            <span>{{ $labName }}</span>
                        </div>
                    </td>
                    <td style="width:70%; padding:0px; padding-left:10px;">
                        <div class="form-section-footer2">
                            <span>
                                <strong>Address:</strong> {{ $labAddress }}
                                <hr>
                                <div>
                                    <strong>Phone:</strong> {{ $labPhone }} &nbsp; 
                                    <strong>CLIA#:</strong> {{ $labCLIA }} &nbsp; 
                                    <strong>Lab Director:</strong> {{ $labDirector }} &nbsp; 
                                </div>
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>

