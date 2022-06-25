<?php
// provides everything necessary for CRUD a resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;


class GuitarsController extends Controller
{
    private static function getData() {
        return [
            ['id' => 1, 'name' => 'American Standard Strat', 'brand' => 'Fender'],
            ['id' => 2, 'name' => 'Starla S2', 'brand' => 'PRS'],
            ['id' => 3, 'name' => 'Explorer', 'brand' => 'Gibson'],
            ['id' => 4, 'name' => 'Talman', 'brand' => 'Ibanez'],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        return view('guitars.index', [
            // 'guitars' => self::getData(),
            'guitars' => Guitar::all(), 
            // This retrieves all the data (records) from the guitar model similar to the array above.
            // 'userInput' => '<script>alert("hello")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //laravel helps us validate our data
        $request->validate([
            'guitar-name' => 'required',
            'brand' => 'required',
            'year' => ['required', 'integer'],
        ]);
        //POST
        $guitar = new Guitar();
        $guitar->name = strip_tags($request->input('guitar-name'));
        // This takes data from the input form in create.blade.php and saves it on the database.
        $guitar->brand = strip_tags($request->input('brand'));
        $guitar->year_made = strip_tags($request->input('year'));
        $guitar->save();
        return redirect()->route('guitars.index');
        //After saving to the database, the application is re-routed to the guitars.index page.
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($guitar)
    {
        //GET
        // $guitars = self::getData();
        // $record = Guitar::find($guitar);
        // $record = Guitar::findorFail($guitar);//with this method the find returns a 404 if record is not found.
        // The find method searches the records and finds the record with the particular id that was passed in
        // $index = array_search($guitar, array_column($guitars, 'id'));

        // if ($index === false) {
        //     abort(404);
        // }
        // if ($record === false) {
        //     abort(404);
        // }

        return view('guitars.show', [
            // 'guitar' => $guitars[$index]
            'guitar' => Guitar::findorFail($guitar)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($guitar)
    {
        //GET
        return view('guitars.edit', [
            'guitar' => Guitar::findorFail($guitar)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //POST, PUT, PATCH
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE
    }
}
