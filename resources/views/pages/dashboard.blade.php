@extends("layouts.default", ['page_title' => 'Dashboard'])

@section("head")
    <style>
    </style>
@stop

@section("content")
    <div class="wide-container">
        <div class="row mtop30">
            <div class="col s12">
                <h2>Dashboard</h2>
            </div>
            <div class="col s12 m4">
                <h3>Welcome</h3>
                <div class="card-panel">
                    Hello {{ $user->full_name ?? '' }}
                </div>
            </div>
            <div class="col s12 m8">
                <h3>Summary</h3>
                <div class="card-panel">
                    Hello {{ $user->full_name ?? '' }}
                </div>
            </div>
            <div class="col s12">
                <h3>Overdue Invoices</h3>
                <div class="card-panel flex">
                    <table class="responsive-table">
                        <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Client Company</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if($overdueinvoices)
                                @foreach($overdueinvoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->nice_invoice_id }}</td>
                                        <td>{{ $invoice->getClient()->companyname }}</td>
                                        <td>${{ $invoice->calculatetotal() }}</td>
                                        <td>{{ $invoice->duedate->format('d F, Y') }}</td>
                                        <td>
                                            <a href="{{ route('invoice.show', [ 'invoice' => $invoice, 'company' => \App\Library\Poowf\Unicorn::getCompanyKey() ])  }}" class="btn waves-effect waves-light">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section("scripts")
    <script type="text/javascript">
        "use strict";
        $(function() {
        });
    </script>
@stop