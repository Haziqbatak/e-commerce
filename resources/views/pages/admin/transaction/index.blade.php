@extends('layouts.parent')


@section('title', 'transaction')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-bucket">List Transaction</i></h5>
        </div>

        <table class="table data-table table-stripped table-hover table-bordered">

            <thead>
                <tr>
                    <td>No.</td>
                    <td>Name Account</td>
                    <td>Reciver Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Total Price</td>
                    <td>Payment Url</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @forelse ($transaction as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                            {{ number_format($row->total_price) }}
                        </td>
                        <td>

                            @if ($row->payment_url == 'null')
                                <span>Null</span>
                            @else
                                <a href="{{ $row->payment_url }}">MIDTRANS</a>
                            @endif

                        </td>

                        <td>
                            @if ($row->status == 'EXPIRED')
                                <span class="badge bg-danger text-uppercase">Expired</span>
                            @elseif ($row->status == 'PENDING')
                                <span class="badge bg-warning text-uppercase">Pending</span>
                            @elseif ($row->status == 'SETTLEMENT')
                                <span class="badge bg-info text-uppercase">Settlement</span>
                            @else
                                <span class="badge bg-success text-uppercase">Success</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.transaction.showTransactionUserByAdminWithSlugAndId', [$row->slug, $row->id]) }}"
                                class="btn btn-warning">Show</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateStatus{{ $row->id }}">
                                Edit
                            </button>
                            @include('pages.admin.transaction.modal-edit')
                        </td>
                    </tr>




                @empty
                @endforelse
            </tbody>

        </table>
    </div>


@endsection
