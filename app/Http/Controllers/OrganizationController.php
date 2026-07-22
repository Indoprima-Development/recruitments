<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Department;
use App\Models\Section;
use App\Models\Jobtitle;
use App\Models\Location;

class OrganizationController extends Controller
{
    /**
     * Combined Division / Department / Section / Job Title / Location
     * management in a single tabbed page.
     */
    public function index()
    {
        $divisions = Division::orderBy('division_name')->get();
        $departments = Department::with('division')->orderBy('department_name')->get();
        $sections = Section::with('department.division')->orderBy('section_name')->get();
        $jobtitles = Jobtitle::with('section.department.division')->orderBy('jobtitle_name')->get();
        $locations = Location::orderBy('location_name')->get();

        return view('organization.index', compact('divisions', 'departments', 'sections', 'jobtitles', 'locations'));
    }
}
