<!DOCTYPE html>
<html>
<head>
    <title>Report Prospect</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        table, th, td {
            text-align: left;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        td {
            vertical-align: top;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .wrapper-customer-title {
            /* line-height: 50%; */
            margin-bottom: 50px;
            margin-top: 65px;
        }
        .logo_brand {
            margin-bottom: 7px;
        }
        .sub_top_title {
            font-size: 10px;
            margin-top: 0;
            margin-bottom: 4px;
        }
        h2 {
            margin-bottom: 0;
        }

        .wrapper-summary-prospect {
            margin-top: 70px;
        }
        .wrapper-logo {
            width: 250px;
            float: right;
            text-align: right;
        }
        footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                /* height: 2cm; */

                /** Extra personal styles **/
                background-color: #eeeeee;
                color: rgba(0, 0, 0, 0.632);
                text-align: center;
                font-size: 12px;
                padding: 4px 0;

            }
    </style>
</head>
<body>
    

    <div class="wrapper-logo">
        <img class="logo_brand" src="{{ resource_path('images/logo.jpg') }}" alt="">
        <p class="sub_top_title">Komp. Taman Harapan Indah Blok C No.16 Jl. Riau Gg. Harapan 2 Kec. Payung Sekaki, Kota Pekanbaru</p>
        <p class="sub_top_title">(0761) 5795004</p>

        <p class="sub_top_title">www.mitoindonesia.com</p>
    </div>

    <div class="wrapper-customer-title">
        <h1>{{ $ticket->konsumens->name_company }}</h1>
        <p>No. {{ $ticket->cd_ticket }}</p>
    </div>

    {{-- summary ticket --}}
    <table>
        <tbody>
            <tr>
                <th>Type Service</th>
                <td style="50%">{{ $ticket->type_service->name_service }}</td>
            </tr>
            <tr>
                <th>Type Customer</th>
                <td style="50%">{{ $ticket->type_customer->name_type_customer }}</td>
            </tr>
            <tr>
                <th>Sales</th>
                <td style="50%">{{ $ticket->sales_pic_a }}</td>
            </tr>
            <tr>
                <th style="border-bottom: none;"></th>
                <td>{{ $ticket->sales_pic_b }}</td>
            </tr>
            <tr>
                <th style="border-bottom: none;"></th>
                <td>{{ $ticket->sales_pic_c }}</td>
            </tr>
        </tbody>
    </table>
    {{-- End Ticket --}}

    {{-- Summary Prospect --}}
    <div class="wrapper-summary-prospect">
        <h3 class="title_summary">Summary Progress</h3>
        <table>
            <tbody>
                <thead>
                    <tr>
                        <th style="width: 25%">#</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Status Project</td>
                        <td>
                            @if ($ticket->status_ticket == 'done')
                                Done
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Action</td>
                        <td>{{ $ticket->prospects->type_action->name_action }}</td>
                    </tr>
                    <tr>
                        <td>Date Progress</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($ticket->prospects->date_progress))->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Issue</td>
                        <td>{{ $ticket->prospects->issue }}</td>
                    </tr>
                    <tr>
                        <td>Desc action</td>
                        <td>{{ $ticket->prospects->desc_action }}</td>
                    </tr>
                    <tr>
                        <td>Remark</td>
                        <td>{{ $ticket->prospects->remarks }}</td>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>
    {{-- End Summary Prospect --}}
    <footer>
        Copyright &copy; <?php echo date("Y");?> <strong>PT Mito Energi Indonesia</strong> 
    </footer>
</body>
</html>