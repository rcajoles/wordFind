@extends('layouts.master')

@section('content')

    @php
        $hasData = false;
        $data = '';

        if(session()->get('data')) {
            $data = session()->get('data');
            $hasData = true;
        }

    @endphp

    <div class="container">

        @include('includes.header', ['page' => 'new search'])

        <div class="container">

            <div class="row">
                <div class="col col-3 word-search-form">
                    <form method="post" action="{{ url('/previous-search') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="keyword">Enter a Word to lookup</label>
                            <input type="text" name="keyword" value="{{ $hasData == true ? $data['word'] : '' }}"
                                placeholder="example" class="form-control" id="keyword">
                        </div>

                        {{--
                        <div class="form-group">
                            <label for="word">What to Get</label>
                            <select class="form-control" id="word">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                         --}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

                <div class="col col-9 align-self-center">
                    <div class="card">
                        <div class="card-header">
                            Response
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote mb-0">

                                @if ($hasData)

                                    @if (array_key_exists('statusCode', $data))

                                        <p>{{ $data['message'] }}</p>

                                    @else
                                        <ol class="list-group list-group-flush">

                                            @foreach ($data['definitions'] as $item)
                                            <li class="list-group-item">
                                                <p> {{ strtoupper($item['partOfSpeech']) }} </p>
                                                <p> <b>Definition -</b> {{ $item['definition']}} </p>
                                            </li>
                                            @endforeach
                                        </ol>
                                    @endif


                                @else
                                    <p>Search for a word definition.</p>
                                @endif

                            </blockquote>
                        </div>
                    </div>
                </div>


            </div>


        </div>


    </div>

@endsection
