@extends('layouts.master')

@section('content')


    <div class="container">

        @include('includes.header', ['page' => 'previous search'])

        <div class="container">

            <div class="row">

                <div class="col">

                    @if (count($data))

                        <ul class="list-group list-group-flush">
                            @foreach ($data as $item)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            {{ $item['keyword'] }}
                                        </div>
                                        <div class="col">
                                            {{ $item['created_at'] }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p>No searches yet.</p>

                    @endif


                </div>

            </div>

        </div>

    </div>

@endsection
