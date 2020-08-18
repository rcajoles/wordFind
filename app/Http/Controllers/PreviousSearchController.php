<?php

namespace App\Http\Controllers;

use App\Models\PreviousSearch;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PreviousSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previousSearches = PreviousSearch::query()
                                        ->orderby('created_at', 'desc')
                                        ->get();

        return view('pages.previousSearch', ['data' => $previousSearches->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $http = '';

        if ($request->has('keyword') && $request->input('keyword') != '') {

            $newWord = new PreviousSearch;
            $newWord->keyword = $request->input('keyword');
            $newWord->save();

            try {
                $http = new Client;
                $response = $http->request('GET', 'https://wordsapiv1.p.rapidapi.com/words/' . $request->input('keyword') . '/definitions', [
                    'headers' => [
                        'x-rapidapi-host' => config('app.rapidapi_host'),
                        'x-rapidapi-key' => config('app.rapidapi_key')
                    ],
                ]);

                $result = json_decode((string) $response->getBody(), true);

                return redirect()
                        ->route('welcome')
                        ->with(['data' => $result]);

            } catch(\GuzzleHttp\Exception\BadResponseException $e) {
                $response = $e->getResponse();

                $statusCode = $response->getStatusCode();
                $message = $response->getReasonPhrase();
                $content = (string) $response->getBody();

                $err = [
                    'statusCode' => $statusCode,
                    'message' => $message,
                    'content' => $content,
                    'word'    => $request->input('keyword')
                ];

                \Log::error($err);

                return redirect()
                        ->route('welcome')
                        ->with(['data' => $err]);

            }


        }

        return redirect()
                ->route('welcome')
                ->with([
                    'data' => false
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreviousSearch  $previousSearch
     * @return \Illuminate\Http\Response
     */
    public function show(PreviousSearch $previousSearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PreviousSearch  $previousSearch
     * @return \Illuminate\Http\Response
     */
    public function edit(PreviousSearch $previousSearch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreviousSearch  $previousSearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreviousSearch $previousSearch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreviousSearch  $previousSearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreviousSearch $previousSearch)
    {
        //
    }
}
