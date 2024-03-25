// YourControllerName.php

namespace App\Http\Controllers;

use App\Models\YourModelName;
use Illuminate\Http\Request;

class YourControllerName extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data if needed
        $validatedData = $request->validate([
            'column1' => 'required',
            'column2' => 'required',
            // Add validation rules for other columns
        ]);

        // Create a new instance of your model
        $record = new YourModelName;

        // Assign values from the request to model attributes
        $record->column1 = $validatedData['column1'];
        $record->column2 = $validatedData['column2'];
        // Assign values for other columns

        // Save the record to the database
        $record->save();

        return response()->json(['message' => 'Record successfully added to the database']);
    }
}
