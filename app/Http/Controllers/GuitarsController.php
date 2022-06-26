<?php
// provides everything necessary for CRUD a resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use App\Http\Requests\GuitarFormRequest;


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
    // public function store(Request $request)
    public function store(GuitarFormRequest $request)
    {
        //laravel helps us validate our data
        // $request->validate([
        //     'guitar-name' => 'required',
        //     'brand' => 'required',
        //     'year' => ['required', 'integer'],
        // ]);
        $data = $request->validated();
        //uses the rules in the GuitarFormRequest to validate the data.
        //POST
        // $guitar = new Guitar();
        // $guitar->name = strip_tags($request->input('guitar-name'));
        // // This takes data from the input form in create.blade.php and saves it on the database. It is connected
        // // via the 'action' on the form
        // $guitar->brand = strip_tags($request->input('brand'));
        // $guitar->year_made = strip_tags($request->input('year'));
        // $guitar->save();
        // return redirect()->route('guitars.index');
        //After saving to the database, the application is re-routed to the guitars.index page.
        // $guitar = new Guitar();
        // $guitar->name = $data['guitar-name'];
        // // This takes data from the input form in create.blade.php and saves it on the database. It is connected
        // // via the 'action' on the form
        // $guitar->brand = $data['brand'];
        // $guitar->year_made = $data['year'];
        // $guitar->save();
        Guitar::create($data);//This line of code will automatically pull data from input fields into database
        //fields. It replaces all the lines of code above.
         //However the data must have keys that are the same name as the columns in the database
        //for mass assignemt to work
        return redirect()->route('guitars.index');
        //After saving to the database, the application is re-routed to the guitars.index page.
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($guitar)
    public function show(Guitar $guitar)
    //if you prefix it with Guitar, laravel will look for the id in the Guitar database automatically
    //if it cannot find the guitar it will automatically fail and return a 404
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
//   'guitar' => Guitar::findorFail($guitar)//if we prefix with Guitar then we no longer need this line of code
        'guitar' => $guitar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guitar $guitar)
    //laravel with automatically search the Guitar database for the $guitar id and retrieve the record.
    {
        //GET
        return view('guitars.edit', [
            // 'guitar' => Guitar::findorFail($guitar)
            'guitar' => $guitar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Guitar $guitar)
    public function update(GuitarFormRequest $request, Guitar $guitar)
    {
        //POST, PUT, PATCH
        // $request->validate([
        //     'guitar-name' => 'required',
        //     'brand' => 'required',
        //     'year' => ['required', 'integer'],
        // ]);
        $data = $request->validated(); 
        

        // $record = Guitar::findorFail($guitar);
        //searches the database for record with the ID and then retrieves it inorder to edit it
        // $record->name = strip_tags($request->input('guitar-name'));
     
        // $record->brand = strip_tags($request->input('brand'));
        // $record->year_made = strip_tags($request->input('year'));
        // $record->save();
        // return redirect()->route('guitars.show', $guitar);
        // $guitar->name = strip_tags($request->input('guitar-name'));

        // $guitar->brand = strip_tags($request->input('brand'));
        // $guitar->year_made = strip_tags($request->input('year'));
        // $guitar->save();
        // return redirect()->route('guitars.show', $guitar);
     
        // $guitar->name = $data['guitar-name'];
        // $guitar->brand = $data['brand'];
        // $guitar->year_made = $data['year'];
        // $guitar->save();
        $guitar->update($data);
        //The replaces all the lines of code above and updates the database from the 
        //edit.page.php
        //However the data must have keys that are the same name as the columns in the database
        //for mass assignemt to work
        return redirect()->route('guitars.show', $guitar->id);
        //After saving to the database, the application is re-routed to the guitars.index page.
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
