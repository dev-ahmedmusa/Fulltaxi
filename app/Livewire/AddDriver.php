<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
class AddDriver extends Component
{

    use WithFileUploads;

    public $step = 1; // Current step of the wizard
    public $countries = []; // Array to hold the country data
    public $selectedCountry = null; 

    // Form fields
    public $personalInfo = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'gender' => '',
        'country_code' => '',
        'password' => '',
    ];
    public $vehicleDetails = [
        'vehicle_type' => '',
        'vehicle_number' => '',
        'license_photo' => null,
    ];
    public $verificationDetails = [
        'id_photo' => null,
        'address' => '',
    ];

    protected $rules = [
        'personalInfo.first_name' => 'required|string|max:255',
        'personalInfo.last_name' => 'required|string|max:255',
        'personalInfo.gender' => 'required|string|max:255',
        'personalInfo.email' => 'required|email',
        'personalInfo.country_code' => 'required',
        'personalInfo.password' => 'required',
        'personalInfo.phone' => 'required|numeric',
        'vehicleDetails.make_id' => 'required|string',
        'vehicleDetails.vehicle_model_id' => 'required',
        'vehicleDetails.plate_number' => 'required',
        'verificationDetails.year' => 'required',
        'verificationDetails.color' => 'required',
    ];

    // Move to the next step
    public function nextStep()
    {
        $this->validateStep();

        if ($this->step < 3) {
            $this->step++;
        }
    }

    // Move to the previous step
    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    // Validate the current step
    private function validateStep()
    {
        $rules = match ($this->step) {
            1 => [
                'personalInfo.first_name' => 'required|string|max:255',
        'personalInfo.last_name' => 'required|string|max:255',
        'personalInfo.gender' => 'required|string|max:255',
        'personalInfo.email' => 'required|email',
        'personalInfo.country_code' => 'required',
        'personalInfo.password' => 'required',
        'personalInfo.phone' => 'required|numeric',
            ],
            2 => [
                'vehicleDetails.make_id' => 'required|string',
                'vehicleDetails.vehicle_model_id' => 'required',
                'vehicleDetails.plate_number' => 'required',
                'verificationDetails.year' => 'required',
                'verificationDetails.color' => 'required',
            ],
            3 => [
                'verificationDetails.id_photo' => 'required|image|max:2048',
                'verificationDetails.address' => 'required|string',
            ],
            default => [],
        };

        $this->validate($rules);
    }

    // Final submission
    public function submit()
    {
        $this->validate();

        // Save data to the database or process the registration
        // Example: Save driver details
        // Driver::create([...]);

        session()->flash('success', 'Registration complete!');

        // Redirect or reset form
        return redirect()->route('driver.dashboard');
    }

    public function render()
    {
        $path = resource_path('json/countries.json');

        // Check if the file exists
        if (!File::exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Get the file content
        $json = File::get($path);

        // Decode the JSON data into an array
        $countries = json_decode($json, true);
        
        $this->countries = $countries;
        return view('livewire.add-driver',[
            'countries' =>$this->countries
            //'services' => Service::all()
        ]);
    }
}




    

  
